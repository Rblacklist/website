<?php

use Illuminate\Http\Request;
use Modules\Order\Http\Controllers\Orders\OrderController;

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


Route::middleware(['auth.apikey'])->controller(OrderController::class)->group(function () {
    // GET
    Route::get('/orders', 'index'); // {{domain}}/api/orders?limit=10&offset=0
    Route::get('/orders/{order}', 'show'); // {{domain}}/api/orders/{order}
    Route::get('/selecting-fields/orders', 'selectingFields'); // {{domain}}/api/selecting-fields/orders?fields[orders]=id,order_number,note......

    // POST
    Route::post('/orders', 'store'); // {{domain}}/api/orders

    // PUT
    Route::put('/orders/{order}', 'update'); // {{domain}}/api/orders/{order} (PUT)

    // DELETE
    Route::delete('orders/{order}', 'destroy'); // {{domain}}/api/orders/{order}
});
