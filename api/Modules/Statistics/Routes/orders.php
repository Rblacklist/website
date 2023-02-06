<?php

use Illuminate\Http\Request;
use Modules\Statistics\Http\Controllers\Statistics\Orders\StatisticController;

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

Route::controller(StatisticController::class)->group(function(){
    Route::get('statistics/orders', 'orders');
    Route::post('statistics/orders/between-two-dates', 'betweenTwoDates');
});
