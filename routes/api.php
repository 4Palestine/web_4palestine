<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Resources\MissionResource;
use App\Models\Mission;
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

Route::middleware(['auth:mobile', 'changeLanguage', 'isSuper'])->name('user.')->prefix('user')->group(function () {
    Route::post('/test', function(){
        $data = MissionResource::collection(Mission::get());
        if(!$data) {
            return response()->error(status: 400, message: 'there is no data yet');
        }
        return response()->success(message: 'data returned succeefully', data: $data);
    })->name('test');
});
