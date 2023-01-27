<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Employer\TestController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\JobPostController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ResultController;
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

// Route::get('/', function () {
//     return view('user.home');
// });

Route::get('/', [HomeController::class, 'index']);
Route::post('upload-file', [HomeController::class, 'uploadFile'])->name('uploadFile');
Route::get('categories/{id}', [HomeController::class, 'categories'])->name('category');

Route::get('contactUs', [HomeController::class, 'contactUs']);
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('aboutUs', [HomeController::class, 'aboutUs']);
Route::get('terms-condition', [HomeController::class, 'termsCondition']);
Route::get('faq', [HomeController::class, 'faq']);
Route::get('privacy-policy', [HomeController::class, 'privacyPolicy']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('post-login')->middleware(['is_verify_email']); 
Route::post('reset-password-submit', [LoginController::class, 'resetPasswordSubmit'])->name('reset-password-submit');
Route::post('password/email', [LoginController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [LoginController::class, 'submitResetPasswordForm'])->name('password.post');


Route::get('register', [RegisterController::class, 'registration'])->name('register');
Route::post('Empcreate', [RegisterController::class, 'Empcreate'])->name('Empcreate');
Route::post('post-registration', [RegisterController::class, 'postRegistration'])->name('register.save'); 
Route::get('view-verify-otp/{email}', [RegisterController::class, 'viewVerifyotp'])->name('viewVerifyotp');
Route::get('re-send-otp/{email}', [RegisterController::class, 'reSendOtp'])->name('reSendOtp');
Route::post('verify-otp', [RegisterController::class, 'verifyotp'])->name('verifyotp');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('loadSearchData', [DashboardController::class, 'loadSearchData'])->name('loadSearchData');
Route::get('pdfDownload/{table}', [DashboardController::class, 'pdfDownload'])->name('pdf.download');


Route::get('find-job', [JobPostController::class, 'index'])->name('job.find-job');
Route::get('job-detail/{id}', [JobPostController::class, 'jobDetail'])->name('job.job-detail');
Route::post('save-job', [JobPostController::class, 'saveJob'])->name('job.save-job');
Route::get('delete-saveJob/{id}', [JobPostController::class, 'deleteSaveJob'])->name('job.delete-saveJob');
Route::post('apply-job', [JobPostController::class, 'applyJob'])->name('job.job-apply');

Route::resource('profile', ProfileController::class);
Route::post('profile/changepassword/{id}', [ProfileController::class, 'changePassword'])->name('changePassword');

Route::get('test/{id}',[TestController::class, 'index'])->name('test');
Route::post('test',[TestController::class, 'store'])->name('test.store');
Route::get('results/{result_id}',[ResultController::class, 'show'])->name('results.show');

Route::get('/googleLogin', [SocialAuthController::class, 'googleRedirect'])->name('googleLogin');
Route::get('/public/callback', [SocialAuthController::class, 'googleCallaback'])->name('googleCallaback');

Route::get('/facebookLogin', [SocialAuthController::class, 'facebookRedirect'])->name('facebookLogin');
Route::get('/facebook/callback', [SocialAuthController::class, 'facebookCallaback'])->name('facebookCallaback');

Route::get('/twitterLogin', [SocialAuthController::class, 'twitterRedirect'])->name('twitterLogin');
Route::get('/twitter/callback', [SocialAuthController::class, 'twitterCallaback'])->name('twitterCallaback');

