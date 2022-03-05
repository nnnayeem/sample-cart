<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('isAdmin')->prefix('admin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('customers', [\App\Http\Controllers\Admin\UserController::class, 'customers'])->name('customer.index');
    Route::get('orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');

});

