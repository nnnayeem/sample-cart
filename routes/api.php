<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FrontController;
use App\Http\Controllers\Api\V1\OrderController;
use Illuminate\Support\Facades\Route;

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
