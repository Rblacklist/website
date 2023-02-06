<?php

use Modules\Setting\Http\Controllers\mails\ConfMailController;

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

// Conf Mail
Route::middleware(['auth.apikey'])->controller(ConfMailController::class)->group(function () {

    // Get
    Route::get('mail-configuration', 'index');
    Route::get('mail-configuration/{conf_mail}', 'show');

    // Post
    Route::post('mail-configuration', 'store');

    // Put
    Route::put('mail-configuration/{conf_mail}', 'update');
    Route::put('mail-configuration/is-selected/{conf_mail}', 'isSelected');

    // Delete
    Route::delete('mail-configuration/{conf_mail}', 'destroy');
});
