<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [HomePageController::class,'showCategory'])->name('homepage.index');
Route::get('/homepage/{id}', [HomePageController::class, 'getProduct'])->name('homepage.show-product');

