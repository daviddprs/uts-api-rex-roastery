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

### 1. Register User Baru
![Register](https://raw.githubusercontent.com/daviddprs/uts-api-rex-roastery/main/img/01%20-%20POST%20Register%20Berfungsi.png)

### 2. Login (Admin)
![Login Admin](https://raw.githubusercontent.com/daviddprs/uts-api-rex-roastery/main/img/02%20-%20POST%20Login%20Mengembalikan%20Token.png)

### 3. GET Semua Produk
![Get Produk](https://raw.githubusercontent.com/daviddprs/uts-api-rex-roastery/main/img/03%20-%20GET%20Menampilkan%20Daftar%20Produk.png)

### 4. POST Tambah Produk Baru (Admin)
![Tambah Produk](https://raw.githubusercontent.com/daviddprs/uts-api-rex-roastery/main/img/04%20-%20POST%20Tambah%20Produk%20Admin.png)

### 5. PUT Update Produk (Admin)
![Edit Produk](https://raw.githubusercontent.com/daviddprs/uts-api-rex-roastery/main/img/05%20-%20PUT%20Edit%20Produk%20Admin.png)

### 6. Login (User Pembeli)
![Login User](https://raw.githubusercontent.com/daviddprs/uts-api-rex-roastery/main/img/06%20-%20POST%20Login%20User%20Pembeli.png)

### 7. POST Membuat Pesanan Baru (Orders)
![Order Otomatis](https://raw.githubusercontent.com/daviddprs/uts-api-rex-roastery/main/img/07%20-%20POST%20Order%20Kalkulasi%20Otomatis.png)

### 8. GET Melihat Riwayat Pesanan User
![Riwayat Pesanan](https://raw.githubusercontent.com/daviddprs/uts-api-rex-roastery/main/img/08%20-%20GET%20Riwayat%20Pesanan%20User.png)

### 9. Uji Keamanan: Hapus Produk Ditolak (User Biasa)
![Akses Ditolak](https://raw.githubusercontent.com/daviddprs/uts-api-rex-roastery/main/img/09%20-%20DELETE%20Akses%20Ditolak%20User%20Biasa.png)

### 10. Uji Keamanan: Akses Tanpa Token Ditolak
![Tanpa Token](https://raw.githubusercontent.com/daviddprs/uts-api-rex-roastery/main/img/10%20-%20GET%20Akses%20Tanpa%20Token.png)
