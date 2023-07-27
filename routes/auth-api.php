<?php

use App\Http\Controllers\Api\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Api\Auth\NewPasswordController;
use App\Http\Controllers\Api\Auth\PasswordResetLinkController;
use App\Http\Controllers\Api\Auth\RegisteredUserController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::name('user.')->group(function () {
    Route::post('auth/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest')
        ->name('register');

    Route::post('auth/resend-otp-code', [RegisteredUserController::class, 'resendOtpCode'])
        ->middleware('guest')
        ->name('resendOtpCode');

    Route::post('auth/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('login');

    Route::post('auth/login-with-otp', [AuthenticatedSessionController::class, 'store_with_otp'])
        ->middleware('guest')
        ->name('login.withotp');
    ////////////////////////////
    Route::post('auth/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:user')
        ->name('password.email');

    Route::post('auth/ensure-otp-reset-password', [NewPasswordController::class, 'ensure_otp_reset_password'])
        ->middleware('guest:user')
        ->name('password.ensure_otp_reset_password');

    Route::post('auth/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:user')
        ->name('password.store');

    Route::get('auth/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['auth:sanctum', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('auth/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:sanctum', 'throttle:6,1'])
        ->name('verification.send');
    ////////////////////////////

    Route::post('auth/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:sanctum', 'checkApiPassword', 'changeLanguage')
        ->name('logout');
});
