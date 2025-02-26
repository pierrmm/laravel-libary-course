<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
       Route::resource('books', BukuController::class);
       Route::resource('peminjaman', PeminjamanController::class);
    });
    Route::middleware('role:user')->group(function () {
       Route::resource('peminjaman', PeminjamanController::class);
    });
});

require __DIR__.'/auth.php';
