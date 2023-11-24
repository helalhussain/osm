<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\ChatController;
use App\Http\Controllers\Student\MessageController;
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
    Route::get('/account/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/account/notice/show/{id}',[DashboardController::class,'notice_show'])->name('notice.show');

    Route::get('/account/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('account/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('account/chat', ChatController::class);
    Route::resource('account/message', MessageController::class);
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/registration',[UserController::class,'create'])->name('registration');
Route::post('registration',[UserController::class,'singup'])->name('registration.post');

// Route::group(['prefix' => 'all-product', 'as' => 'product.', 'controller' => HomeController::class], function () {
//     Route::get('/view/{id}','view_product')->name('view_product');
//     Route::get('/checkout','checkout');
//     Route::get('/cart','cart');
// });


require __DIR__.'/auth.php';


