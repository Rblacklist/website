<?php

use Modules\Order\Http\Controllers\ProductsOrder\ProductsOrderController;



Route::middleware(['auth.apikey' , 'auth:sanctum'])->controller(ProductsOrderController::class)->group(function () {
    // GET
    Route::get('/products-order', 'index'); // {{domain}}/api/products-order'?limit=10&offset=0
    Route::get('/products-order/{products_order}', 'show'); // {{domain}}/api/products-order/{products_order}
    Route::get('/selecting-fields/products-order', 'selectingFields'); // {{domain}}/api/selecting-fields/products-order?fields[status_orders]=id,price,quantity,.....

    // POST
    Route::post('/products-order', 'store'); // {{domain}}/api/products-order

    // PUT
    Route::put('/products-order/{products_order}', 'update'); // {{domain}}/api/products-order/{products_order} (PUT)

    // DELETE
    Route::delete('/products-order/{products_order}', 'destroy'); // {{domain}}/api/products-order/{products_order}
});
