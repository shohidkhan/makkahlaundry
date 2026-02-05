<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\CMS\HomeCMSController;
use App\Http\Controllers\Api\DynamicPageController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\PropertySearchController;
use App\Http\Controllers\Api\SitesettingController;
use App\Http\Controllers\Api\SocialAuthController;
use App\Http\Controllers\Api\SocialLinkController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Api\DynamicPageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Social Login
Route::post('/social-login', [SocialAuthController::class, 'socialLogin']);

// Register API
Route::controller(RegisterController::class)->prefix('users/register')->group(function () {
    // User Register
    Route::post('/', 'userRegister');

    // Verify OTP
    Route::post('/otp-verify', 'otpVerify');

    // Resend OTP
    Route::post('/otp-resend', 'otpResend');
});

// Login API
Route::controller(LoginController::class)->prefix('users/login')->group(function () {

    // User Login
    Route::post('/', 'userLogin');

    // Verify Email
    Route::post('/email-verify', 'emailVerify');

    // Resend OTP
    Route::post('/otp-resend', 'otpResend');

    // Verify OTP
    Route::post('/otp-verify', 'otpVerify');

    // Reset Password
    Route::post('/reset-password', 'resetPassword');
});

Route::middleware('jwt.verify')->group(function () {

    // User Data
    Route::get('/user-data', [UserController::class, 'userData']);

    // User Update
    Route::post('/user-update', [UserController::class, 'userUpdate']);
    Route::post('/change-password', [UserController::class, 'changePassword']);

    Route::get("/logout",[UserController::class,'logoutUser']);


    Route::controller(PropertySearchController::class)->group(function () {
        Route::post('/property-search', 'propertySearch');
    });

     Route::post('/subscribe', [SubscriptionController::class, 'createCheckout']);
     Route::post("/cancel-subscription", [SubscriptionController::class, 'cancelSubscription']);
});

Route::controller(SitesettingController::class)->group(function () {
    Route::get('/site-settings', 'siteSettings');
});

// Dynamic Page
Route::controller(DynamicPageController::class)->group(function () {
    Route::get('/dynamic-pages', 'dynamicPages');
    Route::get('/dynamic-pages/single/{slug}', 'single');
});

// Social Links
Route::controller(SocialLinkController::class)->group(function () {
    Route::get('/social-links', 'socialLinks');
});

// FAQ APIs
// Route::controller(FaqController::class)->group(function () {
//     Route::get('/faq/all', 'FaqAll');
// });


Route::get("/home-content",[HomeCMSController::class,'index']);

Route::get("/plans",action: [PlanController::class,'index']);
Route::post('/fanbasis/webhook', [SubscriptionController::class, 'handleWebhook'])->name('api.fanbasis.webhook');
