# UTS E-Commerce API

Project ini adalah RESTful API untuk Sistem Manajemen Produk dan Transaksi (Mini E-Commerce) yang dibangun menggunakan Framework Laravel. Project ini ditujukan untuk memenuhi tugas Ujian Tengah Semester (UTS).

## Identitas
- **Nama:** David Prastiansyah
- **NIM:** 2305101026
- **Kelas:** 6B
- **Tugas:** UTS E-Commerce API

## Persyaratan Sistem
Sebelum menjalankan aplikasi ini, pastikan komputer/laptop sudah terinstall:
- PHP >= 8.1
- Composer
- MySQL (XAMPP / Laragon)
- Postman (untuk pengujian API)

---

## Cara Menjalankan Project (Installation Guide)

Ikuti langkah-langkah di bawah ini untuk menjalankan project secara lokal:

**1. Install Dependensi (Penting)**
Karena folder `vendor` tidak disertakan dalam file pengumpulan untuk menghemat ukuran, silakan buka Terminal/Command Prompt di dalam folder project ini, lalu jalankan perintah:
```bash
composer install

**2. Setup Environment Variables**
Copy file .env.example dan ubah namanya menjadi .env
Setelah itu, generate application key dengan perintah: php artisan key:generate

**3. Setup Database**
Buka phpMyAdmin atau HeidiSQL, lalu buat database baru (misalnya dengan nama rex_roastery_api).

Buka file .env di text editor, lalu sesuaikan konfigurasi koneksi database berikut:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rex_roastery_api
DB_USERNAME=root
DB_PASSWORD=

**4. Jalankan Migrasi & Seeder**
Untuk membuat struktur tabel dan mengisi data awal (dummy data) berupa 1 Admin, 2 User, dan 5 Produk secara otomatis, jalankan perintah ini di Terminal:
php artisan migrate --seed

**5. Jalankan Local Server**
Setelah semua setup selesai, jalankan server Laravel dengan perintah: php artisan serve
Server akan berjalan di http://127.0.0.1:8000.

Pengujian API (Testing)
Untuk melakukan pengujian endpoint, Anda dapat meng-import file Collection Postman (.json) yang telah disertakan di dalam folder pengumpulan ini ke dalam aplikasi Postman Anda. Terdapat 10 request pengujian yang sudah dikonfigurasi termasuk skenario error handling.

img/01 - POST Register Berfungsi.png
