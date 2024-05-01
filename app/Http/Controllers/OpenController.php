<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OpenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.home');
    }

    public function r_appointment()
    {
        return view('front.r_appointment');
    }

    public function r_appointment_2()
    {
        return view('front.r_appointment');
    }

    public function about_psychology()
    {
        return view('front.about_psychology');
    }
    public function services()
    {
        return view('front.services');
    }
    public function who_we_are()
    {
        return view('front.who_we_are');
    }
    public function faq()
    {
        return view('front.faq');
    }
    public function notice_board()
    {
        $notice = Notice::where([
            ['status', '=', '1']
        ])->get();

        return view('front.notice_board',compact('notice'));
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function appointment()
    {
        return view('front.appointment');
    }


    public function get_scheduled(Request $request)
    {
       $date = $request->post('r_date');

       dd($date);
//        $schedule = Schedule::where([
//            ['date', '=', $date],
//        ])->orderBy('time_slot', 'ASC')
//            ->orderBy('order_by', 'ASC')->get();
//
//        $html='<option value="">Select Slot</option>';
//
//        foreach ($schedule as $schedules)
//        {
//            $html.='<option value="'.$schedules->id.'">'.$schedules->time_slot.'</option>';
//        }
//        echo $html;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
