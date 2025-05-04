<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;

// Authentication Routes
Auth::routes();

// Main Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Category Product Routes
Route::prefix('category')->name('category.')->group(function () {
    Route::get('food-beverage', [ProductController::class, 'foodBeverage'])->name('food-beverage');
    Route::get('beauty-health', [ProductController::class, 'beautyHealth'])->name('beauty-health');
    Route::get('home-care', [ProductController::class, 'homeCare'])->name('home-care');
    Route::get('baby-kid', [ProductController::class, 'babyKid'])->name('baby-kid');
});

// User Management Routes
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('tambah', [UserController::class, 'tambah'])->name('tambah');
    Route::post('tambah_simpan', [UserController::class, 'tambah_simpan'])->name('tambah.simpan');

    // Dynamic Parameter Route
    Route::get('{id}/name/{name}', [UserController::class, 'show'])->name('profile');

    // User Modification Routes
    Route::prefix('{id}')->group(function () {
        Route::get('ubah', [UserController::class, 'ubah'])->name('ubah');
        Route::put('ubah_simpan', [UserController::class, 'ubah_simpan'])->name('ubah.simpan');
        Route::get('hapus', [UserController::class, 'hapus'])->name('hapus');
    });
});

// Sales Transaction Route
Route::get('penjualan', [TransactionController::class, 'index'])->name('transaksi');

// System Management Routes
Route::prefix('system')->group(function () {
    Route::get('level', [LevelController::class, 'index'])->name('level');
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
});

// Kategori Route - Jobsheet 5
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori', [KategoriController::class, 'store']);
