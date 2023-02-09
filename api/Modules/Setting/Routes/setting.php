<?php

use Illuminate\Http\Request;
use Modules\Setting\Http\Controllers\Settings\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Settings
Route::middleware(['auth.apikey' , 'auth:sanctum'])->controller(SettingController::class)->group(function () {

    // Get
    Route::get('settings', 'index');
    Route::get('settings/{setting}', 'show');

    // Put
    Route::put('settings/{setting}', 'update');
});
