<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Fungsi untuk menampilkan semua data menu (Read)
    public function index()
    {
        $menus = Menu::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Data menu Rex Roastery berhasil diambil',
            'data' => $menus
        ]);
    }

    // Fungsi untuk menambah data menu baru (Create)
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string',
            'harga' => 'required|integer',
            'kategori' => 'required|string',
        ]);

        $menu = Menu::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Menu baru berhasil ditambahkan!',
            'data' => $menu
        ], 201);
    }
}