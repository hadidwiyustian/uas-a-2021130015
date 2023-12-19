<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderControllershowOrders;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [AppController::class, 'index'])->name('index');
Route::resource('menus', MenuController::class);
Route::get('/orders', [OrderController::class, 'order'])->name('order');
Route::post('/orders', [OrderController::class, 'createOrder'])->name('order.createOrder');
Route::get('/list', [OrderController::class, 'index'])->name('orders.index');
Route::get('/show/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
