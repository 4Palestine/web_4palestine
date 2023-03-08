<?php

use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});








$routes_all = [
    'platform' => PlatformController::class,
];
$routes_without_softdelete = [
];

foreach($routes_all as $route_name => $route_controller) {
    Route::controller($route_controller)->name('dashboard.')->prefix('/dashboard')->middleware(['auth'])->group(function () use ($route_name, $route_controller) {
        Route::get($route_name.'/export-excel/', 'exportExcel')->name($route_name.'.exportExcel');
        Route::get($route_name.'/export-excel-demo/', 'exportExcelDemo')->name($route_name.'.exportExcelDemo');
        Route::get($route_name.'export-pdf/', 'exportPdf')->name($route_name.'.exportPdf');
        Route::post($route_name.'import-excel/', 'importExcel')->name($route_name.'.importExcel');

        Route::get($route_name.'-trash', 'trash')->name($route_name.'.trash');
        Route::put($route_name.'/{category}/restore', 'restore')->name($route_name.'.restore');
        Route::delete($route_name.'/{category}/force-delete', 'forceDelete')->name($route_name.'.forceDelete');
        // Route::delete($route_name.'/force-group-delete', 'deleteGroup')->name($route_name.'.deleteGroup');

        Route::resource($route_name, $route_controller);

    });
}

foreach($routes_without_softdelete as $route_name => $route_controller) {
    Route::controller($route_controller)->name('dashboard.')->prefix('/dashboard')->middleware(['auth'])->group(function () use ($route_name, $route_controller) {
        Route::get($route_name.'/export-excel/', 'exportExcel')->name($route_name.'.exportExcel');
        Route::get($route_name.'/export-excel-demo/', 'exportExcelDemo')->name($route_name.'.exportExcelDemo');
        Route::get($route_name.'export-pdf/', 'exportPdf')->name($route_name.'.exportPdf');
        Route::post($route_name.'import-excel/', 'importExcel')->name($route_name.'.importExcel');
        Route::resource($route_name, $route_controller);
    });
}




require __DIR__.'/auth.php';
