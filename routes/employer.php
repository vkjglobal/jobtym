<?php

use App\Http\Controllers\Employer\AptitudeTestController;
use App\Http\Controllers\Employer\Auth\ForgotPasswordController;
use App\Http\Controllers\Employer\Auth\LoginController;
use App\Http\Controllers\Employer\Auth\RegisterController;
use App\Http\Controllers\Employer\Auth\ResetPasswordController;
use App\Http\Controllers\Employer\EmployeeController;
use App\Http\Controllers\Employer\HomeController;
use App\Http\Controllers\Employer\JobPostController;
use App\Http\Controllers\Employer\ProfileController;
use App\Http\Controllers\Employer\StripePaymentController;
use Illuminate\Support\Facades\Route;

// Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Reset Password
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Confirm Password
// Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
// Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Verify Email
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::middleware('employer.auth')->group(function () {
    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Job Posts
    Route::get('job-status', [JobPostController::class, 'changeStatus'])->name('job.status');
    Route::get('job-report', [JobPostController::class, 'showReport'])->name('job.report');
    Route::resource('job-posts', JobPostController::class);

    // Aptitude Tests
    Route::get('aptitude-test-status', [AptitudeTestController::class, 'changeStatus'])->name('aptitudeTest.status');
    Route::resource('aptitude-tests', AptitudeTestController::class);

    // Robin-- 03-12-22
    Route::get('user-status', [EmployeeController::class, 'changeStatus'])->name('user.status');
    Route::resource('employee', EmployeeController::class);
   
    // Divyesh-- 09-12-22
    Route::get('profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('stripe',[StripePaymentController::class,'paymentStripe'])->name('addmoney.paymentstripe');
    Route::post('add-money-stripe',[StripePaymentController::class,'postPaymentStripe'])->name('addmoney.stripe');
});
