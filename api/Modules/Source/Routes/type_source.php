<?php

use Modules\Source\Http\Controllers\TypeSources\TypeSourceController;


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

Route::middleware(['auth.apikey'])->controller(TypeSourceController::class)->group(function () {
    // GET
    Route::get('/type-source', 'index'); // {{domain}}/api/type-source?limit=10&offset=0
    Route::get('/type-source/{type_source}', 'show'); // {{domain}}/api/type-source/{type_source}
    Route::get('/selecting-fields/type-source', 'selectingFields'); // {{domain}}/api/selecting-fields/type-source?fields[type_sources]=id,name

    // POST
    Route::post('/type-source', 'store'); // {{domain}}/api/type-source

    // PUT
    Route::put('/type-source/{type_source}', 'update'); // {{domain}}/api/type-source/{type_source} (PUT)

    // DELETE
    Route::delete('/type-source/{type_source}', 'destroy'); // {{domain}}/api/type-source/{type_source}
});

