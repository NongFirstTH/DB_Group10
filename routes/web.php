<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', function () {
    return view('profile.show-profile');
})->middleware(['auth', 'verified'])->name('profile.show.profile');

// Cart
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::get('/test', [CartController::class, 'showTest'])->name('test');

Route::get('/order-confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation');


Route::middleware('auth')->group(function () {
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show.profile');
    Route::get('/profile/orders', [OrderController::class, 'showOrders'])->name('profile.show.orders');
    Route::get('/profile/change-password', [ProfileController::class, 'showChangePassword'])->name('profile.show.changePassword');
});

Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');

Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

require __DIR__ . '/auth.php';