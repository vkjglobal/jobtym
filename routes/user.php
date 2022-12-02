<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('user.home');
});

// Route::get('user', function () {
//     return view('user.home');
// });

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post'); 


Route::get('register', [RegisterController::class, 'registration'])->name('register');
Route::post('post-registration', [RegisterController::class, 'postRegistration'])->name('register.save'); 
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::post('reset-password-submit', [LoginController::class, 'resetPasswordSubmit'])->name('reset-password-submit');
Route::post('password/email', [LoginController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [LoginController::class, 'submitResetPasswordForm'])->name('password.post');



Route::get('dashboard', function () {
    if (Auth::check()) {
        return view('user.dashboard');
    }else{
        return redirect('user');
    }
});
