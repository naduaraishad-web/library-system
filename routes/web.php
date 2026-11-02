<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

// Mengarahkan halaman utama otomatis ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

// Route untuk yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Route halaman buku (hanya bisa diakses kalau sudah login)
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
});