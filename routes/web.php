<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

// Jalur Login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

// Jalur CRUD (Hanya bisa diakses setelah Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function() { return view('dashboard'); });
    Route::resource('books', BookController::class);
});