<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', ProductController::class);

Route::resource('/orders', OrderController::class);

Route::singleton('/cart', CartController::class);
