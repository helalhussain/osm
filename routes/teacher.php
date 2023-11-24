<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Teacher\{
    DashboardController,
    ProfileController,
    StudentController,
    NoticeController,
    ContentController,
    ChatController,
    MessageController,

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
Route::resource('student', StudentController::class);
Route::resource('notice', NoticeController::class);
Route::resource('content', ContentController::class);
Route::resource('message', MessageController::class);

Route::resource('chat', ChatController::class);
