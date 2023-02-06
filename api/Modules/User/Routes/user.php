<?php

use Modules\User\Http\Controllers\Users\UserController;

Route::middleware(['auth.apikey'])->controller(UserController::class)->group(function () {
    // GET
    Route::get('/users', 'index'); // {{domain}}/api/users?limit=10&offset=0
    Route::get('/users/{user}', 'show'); // {{domain}}/api/users/{user}
    Route::get('/selecting-fields/users', 'selectingFields'); // {{domain}}/api/selecting-fields/users?fields[users]=id,firstname

    // POST
    Route::post('/users', 'store'); // {{domain}}/api/users

    // PUT
    Route::put('/users/{user}', 'update'); // {{domain}}/api/users/{user} (PUT)

    // DELETE
    Route::delete('/users/{user}', 'destroy'); // {{domain}}/api/users/{user}
});
