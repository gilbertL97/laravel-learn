<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Middleware\CanAccesUser;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(CanAccesUser::class)->controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('/', 'index'); //las demas rutas etc
});
// Route::middleware(CanAccesUser::class)->group(function () {
//     Route::apiResource('auth', AuthController::class)->names('auth');
// });
