<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Administator\{
    DashboardController,
    ProfileController,
    SubjectController,
    TeacherController,
    StudentController,
    UserController,
    GroupController,
    SectionController,
    NoticeController,
    ClsController,
    CourseController,
    ResultController,
    MessageController,
    MessageTeacherController,
};
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::singleton('profile', ProfileController::class);
Route::get('/password',[ProfileController::class,'password'])->name('profile.passsword');

Route::resource('subject', SubjectController::class);
Route::resource('teacher', TeacherController::class);
Route::post('/administitor/teacher/status', [TeacherController::class,'status'])
->name('teacher.status');

Route::resource('student', StudentController::class);
Route::post('student/in-active', [StudentController::class, 'inActive'])->name('student.in-active');
Route::resource('notice', NoticeController::class);
Route::resource('student-message', MessageController::class);
Route::get('administator/student-message/send/',[ MessageController::class,'send'])
->name('student-message.send');
Route::resource('teacher-message', MessageTeacherController::class);
Route::get('administator/teacher-message/send/',[ MessageController::class,'send'])
->name('teacher-message.send');
Route::resource('group', GroupController::class);
Route::resource('class/section', SectionController::class);
Route::resource('class', ClsController::class);
Route::resource('class/section/course', CourseController::class);
Route::get('administator\class',[ClsController::class,'ClsSection'])
->name('clsSection');

Route::resource('result', ResultController::class);

