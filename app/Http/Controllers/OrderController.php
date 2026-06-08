<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produk;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Lihat Daftar Order (GET /api/orders)
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin') {
            // Admin bisa memantau SEMUA orderan yang masuk
            $orders = Order::with('items.produk', 'user')->get();
        } else {
            // Pembeli cuma bisa lihat riwayat belanjanya sendiri (Filter per user)
            $orders = Order::with('items.produk')->where('user_id', $user->id)->get();
        }

        return response()->json(['data' => $orders], 200);
    }

    // Buat Pesanan Baru (POST /api/orders)
    public function store(Request $request)
    {
        // Validasi inputan dari user
        $request->validate([
            'items' => 'required|array',
            'items.*.produk_id' => 'required|exists:produks,id',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        $user = auth()->user();
        $total_harga = 0; // Set awal 0

        // Buat ID struk Order baru
        $order = Order::create([
            'user_id' => $user->id,
            'total_harga' => 0,
        ]);

        // Looping semua keranjang belanjaan
        foreach ($request->items as $item) {
            $produk = Produk::find($item['produk_id']);
            $harga_satuan = $produk->harga;
            $subtotal = $harga_satuan * $item['jumlah'];

            // Simpan detail belanja ke OrderItem
            OrderItem::create([
                'order_id' => $order->id,
                'produk_id' => $produk->id,
                'jumlah' => $item['jumlah'],
                'harga_satuan' => $harga_satuan,
            ]);

            // Tambahkan ke total_harga otomatis
            $total_harga += $subtotal; 
        }

        // Update tagihan akhir di struk Order
        $order->update(['total_harga' => $total_harga]);

        return response()->json([
            'message' => 'Pesanan berhasil dibuat! Sistem otomatis mengkalkulasi total.',
            'data' => Order::with('items')->find($order->id)
        ], 201);
    }
}