<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list = Notice::all();

//        dd($list);

        return view('back.admin.notice.list',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.admin.notice.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->file){

            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/file/notice');
                $imagepath =$image->move($destinationPath, $name);
                $file_name='file/notice/'.$name;
            }

            $notice = new Notice();
            $notice->title = $request->title;
            $notice->date = $request->date;
            $notice->file = $file_name;
            $notice->status = $request->status;
            $notice->save();

            alert()->success('SuccessAlert','Notice Added Successfully');
            return redirect()->back();

        }

        alert()->warning('WarningAlert','Something is error');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    public function status($id)
    {
        $notice = Notice::find($id);

        if($notice->status == 0)
        {
            $notice->status = '1';
            $notice->save();

            return redirect()->back();
        }elseif ($notice->status == 1)
        {
            $notice->status = '0';
            $notice->save();

            return redirect()->back();
        }
        else
        {
            alert()->warning('WarningAlert','Something is error');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        $old_notice = $notice->file;
        unlink($old_notice);

        Notice::find($id)->delete();

        return redirect()->back();
    }
}
