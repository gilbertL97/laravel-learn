<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\UserController;
use Modules\Auth\Http\Middleware\AuthMiddleware;
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

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::middleware(CanAccesUser::class)->group(function () {
        Route::post('/', 'index'); //las demas rutas etc
        Route::post('/login', 'login');
    });
});
Route::controller(UserController::class)->prefix('auth')->group(function () {
    Route::middleware(AuthMiddleware::class)->group(function () {
        Route::post('/user', 'store');
        Route::get('/user/{id}', 'show')->whereNumber('id');
        Route::get('/user', 'index');
        Route::patch('/user/{id}', 'update')->whereNumber('id');
        Route::delete('/user/{id}', 'destroy')->whereNumber('id');
    });
});
// Route::middleware(CanAccesUser::class)->group(function () {
//     Route::apiResource('auth', AuthController::class)->names('auth');
// });
