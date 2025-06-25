<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Teacher\{
    DashboardController,
    ProfileController,
    UserController,
    NoticeController,
    PostController,
    ContentController,
    ResultController,
    QuizController,
    QuestionController,
    AnswerController,

    ChatController,
    MessageController,
    ZoomController,
    ChangePasswordController,

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
// Route::resource('student', StudentController::class);
Route::resource('user', UserController::class);
Route::resource('notice', NoticeController::class);
Route::resource('zoom', ZoomController::class);

Route::resource('content', ContentController::class);
Route::resource('result', ResultController::class);
Route::resource('quiz', QuizController::class);

Route::resource('question',QuestionController::class);
Route::get('quiz/question/{quiz_id}/create-question',[QuestionController::class,'create_question'])->name('create_question');
Route::get('quiz/question/{quiz_id}/create-mcq',[QuestionController::class,'create_mcq'])->name('create_mcq');

// Route::get('question/question/mcq',[QuestionController::class,'add_mcq'])->name('add_mcq');
// Route::get('quiz/question/{quiz_id}',[QuestionController::class,'add_questions'])->name('add_questions');

Route::resource('answer',AnswerController::class);
Route::get('teacher/answer/{id}',[AnswerController::class,'show_quiz'])->name('show_quiz');
Route::get('teacher/answer/user/show/{id}',[AnswerController::class,'show_result'])->name('show_result');


Route::resource('message', MessageController::class);
Route::get('teacher/message/send',[ MessageController::class,'send'])->name('message.send');
// Route::get('teacher/message/send-show',[ MessageController::class,'send'])->name('message.send_show');
Route::get('administator/message/send-show/{id}',[ MessageController::class,'send_show'])
->name('message.send_show');
Route::resource('chat', ChatController::class);
Route::singleton('password', ChangePasswordController::class);
