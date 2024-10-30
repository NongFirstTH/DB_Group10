<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/category', [CategoryController::class, 'showCategory'])->name('category.index');
Route::get('/category/{category_name}', [CategoryController::class, 'getProduct'])->name('category.show-product');

Route::get('/profile', function () {
    return view('profile.show-profile');
})->middleware(['auth', 'verified'])->name('profile.show-profile');

Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show-profile');
    Route::get('/profile/orders', [OrderController::class, 'showOrders'])->name('profile.show-order');
    Route::get('/profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/photo', [UserController::class, 'editPhoto'])->name('profile.edit.photo');
    Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');


    Route::get('/product/{id}', [ProductController::class, 'showProductPage'])->name('product.show');

    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/order-confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});





require __DIR__ . '/auth.php';