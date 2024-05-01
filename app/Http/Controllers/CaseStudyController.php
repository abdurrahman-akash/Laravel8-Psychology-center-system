<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->is_admin == 1)
        {

            $case = CaseStudy::orderBy('id', 'ASC')->with(['user','psy'])->get();

//            dd($case);


            return view('back.admin.case.list',compact('case'));

        }elseif (auth()->user()->is_admin == 2)
        {
            $case = CaseStudy::where([
                ['psy', '=', auth()->id()],
                ['status', '=', 1],
            ])->with(['user','psy'])->get();

            return view('back.admin.case.list',compact('case'));

        }else
        {
            $case = CaseStudy::where([
                ['user_id', '=', auth()->id()],
            ])->with(['user','psy'])->get();

            return view('back.admin.case.list',compact('case'));

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

    public function r_appointment(Request $request)
    {


        $schedule = Schedule::where([
            ['date', '=', $request->r_a_date],
            ['status', '=', 1],
        ])->groupBy('time_slot')
            ->orderBy('order_by', 'ASC')->get();

        $user = User::where([
            ['student_id', '=', $request->student_id],
        ])->first();

            $requestdata['r_name']=$request->r_name;
            $requestdata['r_id']=$request->r_id;
            $requestdata['r_department']=$request->r_department;
            $requestdata['r_designation']=$request->r_designation;
            $requestdata['r_contract']=$request->r_contract;
            $requestdata['r_email']=$request->r_email;
            $requestdata['student_id']=$request->student_id;
            $requestdata['r_a_date']=$request->r_a_date;

            session()->put('r_info',$requestdata );


            return view('front.r_appointment_2',compact(['schedule','user']));


    }

    public function r_appointment_2(Request $request)
    {
        $test1 = session()->get('r_info');

//        dd([$test1,$request]);


        $user = User::where([
            ['student_id', '=', $test1['student_id']],
        ])->first();

        if (!empty($user))
        {

            $user->present_address= $request->present_address;
            $user->permanent_address= $request->permanent_address;
            $user->save();


            $case_studies = new CaseStudy();
            $case_studies->user_id = $user->id;
            $case_studies->psy_id = '1';
            $case_studies->problem_discussion = $request->problem_discussion;
            $case_studies->status = '0';
            $case_studies->r_a_date = $test1['r_a_date'];
            $case_studies->r_a_time_slot = $request->r_a_time_slot;

            $case_studies->r_name = $test1['r_name'];
            $case_studies->r_id = $test1['r_id'];
            $case_studies->r_department = $test1['r_department'];
            $case_studies->r_designation = $test1['r_designation'];
            $case_studies->r_contract = $test1['r_contract'];
            $case_studies->r_email = $test1['r_email'];


            if($case_studies->save()){

                alert()->success('successfully','Appointment Request Submitted Successfully');
                return redirect()->to('/r_appointment');
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }

        }else
        {

            $new_user = new User();
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->phone = $request->phone;
            $new_user->student_id = $test1['student_id'];
            $new_user->password = Hash::make($request->password);
            $new_user->age = $request->age;
            $new_user->department = $request->department;
            $new_user->gender = $request->gender;
            $new_user->category = $request->category;
            $new_user->present_address = $request->present_address;
            $new_user->permanent_address = $request->permanent_address;
            $new_user->save();

            $case_studies = new CaseStudy();
            $case_studies->user_id = $new_user->id;
            $case_studies->psy_id = '1';
            $case_studies->problem_discussion = $request->problem_discussion;
            $case_studies->status = '0';
            $case_studies->r_a_date = $test1['r_a_date'];
            $case_studies->r_a_time_slot = $request->r_a_time_slot;

            $case_studies->r_name = $test1['r_name'];
            $case_studies->r_id = $test1['r_id'];
            $case_studies->r_department = $test1['r_department'];
            $case_studies->r_designation = $test1['r_designation'];
            $case_studies->r_contract = $test1['r_contract'];
            $case_studies->r_email = $test1['r_email'];

            if($case_studies->save()){

                alert()->success('successfully','Appointment Request Submitted Successfully');
                return redirect()->to('/r_appointment');
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store_1(Request $request)
    {

        $schedule = Schedule::where([
            ['date', '=', $request->r_a_date],
            ['status', '=', 1],
        ])->groupBy('time_slot')
            ->orderBy('order_by', 'ASC')->get();


        if (auth()->user())
        {
            $user = User::find(auth()->id());

            $user->age= $request->age;
            $user->gender= $request->gender;
            $user->category= $request->category;
            $user->department= $request->department;
            $user->save();

            $requestdata['r_a_date']=$request->r_a_date;

            session()->put('student_info',$requestdata );

            return view('front.appointment_2',compact('schedule'));

        }else
        {

            $requestdata['name'] = $request->name;
            $requestdata['email'] = $request->email;
            $requestdata['phone'] = $request->phone;
            $requestdata['student_id'] = $request->student_id;
            $requestdata['password'] = $request->password;
            $requestdata['age'] = $request->age;
            $requestdata['department'] = $request->department;
            $requestdata['gender'] = $request->gender;
            $requestdata['category'] = $request->category;
            $requestdata['r_a_date']=$request->r_a_date;

            session()->put('student_info',$requestdata );

            return view('front.appointment_2',compact('schedule'));


        }

    }

    public function store(Request $request)
    {
        $test1 = session()->get('student_info');


        if (auth()->user())
        {
            $auth_user = User::find(auth()->id());

            $auth_user->present_address= $request->present_address;
            $auth_user->permanent_address= $request->permanent_address;
            $auth_user->save();


            $case_studies = new CaseStudy();
            $case_studies->user_id = $auth_user->id;
            $case_studies->psy_id = '1';
            $case_studies->problem_discussion = $request->problem_discussion;
            $case_studies->status = '0';
            $case_studies->r_a_date = $test1['r_a_date'];
            $case_studies->r_a_time_slot = $request->r_a_time_slot;

            if($case_studies->save()){

                alert()->success('successfully','Appointment Request Submitted Successfully');
                return redirect()->to('/appointment');
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }

        }else
        {


            $user = new User();
            $user->name = $test1['name'];
            $user->email = $test1['email'];
            $user->phone = $test1['phone'];
            $user->student_id = $test1['student_id'];
            $user->password = Hash::make($test1['password']);
            $user->age = $test1['age'];
            $user->department = $test1['department'];
            $user->gender = $test1['gender'];
            $user->category = $test1['category'];

            $user->present_address= $request->present_address;
            $user->permanent_address= $request->permanent_address;
            $user->save();


            $case_studies = new CaseStudy();
            $case_studies->user_id = $user->id;
            $case_studies->psy_id = '1';
            $case_studies->problem_discussion = $request->problem_discussion;
            $case_studies->status = '0';
            $case_studies->r_a_date = $test1['r_a_date'];
            $case_studies->r_a_time_slot = $request->r_a_time_slot;

            if($case_studies->save()){

                alert()->success('successfully','Appointment Request Submitted Successfully');
                return redirect()->to('/appointment');
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }
        }


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $case = CaseStudy::where([
            ['id', '=', $id],
        ])->with(['user','psy'])->first();

        dd($case);

        return view('back.admin.case.edit',compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */

    public function edit(CaseStudy $caseStudy, $id)
    {
        $case = CaseStudy::where([
            ['id', '=', $id],
        ])->with(['user','psy'])->first();

        $schidule = Schedule::where([
            ['id', '=', $case->r_a_time_slot],
        ])->first();


        $psy = User::where([
            ['is_admin', '=', '3'],
            ['status', '=', 'active'],
        ])->get();

//        dd($case);

        return view('back.admin.case.edit',compact(['case','psy','schidule']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $case_id = CaseStudy::where([
            ['id', '=', $id]
        ])->with(['user', 'psy'])->first();

        $psy = User::where([
            ['id', '=', $request->psy_id]
        ])->first();

        $schidule = Schedule::where([
            ['id', '=', $case_id->r_a_time_slot]
        ])->first();

//        dd($psy);

        $case_id->psy_id = $request->psy_id;
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
        $case_id->r_a_date = $request->r_a_date;
        $case_id->r_a_time_slot = $request->r_a_time_slot;
        $case_id->status = $request->status;


        if($case_id->save()){

            $to = $case_id->user->phone;

            $token = "89922050131674744613ffcb74ca40f248bc30a812e740764981";

            $message_student = "Your Appointment are successfully confirmed in Psychology center Daffodil International University"."\n".
                "Psychologist = ".$psy->name ."\n".
                "Date = ".$schidule->date."\n".
                "Time = ".$schidule->time_slot;

            $url = "http://api.greenweb.com.bd/api.php?json";

            $data= array(
                'to'=>"$to",
                'message'=>"$message_student",
                'token'=>"$token"
            );

            $to_psy = $psy->phone;

            $message_psy = "Your have a Appointment in Psychology center Daffodil International University"."\n".
                "Pasent = ".$case_id->user->name ."\n".
                "Date = ".$schidule->date."\n".
                "Time = ".$schidule->time_slot;

            $data_psy= array(
                'to'=>$to_psy,
                'message'=>$message_psy,
                'token'=>"$token"
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);


            $ch_psy = curl_init();
            curl_setopt($ch_psy, CURLOPT_URL,$url);
            curl_setopt($ch_psy, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch_psy, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch_psy, CURLOPT_ENCODING, '');
            curl_setopt($ch_psy, CURLOPT_POSTFIELDS, http_build_query($data_psy));
            curl_setopt($ch_psy, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch_psy);


            if (!empty($request->r_a_time_slot))
            {
                $schedule = Schedule::where([
                    ['id', '=', $request->r_a_time_slot]
                ])->first();

                $schedule->status = '2';
                $schedule->save();
            }

            alert()->success('successfully','Appointment Request Update Successfully');
            return redirect()->to('/admin/case_sturdy/list');
        }else{
            alert()->warning('WarningAlert','Something is error');
            return redirect()->back();
        }

    }

    public function fetchState(Request $request)
    {
        $data['states'] = Schedule::where([
            ['user_id', '=', $request->psycho_id],
            ['date', '=',$request->country_id],
            ['status', '=','1' ],
        ])->orderBy('order_by', 'ASC')->get(["time_slot", "id"]);


        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CaseStudy  $caseStudy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Case = CaseStudy::find($id);

        if ($Case->status = '0')
        {
            $Case->delete();
            alert()->success('successfully','Case Sturdy delete successfully');
            return redirect()->back();
        }
        else
        {
            alert()->info('InfoAlert','Have an appointment in this Case.');
            return redirect()->back();
        }
    }
}
