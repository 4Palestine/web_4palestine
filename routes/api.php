<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:mobile')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('user.')->group(function () {
    Route::post('/auth/register', [AuthController::class, 'register'])->name('register');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth:mobile')->name('user.')->prefix('user')->group(function () {
    Route::get('/test', function(){
        return response()->json([
            'status' => true,
            'message' => 'tested successfully',
        ], 200);
    })->name('test');
});
