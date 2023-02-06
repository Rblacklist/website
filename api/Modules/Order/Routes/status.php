<?php

use Modules\Order\Http\Controllers\Status\StatusController;


Route::middleware(['auth.apikey'])->controller(StatusController::class)->group(function () {
    // GET
    Route::get('/status-orders', 'index'); // {{domain}}/api/status-orders?limit=10&offset=0
    Route::get('/status-orders/{status_order}', 'show'); // {{domain}}/api/status-orders/{status_order}
    Route::get('/selecting-fields/status-orders', 'selectingFields'); // {{domain}}/api/selecting-fields/status-orders?fields[status_orders]=id,name,status

    // POST
    Route::post('/status-orders', 'store'); // {{domain}}/api/status-orders

    // PUT
    Route::put('/status-orders/{status_order}', 'update'); // {{domain}}/api/status-orders/{status_order} (PUT)

    // DELETE
    Route::delete('/status-orders/{status_order}', 'destroy'); // {{domain}}/api/status-orders/{status_order}
});
