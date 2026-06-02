<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MenuController;

// Jalan untuk melihat daftar menu (GET)
Route::get('/menus', [MenuController::class, 'index']);

// Jalan untuk menambah menu baru (POST) -> INI DIA YANG TADI HILANG!
Route::post('/menus', [MenuController::class, 'store']);