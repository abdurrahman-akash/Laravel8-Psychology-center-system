<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Schedule;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use PhpParser\Node\Stmt\If_;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function all_session()
    {


        if (auth()->user()->is_admin == 1)
        {
            $session = Session::orderBy('id', 'ASC')->with(['case','sche','user','psy'])->get();

//            dd($session);

            return view('back.admin.session.all_session',compact('session'));
        }
        elseif (auth()->user()->is_admin == 2)
        {
            $session = Session::where([
                ['psy_id', '=', auth()->id()],
            ])->orderBy('id', 'ASC')->with(['case','sche'])->get();

            return view('back.admin.session.all_session',compact('session'));
        }
        else
        {
            $session = Session::where([
                ['user_id', '=', auth()->id()],
            ])->orderBy('id', 'ASC')->with(['case','sche'])->get();

            return view('back.admin.session.all_session',compact('session'));
        }

    }

    public function index()
    {
        $item = CaseStudy::all();


        if (sizeof($item))
        {
            if (auth()->user()->is_admin == 1)
            {
                $case = CaseStudy::where([
                    ['status', '=', 1],
                ])->orderBy('id', 'ASC')->with(['user','psy'])->get();

                foreach ($case as $cases){

                    $schidule = Schedule::where([
                        ['id', '=', $cases->r_a_time_slot],
                    ])->with('user',)->first();
                }

                if (sizeof($case))
                {
                    // If more than 0
                    // Do Something
                    return view('back.admin.session.list',compact(['case','schidule']));
                }
                else
                {
                    // Do Something else
                    alert()->warning('WarningAlert','No result are found');
                    return redirect()->back();
                }



            }elseif (auth()->user()->is_admin == 2)
            {

                $case = CaseStudy::where([
                    ['psy', '=', auth()->id()],
                    ['status', '=', 1],
                ])->orderBy('id', 'ASC')->with(['user','psy'])->get();

                foreach ($case as $cases){

                    $schidule = Schedule::where([
                        ['id', '=', $cases->r_a_time_slot],
                    ])->with('user',)->first();
                }

                if (sizeof($case))
                {
                    // If more than 0
                    // Do Something
                    return view('back.admin.session.list',compact(['case','schidule']));
                }
                else
                {
                    // Do Something else
                    alert()->warning('WarningAlert','No result are found');
                    return redirect()->back();
                }


            }else
            {

                $case = CaseStudy::where([
                    ['user_id', '=', auth()->id()],
                    ['status', '=', 1],
                ])->orderBy('id', 'ASC')->with(['user','psy'])->get();

                foreach ($case as $cases){

                    $schidule = Schedule::where([
                        ['id', '=', $cases->r_a_time_slot],
                    ])->with('user',)->first();
                }

                if (sizeof($case))
                {
                    // If more than 0
                    // Do Something
                    return view('back.admin.session.list',compact(['case','schidule']));
                }
                else
                {
                    // Do Something else
                    alert()->warning('WarningAlert','No result are found');
                    return redirect()->back();
                }

            }
        }
        else{
            alert()->info('InfoAlert','No data have found');
            return redirect()->back();
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
//        dd([$request,$id]);

        $schidule = Schedule::where([
            ['id', '=', $request->r_a_time_slot],
        ])->first();


        $casesturdy = CaseStudy::where([
            ['id', '=', $id],
        ])->with(['psy','user'])->first();

//        dd($casesturdy);

        $session = Session::where([
            ['case_id', '=', $id],
        ])->orderBy('order_by', 'DESC')->latest()->take(1)->first();


//        dd($casesturdy);

        if (!empty($session))
        {
            $orderby = $session->order_by + '1';
        }
        else
        {
            $orderby = '1';
        }


        if ($casesturdy->status == '2')
        {
            alert()->warning('WarningAlert','The Treatment Already Complete');
            return redirect()->back();
        }
        else
        {
            if ($request->status == '2')
            {

                $casesturdy->status = '2';
                $casesturdy->save();

                $follow_up_date = $casesturdy->r_a_date;
                $follow_up_time_slot = $casesturdy->r_a_time_slot;
            }
            else
            {
                if(empty($request->r_a_time_slot))
                {
                    alert()->warning('WarningAlert','Appointment Time Slot are not selected');
                    return redirect()->back();
                }
                else
                {
                    $follow_up_date = $schidule->date;
                    $follow_up_time_slot = $request->r_a_time_slot;
                }
            }

            $to = $casesturdy->user->phone;
            $token = "89922050131674744613ffcb74ca40f248bc30a812e740764981";

            if (!empty($schidule->date))
            {
                $message_student = "Your Appointment are successfully confirmed in Psychology center Daffodil International University"."\n".
                    "Psychologist = ".$casesturdy->psy->name ."\n".
                    "Date = ".$schidule->date."\n".
                    "Time = ".$schidule->time_slot;
            }else{
                $message_student = "Your Treatment is complete"."\n".
                    "Psychologist = ".$casesturdy->psy->name ."\n";
            }

            $url = "http://api.greenweb.com.bd/api.php?json";

            $data= array(
                'to'=>$to,
                'message'=>$message_student,
                'token'=>"$token"
            );


            if($request->hasFile('image')) {

                $image = $request->file('image');

                $manager = new ImageManager(new Driver());
                $name = time().'.'.$image->getClientOriginalExtension();
                $image_resize = $manager->read($image);
                $image_resize = $image_resize->resize(1200,1000);
                $image_resize->toJpeg(80)->save(base_path('public/image/session_note/'.$name));
                $last_img ='image/session_note/'.$name;


                $session = new Session();
                $session->case_id = $id;
                $session->schedule_id = $follow_up_time_slot;
                $session->psy_id = $casesturdy->user_id;
                $session->user_id = $casesturdy->psy_id;
                $session->order_by = $orderby;
                $session->presenting_issue = $request->presenting_issue;
                $session->session_activities = $request->session_activities;
                $session->Take_out = $request->Take_out;
                $session->image = $last_img;
                $session->Next_date_follow = $follow_up_date;
                $session->Next_date_time_slot = $follow_up_time_slot;

                if($session->save()){

                    if (!empty($schidule->status))
                    {
                        $schidule->status = '2';
                        $schidule->save();
                    }

                    $casesturdy->r_a_date = $follow_up_date;
                    $casesturdy->r_a_time_slot = $follow_up_time_slot;
                    $casesturdy->save();

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,$url);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($ch, CURLOPT_ENCODING, '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $smsresult = curl_exec($ch);

                    alert()->success('successfully','Submitted Successfully');
                    return redirect()->back();
                }else{
                    alert()->warning('WarningAlert','Something is error');
                    return redirect()->back();
                }

            }else
            {
                $session = new Session();
                $session->case_id = $id;
                $session->schedule_id = $follow_up_time_slot;
                $session->psy_id = $casesturdy->user_id;
                $session->user_id = $casesturdy->psy_id;
                $session->order_by = $orderby;
                $session->presenting_issue = $request->presenting_issue;
                $session->session_activities = $request->session_activities;
                $session->Take_out = $request->Take_out;
                $session->image = 'image/session_note/no_image.jpg';
                $session->Next_date_follow = $follow_up_date;
                $session->Next_date_time_slot = $follow_up_time_slot;

                if($session->save()){

                    if (!empty($schidule->status))
                    {
                        $schidule->status = '2';
                        $schidule->save();
                    }

                    $casesturdy->r_a_date = $follow_up_date;
                    $casesturdy->r_a_time_slot = $follow_up_time_slot;
                    $casesturdy->save();

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL,$url);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    curl_setopt($ch, CURLOPT_ENCODING, '');
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $smsresult = curl_exec($ch);

                    alert()->success('successfully','Submitted Successfully');
                    return redirect()->back();
                }else{
                    alert()->warning('WarningAlert','Something is error');
                    return redirect()->back();
                }
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $case = CaseStudy::where([
            ['id', '=', $id],
        ])->with(['user','psy'])->first();

        $schidules = Schedule::where([
            ['id', '=', $case->r_a_time_slot],
        ])->first();

        $session = Session::where([
            ['case_id', '=', $id],
        ])->with('sche')->orderBy('order_by', 'DESC')->latest()->take(1)->get();


//        dd($session);

        return view('back.admin.session.edit',compact(['case','schidules','session']));
    }


    public function single_edit($id)
    {

        $session = Session::where([
            ['id', '=', $id],
        ])->first();

//        dd($session);

        return view('back.admin.session.single_edit',compact('session'));
    }


    public function single_update(Request $request, $id)
    {
        $session = Session::where([
            ['id', '=', $id]
        ])->first();

        $session->presenting_issue = $request->presenting_issue;
        $session->session_activities = $request->session_activities;
        $session->Take_out = $request->Take_out;

        if($session->save()){

            alert()->success('successfully','Update Successfully');
            return redirect()->back();
        }else{
            alert()->warning('WarningAlert','Something is error');
            return redirect()->back();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $case_id = CaseStudy::where([
            ['id', '=', $id]
        ])->with(['user', 'psy'])->first();

        $case_id->problem_discussion = $request->problem_discussion;
        $case_id->parents_information = $request->parents_information;
        $case_id->number_siblings = $request->number_siblings;
        $case_id->birth_order = $request->birth_order;
        $case_id->p_history_psy = $request->p_history_psy;
        $case_id->f_history_psy = $request->f_history_psy;
        $case_id->m_history_psy = $request->m_history_psy;
        $case_id->self_harm = $request->self_harm;
        $case_id->educational_history = $request->educational_history;
        $case_id->development_history = $request->development_history;
        $case_id->contract_person = $request->contract_person;
        $case_id->presenting_symptoms = $request->presenting_symptoms;
        $case_id->significant_history_presenting = $request->significant_history_presenting;
        $case_id->mental_status_examination = $request->mental_status_examination;
        $case_id->condition_identified = $request->condition_identified;
        $case_id->treatment_goal = $request->treatment_goal;
        $case_id->assessment = $request->assessment;
        $case_id->treatment_plan = $request->treatment_plan;
        $case_id->r_name = $request->r_name;
        $case_id->r_id = $request->r_id;
        $case_id->r_department = $request->r_department;
        $case_id->r_designation = $request->r_designation;
        $case_id->r_contract = $request->r_contract;
        $case_id->r_email = $request->r_email;

        if($case_id->save()){

            alert()->success('successfully','Update Successfully');
            return redirect()->back();
        }else{
            alert()->warning('WarningAlert','Something is error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id);
        $old_image = $session->image;
        unlink($old_image);

        Session::find($id)->delete();

        return redirect()->back();
    }
}
