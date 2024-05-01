<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OpenController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\CaseStudyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('clear', function () {
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('clear-compiled');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    dd('Cached Cleared');
});

Route::get('/test', [TestController::class, 'index']);



// ================= Student List =====================
//Route::get('/admin/student/list', [StudentController::class, 'index'])->name('admin.student.list');
//Route::get('/admin/student/add', [StudentController::class, 'create'])->name('admin.student.add');
//Route::post('/admin/student/store', [StudentController::class,'store'])->name('admin.student.store');
//Route::get('/admin/student/delete/{id}', [StudentController::class,'destroy'])->name('admin.student.destroy');
//Route::get('/admin/student/edit/{id}', [StudentController::class,'edit'])->name('admin.student.edit');
//Route::post('/admin/student/update/{id}', [StudentController::class,'update'])->name('admin.student.update');
//Route::get('/admin/student/show/{id}', [StudentController::class,'show'])->name('admin.student.show');


//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();


// ================= Open Rout =====================
Route::get('/', [OpenController::class, 'index']);
Route::get('/about_psychology', [OpenController::class, 'about_psychology']);
Route::get('/services', [OpenController::class, 'services']);
Route::get('/who_we_are', [OpenController::class, 'who_we_are']);
Route::get('/faq', [OpenController::class, 'faq']);
Route::get('/notice_board', [OpenController::class, 'notice_board']);
Route::get('/contact', [OpenController::class, 'contact']);

Route::post('api/fetch-states', [CaseStudyController::class, 'fetchState']);

// ================= Appointment List =====================
Route::get('/appointment', [OpenController::class, 'appointment']);
Route::post('/admin/case_sturdy/store_1', [CaseStudyController::class,'store_1'])->name('admin.case_sturdy.store_1');
Route::post('/admin/case_sturdy/store', [CaseStudyController::class,'store'])->name('admin.case_sturdy.store');
Route::get('/r_appointment', [OpenController::class, 'r_appointment']);
Route::post('/admin/r_appointment/store', [CaseStudyController::class,'r_appointment'])->name('admin.r_appointment.store');
Route::post('/admin/r_appointment/store_2', [CaseStudyController::class,'r_appointment_2'])->name('admin.r_appointment.store_2');


// ================= Admin List =====================
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// ================= Student List =====================
Route::get('/admin/schedule/list', [ScheduleController::class, 'index'])->name('admin.schedule.list')->middleware('is_admin');
Route::get('/admin/schedule/add', [ScheduleController::class, 'create'])->name('admin.schedule.add')->middleware('is_admin');
Route::post('/admin/schedule/store', [ScheduleController::class,'store'])->name('admin.schedule.store')->middleware('is_admin');
Route::get('/admin/schedule/delete/{id}', [ScheduleController::class,'destroy'])->name('admin.schedule.destroy')->middleware('is_admin');
Route::get('/admin/schedule/edit/{id}', [ScheduleController::class,'edit'])->name('admin.schedule.edit')->middleware('is_admin');
Route::post('/admin/schedule/update/{id}', [ScheduleController::class,'update'])->name('admin.schedule.update')->middleware('is_admin');
Route::get('/admin/schedule/show/{id}', [ScheduleController::class,'show'])->name('admin.schedule.show')->middleware('is_admin');
Route::get('/admin/schedule/status/{id}', [ScheduleController::class,'status'])->name('admin.schedule.status')->middleware('is_admin');

// ================= Case-Study List =====================
Route::get('/admin/case_sturdy/list', [CaseStudyController::class, 'index'])->name('admin.case_sturdy.list');
Route::get('/admin/case_sturdy/add', [CaseStudyController::class, 'create'])->name('admin.case_sturdy.add');
Route::get('/admin/case_sturdy/delete/{id}', [CaseStudyController::class,'destroy'])->name('admin.case_sturdy.destroy');
Route::get('/admin/case_sturdy/edit/{id}', [CaseStudyController::class,'edit'])->name('admin.case_sturdy.edit');
Route::post('/admin/case_sturdy/update/{id}', [CaseStudyController::class,'update'])->name('admin.case_sturdy.update');
Route::get('/admin/case_sturdy/show/{id}', [CaseStudyController::class,'show'])->name('admin.case_sturdy.show');


// ================= Session  =====================
Route::get('/admin/session/list', [SessionController::class, 'index'])->name('admin.session.list');
Route::get('/admin/session/all_session', [SessionController::class, 'all_session'])->name('admin.session.all_session');
Route::get('/admin/session/add', [SessionController::class, 'create'])->name('admin.session.add');
Route::post('/admin/session/store/{id}', [SessionController::class,'store'])->name('admin.session.store');
Route::get('/admin/session/delete/{id}', [SessionController::class,'destroy'])->name('admin.session.destroy');
Route::get('/admin/session/edit/{id}', [SessionController::class,'edit'])->name('admin.session.edit');
Route::get('/admin/session/single_edit/{id}', [SessionController::class,'single_edit'])->name('admin.session.single_edit');
Route::post('/admin/session/update/{id}', [SessionController::class,'update'])->name('admin.session.update');
Route::post('/admin/session/single_update/{id}', [SessionController::class,'single_update'])->name('admin.single_update.update');
Route::get('/admin/session/show/{id}', [SessionController::class,'show'])->name('admin.session.show');


// ================= User Modify Section  =====================
Route::get('/admin/user/list', [HomeController::class, 'all_user'])->name('admin.user.list');
Route::get('/admin/user/add', [HomeController::class, 'user_add'])->name('admin.user.add');
Route::post('/admin/user/store/', [HomeController::class,'store'])->name('admin.user.store');
Route::get('/admin/user/delete/{id}', [HomeController::class,'destroy'])->name('admin.user.destroy');
Route::get('/admin/user/edit/{id}', [HomeController::class,'edit'])->name('admin.user.edit');
Route::post('/admin/user/update/{id}', [HomeController::class,'update'])->name('admin.user.update');
Route::get('/admin/user/show/{id}', [HomeController::class,'show'])->name('admin.user.show');


// ================= Notice Section  =====================
Route::get('/admin/notice/list', [NoticeController::class, 'index'])->name('admin.notice.list');
Route::get('/admin/notice/add', [NoticeController::class, 'create'])->name('admin.notice.add');
Route::post('/admin/notice/store/', [NoticeController::class,'store'])->name('admin.notice.store');
Route::get('/admin/notice/delete/{id}', [NoticeController::class,'destroy'])->name('admin.notice.destroy');
Route::get('/admin/notice/edit/{id}', [NoticeController::class,'edit'])->name('admin.notice.edit');
Route::post('/admin/notice/update/{id}', [NoticeController::class,'update'])->name('admin.notice.update');
Route::get('/admin/notice/status/{id}', [NoticeController::class,'status'])->name('admin.notice.status');
Route::get('/admin/notice/show/{id}', [NoticeController::class,'show'])->name('admin.notice.show');




// ================= user List =====================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



