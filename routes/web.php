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

// Main Homepage - Protected route, only accessible by authenticated users
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

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
    Route::get('{id}/name/{name}', [UserController::class, 'show'])->name('profile');
    Route::prefix('{id}')->group(function () {
        Route::get('ubah', [UserController::class, 'ubah'])->name('ubah');
        Route::put('ubah_simpan', [UserController::class, 'ubah_simpan'])->name('ubah.simpan');
        Route::get('hapus', [UserController::class, 'hapus'])->name('hapus');
    });
});

// Sales Transaction Route
Route::get('penjualan', [TransactionController::class, 'index'])->name('transaksi');

// System Management Routes
Route::prefix('system')->name('system.')->group(function () {
    Route::get('level', [LevelController::class, 'index'])->name('level');
});

// Kategori Routes (Menggunakan Route::resource untuk menyederhanakan rute)
Route::resource('kategori', KategoriController::class)->except(['show']);