<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PlatformController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\MissionController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UserMissionController;
use App\Models\Contact;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Normal User
Route::middleware(['auth:sanctum', 'verified', 'checkApiPassword', 'changeLanguage'])->name('user.')->prefix('user')->group(function () {
    Route::apiResources([
        'mission' => MissionController::class,
        'platform' => PlatformController::class,
    ]);
    Route::post('mission-done/{mission_id}', [UserMissionController::class, 'mission_done'])->name('mission_done');
    Route::get('total-stars-of-user/{user_id}', [UserMissionController::class, 'total_stars_of_user'])->name('total_stars_of_user');
    Route::get('top-10-last-week', [UserMissionController::class, 'top_10_last_month'])->name('top_10_last_month');
    Route::get('missions-of-platform/{platform_id}', [MissionController::class, 'missions_of_platform'])->name('missions_of_platform');
<<<<<<< HEAD
=======
    Route::get('faqs', [SettingController::class, 'list_of_faqs'])->name('list_of_faqs');


>>>>>>> 89440d8a6f37907ff5b8209a7283790cc2fef1ae
    Route::get('/home', [HomeController::class, 'home'])->name('home');
});
Route::get('contact' , [ContactController::class , 'index'])->name('contact_index');
    Route::post('contact' , [ContactController::class , 'store'])->name('contact_store');
    Route::delete('contact/{id}/delete' , [ContactController::class , 'destroy'])->name('contact_delete');
// Super User
Route::middleware(['auth:sanctum', 'verified', 'checkApiPassword', 'changeLanguage', 'isSuper'])->name('user.')->prefix('user')->group(function () {
});



require __DIR__.'/auth-api.php';
