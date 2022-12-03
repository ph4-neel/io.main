<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

//Routes============================================================>

Route::get('/', [RouteController::class, 'Homepage_View'])->name('Homepage');
Route::get('/Admin_Skills', [RouteController::class, 'Skills']);

Route::get('/User_Register', [UserController::class, 'User_Register_View'])->name('User_Register');
Route::post('/User_Registers', [UserController::class, 'Register'])->name('User_Register');
Route::get('/User_Login', [UserController::class, 'User_Login_View'])->name('User_Login')->middleware();
Route::post('/User_Login',[UserController::class,'Login'])->middleware();
Route::get('/User_DashBoard', [UserController::class, 'User_DashBoard'])->name('User_DashBoard');
Route::get('/logout', [UserController::class, 'Logout'])->name('Logout');


Route::get('/admins', [AdminController::class, 'Admin_Login'])->name('Admin_Login');
Route::post('/admin_login', [AdminController::class, 'Login'])->name('admin_login');

Route::get('/Super_admin', [AdminController::class, 'Super_Admin']);

Route::post('/Save', [AdminController::class, 'Save_Skills']);

Route::get('/Skills_add', function () {

    return view('superadmin.Skills_Add');
});

Route::get('/test', function () {

    return view('superadmin.admin');
});

Route::get('/get_Skills', [AdminController::class, 'getSkills']);
Route::get('/Self_intro', function () {

    return view('superadmin.Self_Introduction');
});

Route::get('/Admin_resume', function () {

    return view('superadmin.Admin_Resume');
});

Route::get('/Admin_video',function(){

    return view('superadmin.Admin_video');

});

Route::post('/Admin_resume',[AdminController::class,'Save_resume']);
Route::post('/Admin_video',[AdminController::class,'Save_Video']);
Route::post('/Self_intro',[AdminController::class,'Save_Intro']);

Route::get('/get_Self',[AdminController::class,'getSelf']);
Route::get('/get_resmue',[AdminController::class,'getresume']);
Route::get('/get_video',[AdminController::class,'getVideo']);

Route::get('/User_list',[AdminController::class,'getUser']);

Route::get('/soft',[SkillController::class,'get_Soft']);

Route::get('/get',function(){

    return view('Pages.blog_details');

});

Route::get('details/{id}',[SkillController::class,'Skills_Details'])->name('Details');

Route::get('/video',function(){

    return view('VideoSection.Main');
});


Route::post('/Register_Test',[AdminController::class,'Admin_Register']);
Route::post('/Login_Test',[AdminController::class,'Admin_Login'])->middleware();

Route::get('Skills/{id}',[SkillController::class,'get'])->name('update');
Route::post('update_Skill{id}',[SkillController::class,'Update'])->name("update_data");

Route::get('/Skills', function(){

    return view('superadmin.Admin_Skills');
});





Route::get('/Student_Profile',[ProfileController::class,'Student_Profile']);
Route::post('/Student_Profile',[ProfileController::class,'Save_Student']);
Route::get('/main_Profile',[ProfileController::class,'get_Student']);

