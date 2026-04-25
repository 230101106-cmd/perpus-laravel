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

//use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Models\Book;

// Rute Publik
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute Terproteksi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [BookController::class, 'index']);
    Route::post('/books/store', [BookController::class, 'store']);
    Route::get('/books/delete/{$id}', [BookController::class, 'destroy']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    /*Route::get('/logout', function() {
        auth()->logout();
        return redirect('/login');
    });*/
});

