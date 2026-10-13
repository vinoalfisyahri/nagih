<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

// ==========================================
// 1. ROUTE PUBLIK (Bisa diakses siapa saja)
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk memproses pesanan top-up & melihat detail transaksi
Route::post('/topup', [TransactionController::class, 'store'])->name('topup.store');
Route::get('/topup/{invoice_id}', [TransactionController::class, 'show'])->name('transaction.show');


// ==========================================
// 2. ROUTE DASHBOARD USER (Bawaan Breeze)
// ==========================================
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// ==========================================
// 3. ROUTE KHUSUS ADMIN (Login + Role Admin)
// ==========================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kelola Game (Admin)
    Route::get('/games', [GameController::class, 'index'])->name('game.index');
    Route::get('/games/create', [GameController::class, 'create'])->name('game.create');
    Route::post('/games', [GameController::class, 'store'])->name('game.store');
    Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('game.destroy');

    // Kelola Produk / Nominal Top-Up (Admin)
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/products', [ProductController::class, 'store'])->name('product.store');
});


// ==========================================
// 4. ROUTE PROFILE USER
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Memuat rute autentikasi bawaan Laravel Breeze (login, register, forgot-password, dll)
require __DIR__.'/auth.php';