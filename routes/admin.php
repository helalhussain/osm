<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Admin\{
    DashboardController,
    AdministatorController,
    ProfileController,
    TeacherController,
    StudentController,
    NoticeController,
    MessageController,
    SettingController,

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


Route::resource('category', CategoryController::class);
Route::resource('administator', AdministatorController::class);
Route::resource('teacher', TeacherController::class);
Route::resource('student', StudentController::class);

Route::resource('notice', NoticeController::class);
Route::resource('message', MessageController::class);


Route::group(['prefix' => '', 'as' => 'setting.', 'controller' => SettingController::class], function () {
    Route::get('setting', 'setting')->name('setting');
    Route::put('setting', 'settingUpdate');
    Route::get('logo-icon', 'logoIcon')->name('logo.icon');
    Route::put('logo-icon', 'logoIconUpdate');
});
Route::singleton('profile', ProfileController::class);
Route::get('/password',[ProfileController::class,'password'])->name('profile.passsword');




Route::group(['prefix' => '', 'as' => 'setting.', 'controller' => SettingController::class], function () {
    Route::get('setting', 'setting')->name('setting');
    Route::put('setting', 'settingUpdate');
    Route::get('logo-icon', 'logoIcon')->name('logo.icon');
    Route::put('logo-icon', 'logoIconUpdate');
});


