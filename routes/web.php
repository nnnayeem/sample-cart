<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::redirect('/', '/login');
Route::redirect('/home', '/admin/dashboard');

Auth::routes();

Route::middleware('isAdmin')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('home');
    Route::get('customers', [UserController::class, 'customers'])->name('customer.index');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

});

