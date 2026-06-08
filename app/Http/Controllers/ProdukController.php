<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Lihat semua produk (Semua user yang login bisa)
    public function index()
    {
        $produk = Produk::all();
        return response()->json(['data' => $produk], 200);
    }

    // Tambah produk (Hanya Admin)
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Akses ditolak! Hanya Admin yang boleh.'], 403);
        }

        $request->validate([
            'nama_produk' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        $produk = Produk::create($request->all());
        return response()->json(['message' => 'Produk berhasil ditambahkan', 'data' => $produk], 201);
    }

    // Update produk (Hanya Admin)
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Akses ditolak! Hanya Admin yang boleh.'], 403);
        }

        $produk = Produk::find($id);
        if (!$produk) return response()->json(['message' => 'Produk tidak ditemukan'], 404);

        $produk->update($request->all());
        return response()->json(['message' => 'Produk berhasil diupdate', 'data' => $produk], 200);
    }

    // Hapus produk (Hanya Admin)
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['message' => 'Akses ditolak! Hanya Admin yang boleh.'], 403);
        }

        $produk = Produk::find($id);
        if (!$produk) return response()->json(['message' => 'Produk tidak ditemukan'], 404);

        $produk->delete();
        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
    }
}