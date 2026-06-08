<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'produk_id', 'jumlah', 'harga_satuan'];

    // Relasi: OrderItem dimiliki oleh satu Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi: OrderItem terhubung ke satu Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}