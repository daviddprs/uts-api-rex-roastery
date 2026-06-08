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
```

**2. Setup Environment Variables**
Copy file .env.example dan ubah namanya menjadi .env
Setelah itu, generate application key dengan perintah: php artisan key:generate

**3. Setup Database**
Buka phpMyAdmin atau HeidiSQL, lalu buat database baru (misalnya dengan nama rex_roastery_api).

Buka file .env di text editor, lalu sesuaikan konfigurasi koneksi database berikut:
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=rex_roastery_api
- DB_USERNAME=root
- DB_PASSWORD=

**4. Jalankan Migrasi & Seeder**
Untuk membuat struktur tabel dan mengisi data awal (dummy data) berupa 1 Admin, 2 User, dan 5 Produk secara otomatis, jalankan perintah ini di Terminal:
php artisan migrate --seed

**5. Jalankan Local Server**
Setelah semua setup selesai, jalankan server Laravel dengan perintah: php artisan serve
Server akan berjalan di
```bash
http://127.0.0.1:8000.
```

Pengujian API (Testing)
Untuk melakukan pengujian endpoint, Anda dapat meng-import file Collection Postman (.json) yang telah disertakan di dalam folder pengumpulan ini ke dalam aplikasi Postman Anda. Terdapat 10 request pengujian yang sudah dikonfigurasi termasuk skenario error handling.

## 📸 Hasil Pengujian API (Postman Screenshots)
Berikut adalah 10 bukti pengujian endpoint API yang telah dilakukan menggunakan Postman:

### 1. Register User Baru
![Register](<Screenshots_Postman/01 - POST Register Berfungsi.png>)

### 2. Login (Admin)
![Login Admin](<Screenshots_Postman/02 - POST Login Mengembalikan Token.png>)

### 3. GET Semua Produk
![Get Produk](<Screenshots_Postman/03 - GET Menampilkan Daftar Produk.png>)

### 4. POST Tambah Produk Baru (Admin)
![Tambah Produk](<Screenshots_Postman/04 - POST Tambah Produk Admin.png>)

### 5. PUT Update Produk (Admin)
![Edit Produk](<Screenshots_Postman/05 - PUT Edit Produk Admin.png>)

### 6. Login (User Pembeli)
![Login User](<Screenshots_Postman/06 - POST Login User Pembeli.png>)

### 7. POST Membuat Pesanan Baru (Orders)
![Order Otomatis](<Screenshots_Postman/07 - POST Order Kalkulasi Otomatis.png>)

### 8. GET Melihat Riwayat Pesanan User
![Riwayat Pesanan](<Screenshots_Postman/08 - GET Riwayat Pesanan User.png>)

### 9. Uji Keamanan: Hapus Produk Ditolak (User Biasa)
![Akses Ditolak](<Screenshots_Postman/09 - DELETE Akses Ditolak User Biasa.png>)

### 10. Uji Keamanan: Akses Tanpa Token Ditolak
![Tanpa Token](<Screenshots_Postman/10 - GET Akses Tanpa Token.png>)

## LAPORAN TUGAS UTS: SISTEM MANAJEMEN PRODUK & TRANSAKSI (MINI E-COMMERCE API)
**1. Entity Relationship Diagram (ERD) Database.**
Sistem ini menggunakan 4 tabel utama dengan relasi (hasMany / belongsTo) sebagai berikut:
![Laporan](<Screenshots_Postman/ERD.png>)

**2. Sistem ini menggunakan 4 tabel utama dengan relasi (hasMany / belongsTo) sebagai berikut:**
- Tabel users: Menyimpan data pengguna (Admin dan User biasa). Memiliki relasi One-to-Many dengan tabel orders (Satu user bisa memiliki banyak pesanan).
- Tabel produk: Menyimpan master data produk E-Commerce. Memiliki relasi One-to-Many dengan tabel order_items (Satu produk bisa ada di banyak detail pesanan).
- Tabel orders: Menyimpan data transaksi/keranjang belanja. Berelasi Belongs-To ke tabel users, dan One-to-Many ke tabel order_items.
- Tabel order_items: Menyimpan detail barang yang dibeli dalam satu transaksi. Berelasi Belongs-To ke orders dan produk.

**3. Daftar Endpoint API (10 Endpoint Postman)**
Berikut adalah daftar rute API yang telah dibangun dan berhasil diuji di Postman:
![Tabel](<Screenshots_Postman/Tabelpoint.png>)

**3. 3.	Kendala & Solusi Selama Pengembangan**
- Kendala 1: Kesulitan dalam memisahkan hak akses antara Admin dan User biasa pada endpoint Produk (Create, Update, Delete).
Solusi: Menerapkan pengecekan role di dalam Controller atau menggunakan Middleware khusus yang mengecek kolom role (atau is_admin) pada tabel users milik pengguna yang sedang terautentikasi melalui token.
- Kendala 2: Melakukan kalkulasi total pesanan (Total Price) secara otomatis saat endpoint POST /api/orders dieksekusi.
Solusi: Menghapus folder vendor karena nanti dapat di-generate ulang menggunakan composer install, dan menyertakan file .env.example sebagai panduan konfigurasi database untuk penguji.
