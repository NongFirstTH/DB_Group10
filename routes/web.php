<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cart', [CartController::class, 'showCart'])->name('cart');

Route::get('/HomePage', [HomePageController::class, 'showHomePage'])->name('homepage.index');

Route::get('/test', [CartController::class, 'showTest'], function () {
    return view('test');
});