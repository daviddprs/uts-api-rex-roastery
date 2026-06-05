<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_harga'];

    // Relasi: Satu Order dimiliki oleh satu User (belongsTo)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Satu Order memiliki banyak item (hasMany)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}