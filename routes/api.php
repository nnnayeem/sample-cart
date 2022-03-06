<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FrontController;
use App\Http\Controllers\Api\V1\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::prefix('V1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');
    });

    Route::middleware('auth:sanctum')->prefix('private')->group(function (){
        Route::get('order/history', [OrderController::class, 'history']);
        Route::post('order/checkout', [OrderController::class, 'checkout']);
    });

    Route::prefix('front')->group(function (){
        Route::get('products', [FrontController::class, 'products']);
    });
});
