<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat 1 Akun Admin
        User::create([
            'name' => 'Admin Rex',
            'email' => 'admin@rex.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Buat 2 Akun User Biasa (Pembeli)
        User::create([
            'name' => 'Pembeli Satu',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Pembeli Dua',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        // 3. Buat 5 Data Produk Kopi
        $produks = [
            ['nama_produk' => 'Kopi Susu Gula Aren', 'harga' => 25000, 'deskripsi' => 'Kopi susu creamy dengan aren asli'],
            ['nama_produk' => 'Americano Classic', 'harga' => 20000, 'deskripsi' => 'Espresso dengan tambahan air mineral murni'],
            ['nama_produk' => 'Cafe Latte', 'harga' => 28000, 'deskripsi' => 'Espresso dengan susu panas dan busa tebal'],
            ['nama_produk' => 'Matcha Espresso', 'harga' => 30000, 'deskripsi' => 'Perpaduan matcha jepang premium dan espresso'],
            ['nama_produk' => 'Caramel Macchiato', 'harga' => 32000, 'deskripsi' => 'Kopi susu dengan sirup vanilla dan saus karamel'],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}