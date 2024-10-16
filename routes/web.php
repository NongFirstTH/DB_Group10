<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/profile', function () {
    return view('profile.show-profile');
})->middleware(['auth', 'verified'])->name('profile.show-profile');

Route::middleware('auth')->group(function () {
    // Route::get('/Profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/Profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/Profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Route::get('/profile/bio', [UserController::class, 'showBio'])->name('profile.show-bio');
    // Route::patch('/profile/bio', [UserController::class, 'updateBio'])->name('profile.update-bio');

});

Route::post('/profile/photo/update', [UserController::class, 'updateProfilePhoto'])->name('profile.photo.update');

require __DIR__.'/auth.php';
