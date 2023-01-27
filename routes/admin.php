<?php

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmployerController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
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


Route::middleware('admin.auth')->group(function () {
    // Dashboard
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'store']);

    Route::post('update-password', [ProfileController::class, 'updatePass'])->name('update.password');

    // Employers
    Route::get('employer-change-status', [EmployerController::class, 'changeStatus'])->name('employer.change.status');
    Route::get('employer-job-posts/{id}', [EmployerController::class, 'jobs'])->name('employer.jobposts');
    Route::get('jobpost/{id}', [EmployerController::class, 'showJob'])->name('employer.jobShow');
    Route::delete('job-post/{id}', [EmployerController::class, 'deleteJob'])->name('employer.jobDelete');
    Route::resource('employers', EmployerController::class);

    // Users
    Route::get('user-status', [UserController::class, 'changeStatus'])->name('user.status');
    Route::resource('users', UserController::class);

    // Packages
    Route::get('package-status', [PackageController::class, 'changeStatus'])->name('package.status');
    Route::resource('packages', PackageController::class);

    // Reports
    Route::get('all-job-report', [ReportController::class, 'index'])->name('report.allJob');
    Route::get('job-post/{id}', [ReportController::class, 'viewJob'])->name('report.viewJob');
    //Robin 30-11-22
    Route::get('matched-job-report', [ReportController::class, 'matched_jobs'])->name('report.matchedJob');

    // Categories
    Route::get('category-status', [CategoryController::class, 'changeStatus'])->name('category.status');
    Route::resource('categories', CategoryController::class)->only([
        'index', 'edit', 'store', 'update', 'destroy'
    ]);
    // Contact
    Route::get('contact-status', [ContactController::class, 'changeStatus'])->name('contact.status');
    Route::resource('contact-view', ContactController::class)->only([
        'index', 'edit', 'show', 'update', 'destroy'
    ]);
});
