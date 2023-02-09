<?php

use Modules\User\Http\Controllers\Roles\RoleController;
use Modules\User\Http\Controllers\Users\UserController;
use Modules\User\Http\Controllers\UserRoles\UserRolesController;
use Modules\User\Http\Controllers\Permissions\PermissionController;
use Modules\User\Http\Controllers\RolePermissions\RolePermissionsController;


// Roles
Route::middleware(['auth.apikey', 'auth:sanctum'])->controller(RoleController::class)->group(function () {
    // GET
    Route::get('/roles', 'index');
    Route::get('/roles/{role}', 'show');
    Route::get('/roles/get-roles-by-user/{user}', 'getRolesByUser');
    Route::get('/user/{user}/has-role/{role}', 'userHasRole');

    // POST
    Route::post('/roles', 'store');

    // PUT
    Route::put('/roles/{role}', 'update');

    // DELETE
    Route::delete('/roles/{role}', 'destroy');
});

// Permissions
Route::middleware(['auth.apikey', 'auth:sanctum'])->controller(PermissionController::class)->group(function () {
    // GET
    Route::get('/permissions', 'index');
    Route::get('/permissions/{permission}', 'show');

    // POST
    Route::post('/permissions', 'store');

    // PUT
    Route::put('/permissions/{permission}', 'update');

    // DELETE
    Route::delete('/permissions/{permission}', 'destroy');
});

// Users
Route::middleware(['auth.apikey', 'auth:sanctum'])->controller(UserController::class)->group(function () {
    // GET
    Route::get('/users', 'index'); // {{domain}}/api/users?limit=10&offset=0
    Route::get('/users/{user}', 'show'); // {{domain}}/api/users/{user}
    Route::get('/selecting-fields/users', 'selectingFields'); // {{domain}}/api/selecting-fields/users?fields[users]=id,firstname

    // POST
    Route::post('/users', 'store'); // {{domain}}/api/users
    Route::post('/users/upload-avatar/{user}', 'uploadAvatar'); // {{domain}}/api/users/upload-avatar/1

    // PUT
    Route::put('/users/{user}', 'update'); // {{domain}}/api/users/{user} (PUT)

    // DELETE
    Route::delete('/users/{user}', 'destroy'); // {{domain}}/api/users/{user}
});

// User - Roles
Route::middleware(['auth.apikey', 'auth:sanctum'])->controller(UserRolesController::class)->group(function () {
    // POST
    Route::post('/users/{user}/roles', 'setRolesForUser');
});

// Role - Permissions
Route::middleware(['auth.apikey', 'auth:sanctum'])->controller(RolePermissionsController::class)->group(function () {
    // POST
    Route::post('roles/{role}/permissions', 'setPermissionsForRole');
});
