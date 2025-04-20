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

// Halaman User
Route::get('user/{id}/name/{name}', [UserController::class, 'show']);

// Halaman Penjualan
Route::get('penjualan', [TransactionController::class, 'index']);

// Level
Route::get('/level', [LevelController::class, 'index']);

// Kategori
Route::get('/kategori', [KategoriController::class, 'index']);

// User
Route::get('/user', [UserController::class, 'index']);