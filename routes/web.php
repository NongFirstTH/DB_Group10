<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [CategoryController::class,'showCategory'])->name('homepage.index');
Route::get('/category/{category_name}', [CategoryController::class, 'getProduct'])->name('homepage.show-product');

Route::get('/profile', function () {
    return view('profile.show-profile');
})->middleware(['auth', 'verified'])->name('profile.show-profile');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/product/{id}', [ProductController::class, 'showProductPage'])->name('product.show');
    Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.cart');
});


require __DIR__.'/auth.php';
