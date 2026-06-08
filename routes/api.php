<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OrderController;

// Route Auth (Bisa diakses siapa saja tanpa token)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route yang WAJIB LOGIN (Harus bawa Token Sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // Route Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Route Produk (Lihat produk untuk semua yang sudah login)
    Route::get('/produk', [ProdukController::class, 'index']);

    // Route Produk Khusus Admin (Tambah, Edit, Hapus)
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::put('/produk/{id}', [ProdukController::class, 'update']);
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy']);

    // Route Order / Transaksi
    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);

});