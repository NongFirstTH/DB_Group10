<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/HomePage', [HomePageController::class,'showHomePage'])->name('homepage.index');
