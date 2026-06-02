<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi input dari Thunder Client
        $request->validate([
            'nama_kasir' => 'required|string',
            'items' => 'required|array',
            'items.*.menu_id' => 'required|exists:menus,id',
            'items.*.kuantitas' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            // 2. Buat data transaksi utama
            $order = Order::create([
                'nama_kasir' => $request->nama_kasir,
                'total_harga' => 0, 
                'status_pesanan' => 'selesai'
            ]);

            $totalHarga = 0;

            // 3. Looping pesanan untuk potong stok
            foreach ($request->items as $item) {
                $menu = Menu::find($item['menu_id']);

                if ($menu->stok_tersedia < $item['kuantitas']) {
                    return response()->json([
                        'message' => "Gagal! Stok untuk menu {$menu->nama_produk} tidak mencukupi. Sisa stok: {$menu->stok_tersedia}"
                    ], 400); 
                }

                $subtotal = $menu->harga * $item['kuantitas'];
                $totalHarga += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $menu->id,
                    'kuantitas' => $item['kuantitas'],
                    'subtotal' => $subtotal
                ]);

                // 4. Potong stok di database
                $menu->stok_tersedia -= $item['kuantitas'];
                $menu->save();
            }

            // 5. Update total harga
            $order->update(['total_harga' => $totalHarga]);

            DB::commit();

            return response()->json([
                'message' => 'Pesanan berhasil dibuat dan stok telah dikurangi!',
                'data' => $order->load('items.menu')
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi kesalahan pada server saat memproses pesanan.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}