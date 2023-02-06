<?php

use Illuminate\Http\Request;

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



Route::middleware(['auth.apikey'])->controller(ApiDeliveryController::class)->group(function () {
    // GET
    Route::get('/api-deliveries', 'index'); // {{domain}}/api/api-delivery?limit=10&offset=0
    Route::get('/api-delivery/{api_delivery}', 'show'); // {{domain}}/api/api-delivery/{api_delivery}
    Route::get('/selecting-fields/api-delivery', 'selectingFields'); // {{domain}}/api/selecting-fields/api-delivery?fields[api_deliveries]=id,name

    // POST
    Route::post('/api-delivery', 'store'); // {{domain}}/api/api-delivery

    // PUT
    Route::put('/api-delivery/{api_delivery}', 'update'); // {{domain}}/api/api-delivery/{api_delivery} (PUT)

    // DELETE
    Route::delete('/api-delivery/{api_delivery}', 'destroy'); // {{domain}}/api/api-delivery/{api_delivery}
});
