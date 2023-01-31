<?php

use Modules\User\Http\Controllers\Auth\LoginController;
use Modules\User\Http\Controllers\Users\UserController;
use Modules\User\Http\Controllers\Auth\RegisterController;
use Modules\User\Http\Controllers\Auth\VerifyEmailController;
use Modules\User\Http\Controllers\Auth\ResetPasswordController;
use Modules\User\Http\Controllers\Auth\ForgotPasswordController;

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

//
Route::group([
    'middleware' => ['auth.apikey', 'guest']
], function () {
    // Register
    Route::post('/register', [RegisterController::class, 'register']);

    // Login
    Route::post('/login', [LoginController::class, 'login']);

    // Unauthorized
    Route::get('/login', null)->name('login');

    // Forget password
    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);

    // Reset Password
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
});

//
Route::group([
    'middleware' => ['auth.apikey', 'auth:sanctum'],
], function () {
    // get info
    Route::get('/get-info-user', [UserController::class, 'getInfoUser']);

    // verify email
    Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verifyEmail'])
    ->middleware(['signed'])->name('verification.verify');

    // logout
    Route::post('/logout', [LoginController::class, 'logout']);
});


