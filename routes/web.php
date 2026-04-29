<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // About Route
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    // Product Routes (Dilindungi oleh Gate manage-product untuk Create & Store)
    Route::middleware('can:manage-product')->group(function () {
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    });

    // Product Routes (Akses publik bagi user yang login)
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    // Category Routes (TAMBAHAN UJIAN UCP 1: Dilindungi penuh oleh Gate manage-category)
    Route::resource('category', CategoryController::class)->middleware('can:manage-category');
});

require __DIR__.'/auth.php';