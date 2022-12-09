<?php

use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\JobPostController;
use App\Http\Controllers\User\ProfileController;
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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post'); 
Route::post('reset-password-submit', [LoginController::class, 'resetPasswordSubmit'])->name('reset-password-submit');
Route::post('password/email', [LoginController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [LoginController::class, 'submitResetPasswordForm'])->name('password.post');


Route::get('register', [RegisterController::class, 'registration'])->name('register');
Route::post('post-registration', [RegisterController::class, 'postRegistration'])->name('register.save'); 
Route::post('verify-otp', [RegisterController::class, 'verifyotp'])->name('verifyotp'); 
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('dashboard', [DashboardController::class, 'index']);


Route::get('find-job', [JobPostController::class, 'index'])->name('job.find-job');
Route::get('job-detail/{id}', [JobPostController::class, 'jobDetail'])->name('job.job-detail');
Route::post('save-job', [JobPostController::class, 'saveJob'])->name('job.save-job');
Route::post('apply-job', [JobPostController::class, 'applyJob'])->name('job.job-apply');

Route::resource('profile', ProfileController::class);