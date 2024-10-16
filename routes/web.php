<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [HomePageController::class,'showCategory'])->name('homepage.index');
Route::get('/category/{category_name}', [HomePageController::class, 'getProduct'])->name('homepage.show-product');
Route::get('/product/{id}', [ProductController::class, 'showProductPage'])->name('product.show');

