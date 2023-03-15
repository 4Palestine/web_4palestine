<?php

use App\Http\Controllers\Api\PlatformController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MissionController;
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

Route::middleware(['auth:mobile', 'checkApiPassword', 'changeLanguage'])->name('user.')->prefix('user')->group(function () {
    Route::get('/test', function(){
        $data = MissionResource::collection(Mission::get());
        if(!$data) {
            return response()->error(status: 400, message: 'there is no data yet');
        }
        return response()->success(message: 'tested success', data: $data);
    })->name('test');
});


// Normal User
Route::middleware(['auth:mobile', 'checkApiPassword', 'changeLanguage'])->name('user.')->prefix('user')->group(function () {
    Route::apiResources([
        'mission' => MissionController::class,
        'platform' => PlatformController::class,
    ]);
});



// Super User
Route::middleware(['auth:mobile', 'checkApiPassword', 'changeLanguage', 'isSuper'])->name('user.')->prefix('user')->group(function () {
});
