<?php

use Modules\Customer\Http\Controllers\Phones\PhoneController;


Route::middleware(['auth.apikey' , 'auth:sanctum'])->controller(PhoneController::class)->group(function () {
    // GET
    Route::get('/phones', 'index'); // {{domain}}/api/phones
    Route::get('/phones/{phone}', 'show'); // {{domain}}/api/phones/{phone}
    Route::get('/selecting-fields/phones', 'selectingFields'); // {{domain}}/api/selecting-fields/phones?fields[phones]=id,code,phone

    // POST
    Route::post('/phones', 'store'); // {{domain}}/api/phones

    // PUT
    Route::put('/phones/{phone}', 'update'); // {{domain}}/api/phones/{phone}
    // PUT
    Route::put('/customer/{customer_id}/phones/{phone_number}', 'updatePhoneByCustomer'); // {{domain}}/api/customer/{customer_id}/phones/{phone_number}

    // DELETE
    Route::delete('/phones/{phone}', 'destroy'); // {{domain}}/api/phones/{phone}
    Route::delete('/customer/{customerId}/phones', 'destroyByCustomer'); // {{domain}}/api/customer/{customerId}/phones
});
