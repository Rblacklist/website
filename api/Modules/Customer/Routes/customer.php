<?php

use Modules\Customer\Http\Controllers\Customers\CustomerController;

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


Route::middleware(['auth.apikey'])->controller(CustomerController::class)->group(function () {
    // GET
    Route::get('/customers', 'index'); // {{domain}}/api/customers?limit=10&offset=0
    Route::get('/customers/{customer}', 'show'); // {{domain}}/api/customers/{customer}
    Route::get('/selecting-fields/customers', 'selectingFields'); // {{domain}}/api/selecting-fields/customers?fields[customers]=id,fullname

    // POST
    Route::post('/customers', 'store'); // {{domain}}/api/customers

    // PUT
    Route::put('/customers/{customer}', 'update'); // {{domain}}/api/customers/{customer} (PUT)

    // DELETE
    Route::delete('/customers/{customer}', 'destroy'); // {{domain}}/api/customers/{customer}
});
