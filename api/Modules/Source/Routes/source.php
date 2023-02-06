<?php

use Illuminate\Http\Request;
use Modules\Source\Http\Controllers\Sources\SourceController;

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

Route::middleware(['auth.apikey'])->controller(SourceController::class)->group(function () {
    // GET
    Route::get('/sources', 'index'); // {{domain}}/api/sources?limit=10&offset=0
    Route::get('/sources/{source}', 'show'); // {{domain}}/api/sources/{source}
    Route::get('/selecting-fields/sources', 'selectingFields'); // {{domain}}/api/selecting-fields/sources?fields[sources]=id,name

    // POST
    Route::post('/sources', 'store'); // {{domain}}/api/sources

    // PUT
    Route::put('/sources/{source}', 'update'); // {{domain}}/api/sources/{source} (PUT)

    // DELETE
    Route::delete('/sources/{source}', 'destroy'); // {{domain}}/api/sources/{source}
});

