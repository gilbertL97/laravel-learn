<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\BlogController;
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

Route::controller(BlogController::class)->prefix('blog')->group(function () {
    Route::get('/all-post', 'showAll');
    Route::get('/posts/{id}', 'showPrevNext')->whereNumber('id');
    Route::get('/post/{id}', 'show')->whereNumber('id');
    Route::middleware(AuthMiddleware::class)->group(function () {
        Route::post('/post', 'storePost');
        Route::put('/post/{id}', 'update')->whereNumber('id');
        Route::delete('/post{id}', 'destroyPost')->whereNumber('id');
        Route::post('/category', 'storeCategory');
        Route::delete('/category/{id}', 'destroyCategory')->whereNumber('id');
    });
});
