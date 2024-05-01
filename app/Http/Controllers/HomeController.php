<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('back.user.home');
    }

    public function adminHome()
    {
        $sessions = Session::all()->count();

        $user = User::all()->count();

        $pending = CaseStudy::where([
            ['status', '=', '1']
        ])->count();

        $complete = CaseStudy::where([
            ['status', '=', '2']
        ])->count();


        if (auth()->user()->is_admin == 1)
        {

            return view('back.admin.home',compact(['sessions','user','pending','complete']));

        }
        elseif (auth()->user()->is_admin == 2)
        {
            return view('back.admin.home',compact(['sessions','user','pending','complete']));

        }
        elseif (auth()->user()->is_admin == 3)
        {
            return view('back.admin.home',compact(['sessions','user','pending','complete']));

        }
        else
        {
            return view('back.user.home');

        }

    }



    public function all_user()
    {

        $user = User::all();

//        dd($user);

        return view('back.admin.user.list',compact('user'));
    }

    public function user_add()
    {
        return view('back.admin.user.add');
    }

    public function store(Request $request)
    {

//        dd($request);


        if($request->hasFile('image')) {

            $image = $request->file('image');

            $manager = new ImageManager(new Driver());
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = $manager->read($image);
            $image_resize = $image_resize->resize(150, 200);
            $image_resize->toJpeg(80)->save(base_path('public/image/user_signature/' . $name));
            $last_img = 'image/user_signature/' . $name;


            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->student_id = $request->student_id;
            $user->password = Hash::make($request->password);
            $user->designation = $request->designation;
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->category = $request->category;
            $user->department = $request->department;
            $user->present_address = $request->present_address;
            $user->permanent_address = $request->permanent_address;
            $user->signature = $last_img;
            $user->short_bio = $request->short_bio;
            $user->is_admin = $request->is_admin;

            if($user->save()){

                alert()->success('successfully','Submitted Successfully');
                return redirect()->back();
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }
        }
        else
        {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->student_id = $request->student_id;
            $user->password = Hash::make($request->password);
            $user->designation = $request->designation;
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->category = $request->category;
            $user->department = $request->department;
            $user->present_address = $request->present_address;
            $user->permanent_address = $request->permanent_address;
            $user->short_bio = $request->short_bio;
            $user->is_admin = $request->is_admin;

            if($user->save()){
                alert()->success('successfully','Submitted Successfully');
                return redirect()->back();
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }

        }

    }

    public function edit($id)
    {

        $user = User::find($id);

        return view('back.admin.user.edit',compact('user'));

    }

    public function update(Request $request, $id)
    {

        $user = User::where([
            ['id', '=', $id]
        ])->first();


        if($request->hasFile('image')) {

            $image = $request->file('image');

            $manager = new ImageManager(new Driver());
            $name = time() . '.' . $image->getClientOriginalExtension();
            $image_resize = $manager->read($image);
            $image_resize = $image_resize->resize(150, 200);
            $image_resize->toJpeg(80)->save(base_path('public/image/user_signature/' . $name));
            $last_img = 'image/user_signature/' . $name;


            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->student_id = $request->student_id;
            $user->password = Hash::make($request->password);
            $user->designation = $request->designation;
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->category = $request->category;
            $user->department = $request->department;
            $user->present_address = $request->present_address;
            $user->permanent_address = $request->permanent_address;
            $user->signature = $last_img;
            $user->short_bio = $request->short_bio;
            $user->is_admin = $request->is_admin;

            if($user->save()){

                alert()->success('successfully','Submitted Successfully');
                return redirect()->back();
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }
        }
        else
        {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->student_id = $request->student_id;
            $user->password = Hash::make($request->password);
            $user->designation = $request->designation;
            $user->age = $request->age;
            $user->gender = $request->gender;
            $user->category = $request->category;
            $user->department = $request->department;
            $user->present_address = $request->present_address;
            $user->permanent_address = $request->permanent_address;
            $user->short_bio = $request->short_bio;
            $user->is_admin = $request->is_admin;

            if($user->save()){
                alert()->success('successfully','Submitted Successfully');
                return redirect()->back();
            }else{
                alert()->warning('WarningAlert','Something is error');
                return redirect()->back();
            }

        }

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $old_image = $user->signature;
        unlink($old_image);

        User::find($id)->delete();

        return redirect()->back();
    }



}
