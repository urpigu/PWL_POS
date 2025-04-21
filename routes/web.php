<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;

// Halaman Home
Route::get('/', function () {
    return view('home');
});

// Halaman Products
Route::prefix('category')->group(function () {
    Route::get('food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('home-care', [ProductController::class, 'homeCare']);
    Route::get('baby-kid', [ProductController::class, 'babyKid']);
});

// Halaman User dengan parameter dinamis
Route::get('user/{id}/name/{name}', [UserController::class, 'show']);

// Halaman Penjualan
Route::get('penjualan', [TransactionController::class, 'index']);

// Halaman Level
Route::get('/level', [LevelController::class, 'index']);

// Halaman Kategori
Route::get('/kategori', [KategoriController::class, 'index']);

// User Routes
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);

// Route untuk menampilkan form ubah (GET)
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);

// Route untuk proses update user (PUT)
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);

// Route untuk hapus user (sesuai instruksi)
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
