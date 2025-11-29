<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Route Utama (Index) - Menampilkan tabel & form edit
Route::get('/product', [ProductController::class, 'index'])->name("product.index");

// Route Halaman Tambah (Create)
Route::get('/product/create', [ProductController::class, 'create'])->name("product.create");

// Route edit
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name("product.edit");

// Route Proses (Store, Update, Delete)
Route::post('/product', [ProductController::class, 'store'])->name("product.store");
Route::put('/product/{id}', [ProductController::class, 'update'])->name("product.update");
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name("product.delete");

