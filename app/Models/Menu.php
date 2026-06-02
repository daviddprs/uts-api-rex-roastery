<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    // Mengizinkan kolom di bawah ini untuk diisi data via API
    protected $fillable = [
        'nama_menu', 
        'harga', 
        'kategori', 
        'deskripsi'
    ];
}