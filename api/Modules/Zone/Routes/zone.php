<?php

use Illuminate\Http\Request;
use Modules\Zone\Http\Controllers\Zones\ZoneController;
use Modules\Zone\Http\Controllers\Zones\DairaController;
use Modules\Zone\Http\Controllers\Zones\WilayaController;

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

Route::controller(WilayaController::class)->group(function(){
    Route::get('wilaya', 'index');
    Route::get('wilaya/{wilaya}', 'show');
});

Route::controller(DairaController::class)->group(function(){
    Route::get('get-daira-by-wilaya/{wilaya_id}', 'getDairaByWilaya');
});


Route::middleware(['auth.apikey'])->controller(ZoneController::class)->group(function(){
    // GET
    Route::get('zones', 'index');
    Route::get('zones/{zone}', 'show');
    Route::get('/selecting-fields/zones', 'selectingFields');

    // POST
    Route::post('zones', 'store');

    // PUT
    Route::put('zones/{zone}', 'update');

    // DELETE
    Route::delete('zones/{zone}', 'destroy');
});
