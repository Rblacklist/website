<?php

use Illuminate\Http\Request;
use Modules\Product\Http\Controllers\Products\ProductController;

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


Route::middleware(['auth.apikey' , 'auth:sanctum'])->controller(ProductController::class)->group(function () {
    // GET
    Route::get('/products', 'index'); // {{domain}}/api/products?limit=10&offset=0
    Route::get('/products/{product}', 'show'); // {{domain}}/api/products/{product}
    Route::get('/selecting-fields/products', 'selectingFields'); // {{domain}}/api/selecting-fields/products?fields[products]=id,name

    // POST
    Route::post('/products', 'store'); // {{domain}}/api/products
    Route::post('/products/upload-image/{product}', 'uploadImage'); // {{domain}}/api/products/upload-image/{product}

    // PUT
    Route::put('/products/{product}', 'update'); // {{domain}}/api/products/{product} (PUT)

    // DELETE
    Route::delete('/products/{product}', 'destroy'); // {{domain}}/api/products/{product}
});
