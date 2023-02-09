<?php

use Illuminate\Http\Request;
use Modules\Apis\Http\Controllers\ApiShops\ApiShopController;

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



Route::middleware(['auth.apikey' , 'auth:sanctum'])->controller(ApiShopController::class)->group(function () {
    // GET
    Route::get('/api-shops', 'index'); // {{domain}}/api/api-shops?limit=10&offset=0
    Route::get('/api-shops/{api_shop}', 'show'); // {{domain}}/api/api-shops/{api_shop}
    // POST
    Route::post('/api-shops', 'store'); // {{domain}}/api/api-shop

    // PUT
    Route::put('/api-shops/{api_shop}', 'update'); // {{domain}}/api/api-shops/{api_shop} (PUT)

    // DELETE
    Route::delete('/api-shops/{api_shop}', 'destroy'); // {{domain}}/api/api-shops/{api_shop}
});
