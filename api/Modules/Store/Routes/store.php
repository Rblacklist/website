<?php

use Illuminate\Http\Request;
use Modules\Store\Http\Controllers\Stores\StoreController;

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

Route::middleware(['auth.apikey'])->controller(StoreController::class)->group(function () {
    // GET
    Route::get('/stores', 'index'); // {{domain}}/api/stores?limit=10&offset=0
    Route::get('/stores/{store}', 'show'); // {{domain}}/api/stores/{store}
    Route::get('/selecting-fields/stores', 'selectingFields'); // {{domain}}/api/selecting-fields/stores?fields[stores]=id,name

    // POST
    Route::post('/stores', 'store'); // {{domain}}/api/stores

    // PUT
    Route::put('/stores/{store}', 'update'); // {{domain}}/api/stores/{store} (PUT)

    // DELETE
    Route::delete('/stores/{store}', 'destroy'); // {{domain}}/api/stores/{store}
});
