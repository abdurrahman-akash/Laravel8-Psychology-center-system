<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now()->format('Y-m-d');

//        dd($date);

        if (auth()->user()->is_admin == '1')
        {
            $schedule = Schedule::orderBy('date', 'ASC')
                ->orderBy('order_by', 'ASC')->with('user')->get();

            return view('back.admin.schedule.list',compact('schedule'));

        }else
        {
            $schedule = Schedule::where([
                ['user_id', '=', auth()->id()],
                ['date', '>=', Carbon::now()->format('Y-m-d')],
            ])->with('user')->orderBy('date', 'ASC')
                ->orderBy('order_by', 'ASC')->get();

            return view('back.admin.schedule.list',compact('schedule'));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.admin.schedule.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Schedule::where([
            ['user_id', '=', auth()->id()],
            ['date', '=',$request->date ],
            ['time_slot', '=',$request->time_slot],
        ])->first();

        if (!empty($data))
        {
            alert()->warning('WarningAlert','Schedule Already Added');
            return redirect()->back();
        }
        else
        {
            $schedule = new Schedule();
            $schedule->user_id = auth()->id();
            $schedule->date = $request->date;
            $schedule->time_slot = $request->time_slot;
            $schedule->status = $request->status;
            if($request->time_slot == '08 - 09 AM')
            {
                $schedule->order_by = '1';
            }
            elseif ($request->time_slot == '09 - 10 AM')
            {
                $schedule->order_by = '2';
            }
            elseif ($request->time_slot == '10 - 11 AM')
            {
                $schedule->order_by = '3';
            }
            elseif ($request->time_slot == '11 - 12 PM')
            {
                $schedule->order_by = '4';
            }
            elseif ($request->time_slot == '12 - 01 PM')
            {
                $schedule->order_by = '5';
            }
            elseif ($request->time_slot == '01 - 02 PM')
            {
                $schedule->order_by = '6';
            }elseif ($request->time_slot == '02 - 03 PM')
            {
                $schedule->order_by = '7';
            }
            elseif ($request->time_slot == '03 - 04 PM')
            {
                $schedule->order_by = '8';
            }

            if($schedule->save()){
                alert()->success('successfully','Student add successfully');
                return redirect()->back();
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);

        return view('back.admin.schedule.edit',compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);


        $data = Schedule::where([
            ['user_id', '=', auth()->id()],
            ['date', '=',$request->date ],
            ['time_slot', '=',$request->time_slot],
        ])->first();

        if (!empty($data))
        {
            alert()->warning('WarningAlert','Schedule Already Added');
            return redirect()->back();
        }
        else
        {
            $schedule->date = $request->date;
            $schedule->time_slot = $request->time_slot;
            $schedule->status = '1';
            if($request->time_slot == '08 - 09 AM')
            {
                $schedule->order_by = '1';
            }
            elseif ($request->time_slot == '09 - 10 AM')
            {
                $schedule->order_by = '2';
            }
            elseif ($request->time_slot == '10 - 11 AM')
            {
                $schedule->order_by = '3';
            }
            elseif ($request->time_slot == '11 - 12 PM')
            {
                $schedule->order_by = '4';
            }
            elseif ($request->time_slot == '12 - 01 PM')
            {
                $schedule->order_by = '5';
            }
            elseif ($request->time_slot == '01 - 02 PM')
            {
                $schedule->order_by = '6';
            }elseif ($request->time_slot == '02 - 03 PM')
            {
                $schedule->order_by = '7';
            }
            elseif ($request->time_slot == '03 - 04 PM')
            {
                $schedule->order_by = '8';
            }

            if($schedule->save()){
                alert()->success('successfully','Student add successfully');
                return redirect()->to('/admin/schedule/list');
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }
        }


    }

    public function status($id)
    {
        $data = Schedule::find($id);

        if ($data->status == 1)
        {
            $data->status = '0';

            if($data->save()){
                alert()->success('successfully','Status Inactive successfully');
                return redirect()->back();
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }
        }
        elseif ($data->status == 0)
        {
            $data->status = '1';

            if($data->save()){
                alert()->success('successfully','Status Active successfully');
                return redirect()->back();
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Schedule::find($id);

        if ($data->status != '2')
        {
            $data->delete();
            alert()->success('successfully','Schedule delete successfully');
            return redirect()->back();
        }
        else
        {
            alert()->info('InfoAlert','Have an appointment in this schedule.');
            return redirect()->back();
        }
    }
}
