<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\ChatController;
use App\Http\Controllers\Student\NoticeController;
use App\Http\Controllers\Student\MessageController;
use App\Http\Controllers\Student\SendController;
use App\Http\Controllers\Student\QuizController;
use App\Http\Controllers\Student\ResultController;
use App\Http\Controllers\Student\CertificateController;
use App\Http\Controllers\Student\ContentController;

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

Route::get('/',[HomeController::class,'home'])->name('home.page');

Route::middleware('auth')->group(function () {
    // Route::get('/account/password', [PasswordController::class, 'index'])->name('password.index');
    Route::put('/account/password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('/account/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/account/notice/show/{id}',[DashboardController::class,'notice_show'])->name('notice.show');
    Route::get('/account/dashboard/download/{file}',[DashboardController::class,'file_download'])
    ->name('file.download');

    Route::singleton('account/profile', ProfileController::class);
    Route::resource('account/notice', NoticeController::class);
    Route::resource('account/chat', ChatController::class);
    Route::resource('account/message', MessageController::class);
    Route::resource('account/send', SendController::class);
    Route::resource('account/quiz', QuizController::class);
    Route::resource('account/result', ResultController::class);
    Route::resource('account/certificate', CertificateController::class);
    Route::resource('account/content', ContentController::class);

    Route::get('/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::patch('admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('singup/',[HomeController::class,'singup'])->name('singup.page');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/registration',[UserController::class,'create'])->name('registration');
Route::post('registration',[UserController::class,'singup'])->name('registration.post');


// Stripe
// Route::group(['prefix' => 'checkout', 'as' => '', 'controller' => CheckoutController::class], function () {
//     Route::get('/checkout', 'checkout')->name('checkout');
//     Route::post('/checkout', 'store')->name('checkout.store');
// });

// Route::get('stripe', [StripeController::class, 'stripe']);
// Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
// Route::get('stripe/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
// Route::get('stripe/checkout/success', [StripeController::class, 'stripeCheckoutSuccess'])
// ->name('stripe.checkout.success');
Route::controller(StripeController::class)->group(function(){
    Route::get('stripe','stripe')->name('stripe.index');
    Route::get('stripe','stripe')->name('stripe.index');
    Route::get('stripe/checkout','stripeCheckout')->name('stripe.checkout');
    Route::get('stripe/checkout/success','stripeCheckoutSuccess')->name('stripe.checkout.success');
});
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
// Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
// Route::get('payment/{status}', [PaymentController::class, 'callback'])->name('payment.callback');


require __DIR__.'/auth.php';


