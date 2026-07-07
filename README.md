# Klinik Sehat - CodeIgniter 4

Sistem website Klinik Sehat sederhana berbasis CodeIgniter 4 untuk menampilkan produk, obat, layanan kesehatan, dan halaman login admin.

## Fitur utama

- Halaman publik untuk melihat obat, layanan, dan informasi klinik
- Pencarian produk berdasarkan kata kunci dan kategori
- Halaman detail produk
- Login admin untuk mengelola data produk
- Upload gambar produk

## Teknologi yang dipakai

- PHP 8+
- CodeIgniter 4
- Bootstrap 5
- Bootstrap Icons
- MySQL

## Persiapan

Pastikan komputer Anda sudah memiliki:

- PHP
- Composer
- MySQL
- Web server lokal seperti XAMPP atau Laragon

## Instalasi

1. Clone repository ini
   ```bash
   git clone <url-repository>
   cd sistem_klinik_sederhana
   ```
2. Install dependency
   ```bash
   composer install
   ```
3. Salin file contoh environment
   ```bash
   copy env .env
   ```
   atau jika memakai Linux/macOS:
   ```bash
   cp env .env
   ```
4. Atur konfigurasi database di file `.env`
   ```env
   database.default.hostname = localhost
   database.default.database = klinik_db
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   ```
5. Buat database `klinik_db` di MySQL
6. Jalankan migrasi dan seeder
   ```bash
   php spark migrate
   php spark db:seed AdminSeeder
   ```
7. Jalankan aplikasi
   ```bash
   php spark serve
   ```

Buka:

- Halaman publik: http://localhost:8080/
- Login admin: http://localhost:8080/admin/login

## Akun admin default

- Username: `admin`
- Password: `admin123`

## Catatan

- Ganti password admin setelah login pertama kali.
- File upload produk disimpan di folder public/uploads.
- File `.env` tidak ikut di-push ke GitHub.
