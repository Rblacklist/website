<?php

use Illuminate\Http\Request;
use Modules\DeliveryCompany\Http\Controllers\DeliveryCompany\DeliveryCompanyController;

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

Route::middleware(['auth.apikey'])->controller(DeliveryCompanyController::class)->group(function () {
    // GET
    Route::get('/delivery-company', 'index'); // {{domain}}/api/delivery-company?limit=10&offset=0
    Route::get('/delivery-company/{delivery_company}', 'show'); // {{domain}}/api/delivery-company/{delivery_company}
    Route::get('/selecting-fields/delivery-company', 'selectingFields'); // {{domain}}/api/selecting-fields/customers?fields[delivery_companies]=id,name,base_url

    // POST
    Route::post('/delivery-company', 'store'); // {{domain}}/api/delivery-company

    // PUT
    Route::put('/delivery-company/{delivery_company}', 'update'); // {{domain}}/api/delivery-company/{delivery_company} (PUT)

    // DELETE
    Route::delete('/delivery-company/{delivery_company}', 'destroy'); // {{domain}}/api/delivery-company/{delivery_company}
});
