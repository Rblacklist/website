<?php

use Modules\Apis\Http\Controllers\ApiDeliveries\ApiDeliveryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth.apikey'])->controller(ApiDeliveryController::class)->group(function () {
    // GET
    Route::get('/api-deliveries', 'index'); // {{domain}}/api/api-deliveries?limit=10&offset=0
    Route::get('/api-deliveries/{api_delivery}', 'show'); // {{domain}}/api/api-deliveries/{api_delivery}
    Route::get('/selecting-fields/api-deliveries', 'selectingFields'); // {{domain}}/api/selecting-fields/api-deliveries?fields[api_deliveries]=id,name

    // POST
    Route::post('/api-deliveries', 'store'); // {{domain}}/api/api-deliveries

    // PUT
    Route::put('/api-deliveries/{api_delivery}', 'update'); // {{domain}}/api/api-deliveries/{api_delivery} (PUT)

    // DELETE
    Route::delete('/api-deliveries/{api_delivery}', 'destroy'); // {{domain}}/api/api-deliveries/{api_delivery}
});
