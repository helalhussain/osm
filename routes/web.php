<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\ChatController;
use App\Http\Controllers\Student\NoticeController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\MessageController;
use App\Http\Controllers\Student\SendController;
use App\Http\Controllers\Student\QuizController;
use App\Http\Controllers\Student\QuestionController;
use App\Http\Controllers\Student\AnswerController;
use App\Http\Controllers\Student\ResultController;
use App\Http\Controllers\Student\CertificateController;
use App\Http\Controllers\Student\ContentController;
use App\Http\Controllers\Student\TestController;

use App\Http\Controllers\StripeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/storage-link',function(){
    $tergetFoler = storage_path('app/public');
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($tergetFoler,$linkFolder);
});


Route::middleware('auth')->group(function () {
    // Route::get('/account/password', [PasswordController::class, 'index'])->name('password.index');
    Route::put('/account/password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('/account/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/account/notice/show/{id}',[DashboardController::class,'notice_show'])->name('notice.show')->middleware('inactive');
    Route::get('/account/dashboard/download/{file}',[DashboardController::class,'file_download'])
    ->name('file.download');

    Route::singleton('account/profile', ProfileController::class);
    Route::resource('account/notice', NoticeController::class)->middleware('inactive');
    Route::resource('account/course', CourseController::class);
    // Route::get('account/course',[CourseController::class,'show_fee'])->name('show_fee');

    Route::resource('account/chat', ChatController::class)->middleware('inactive');
    Route::resource('account/message', MessageController::class)->middleware('inactive');
    Route::get('student/account/message/send',[ MessageController::class,'send'])->name('message.send')->middleware('inactive');
    Route::get('student/message/send-show/{id}',[ MessageController::class,'send_show'])
    ->name('message.send_show')->middleware('inactive');

    Route::resource('account/quiz', QuizController::class)->middleware('inactive');
    Route::resource('account/question', QuestionController::class)->middleware('inactive');
    Route::resource('account/answer', AnswerController::class)->middleware('inactive');

    Route::resource('account/result', ResultController::class)->middleware('inactive');
    Route::resource('account/certificate', CertificateController::class)->middleware('inactive');
    Route::resource('account/content', ContentController::class)->middleware('inactive');

    Route::get('/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::patch('admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('singup/',[HomeController::class,'singup'])->name('singup.page');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/payment',[PaymentController::class,'showPaymentForm'])->name('showPaymentForm');
Route::post('/process-payment',[PaymentController::class,'processPayment'])->name('processPayment');
// Route::get('/process-payment', [PaymentController::class, 'processPayment'])->name('processPayment');

Route::get('/',[HomeController::class,'home'])->name('home.page');
Route::patch('course/{id}',[HomeController::class,'update'])->name('home.update');
Route::get('course/{id}', [HomeController::class, 'course_details'])->name('course_details');


require __DIR__.'/auth.php';


