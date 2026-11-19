<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Bisa diakses Admin & Petugas
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::resource('borrowings', BorrowingController::class)->only(['index', 'create', 'store', 'show']);
    Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.return');
});

// Khusus Admin: Kelola Kategori (Tambah, Edit, Hapus)
Route::middleware(['auth', 'can:manage-categories'])->group(function () {
    Route::resource('categories', CategoryController::class)->except(['index', 'show']);
});

// Khusus Admin: Kelola User
Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::resource('users', UserController::class);
});