<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;

// Authentication Routes
Auth::routes();

// Route for root page
Route::get('/', function () {
    return redirect()->route('home');
})->name('welcome');

// Main Homepage - Protected route, only accessible by authenticated users
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Category Routes (Using Route::resource to simplify routes)
Route::resource('kategori', KategoriController::class)->except(['show']); // Mengelola kategori menggunakan resource