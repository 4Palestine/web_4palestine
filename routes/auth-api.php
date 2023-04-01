<?php

use App\Http\Controllers\Api\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Api\Auth\NewPasswordController;
use App\Http\Controllers\Api\Auth\PasswordResetLinkController;
use App\Http\Controllers\Api\Auth\RegisteredUserController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::name('user.')->group(function(){
    Route::post('auth/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

    Route::post('auth/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('login');

    //////////////////////////// API ضايل هدول ينعمللهم
    Route::post('auth/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:user')
        ->name('password.email');

    Route::post('auth/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:user')
        ->name('password.store');

    Route::get('auth/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['auth:mobile', 'signed', 'throttle:6,1', 'checkApiPassword', 'changeLanguage'])
        ->name('verification.verify');

    Route::post('auth/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:mobile', 'throttle:6,1', 'checkApiPassword', 'changeLanguage'])
        ->name('verification.send');
    ////////////////////////////

    Route::post('auth/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:mobile', 'checkApiPassword', 'changeLanguage')
        ->name('logout');

});
