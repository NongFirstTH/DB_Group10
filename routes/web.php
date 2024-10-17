<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomePageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [HomePageController::class,'showCategory'])->name('homepage.index');
Route::get('/category/{category_name}', [HomePageController::class, 'getProduct'])->name('homepage.show-product');

Route::get('/profile', function () {
    return view('profile.show-profile');
})->middleware(['auth', 'verified'])->name('profile.show-profile');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/product/{id}', [ProductController::class, 'showProductPage'])->name('product.show');
    Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');
});


require __DIR__.'/auth.php';
