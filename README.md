# Sistem Klinik Sederhana - CodeIgniter 4 (CRUD Produk)

Aplikasi web sistem klinik sederhana dan responsif menggunakan **CodeIgniter 4**.
- **Pengunjung (publik)**: hanya bisa melihat daftar & detail produk/layanan klinik (obat, layanan, alat kesehatan), tanpa perlu login.
- **Admin**: login untuk mengelola (Create, Read, Update, Delete) produk, termasuk upload gambar.

> Catatan: paket ini berisi **file aplikasi (app/) dan public/uploads** saja, bukan seluruh core framework
> CodeIgniter (ribuan file bawaan Composer). Ikuti langkah instalasi di bawah untuk menggabungkannya
> ke dalam skeleton CodeIgniter 4 resmi.

---

## 1. Instalasi

### a. Buat project CodeIgniter 4 baru (butuh Composer & koneksi internet)
```bash
composer create-project codeigniter4/appstarter klinik-ci4-project
```

### b. Salin file dari paket ini
Salin isi folder berikut dari paket ini **ke dalam** project hasil `composer create-project` di atas (timpa file yang sudah ada bila diminta):

```
app/Controllers/           -> app/Controllers/
app/Filters/AuthFilter.php -> app/Filters/AuthFilter.php
app/Models/                -> app/Models/
app/Views/                 -> app/Views/
app/Database/Migrations/   -> app/Database/Migrations/
app/Database/Seeds/        -> app/Database/Seeds/
app/Config/Routes.php      -> app/Config/Routes.php (timpa file default)
public/uploads/            -> public/uploads/
```

### c. Daftarkan filter auth
Buka `app/Config/Filters.php`, lalu ikuti instruksi pada file `app/Config/Filters.php.snippet.txt`
(cukup tambahkan satu baris di property `$aliases`).

### d. Konfigurasi database
Edit file `.env` (copy dari `env`) pada project CI4, isi bagian database:
```env
database.default.hostname = localhost
database.default.database = klinik_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```
Buat database `klinik_db` terlebih dahulu di MySQL/phpMyAdmin.

### e. Jalankan migrasi & seeder
```bash
php spark migrate
php spark db:seed AdminSeeder
```
Ini akan membuat tabel `produk`, `users`, dan 1 akun admin default:
- **Username:** `admin`
- **Password:** `admin123`

*(Segera ganti password ini setelah login pertama kali, untuk keamanan.)*

### f. Jalankan server
```bash
php spark serve
```
Buka `http://localhost:8080` untuk halaman publik, dan `http://localhost:8080/admin/login` untuk login admin.

---

## 2. Struktur Fitur

| Fitur | Publik | Admin |
|---|---|---|
| Lihat daftar produk | ✅ | ✅ |
| Cari & filter kategori | ✅ | ✅ (cari) |
| Lihat detail produk | ✅ | - |
| Tambah produk (+ upload gambar) | ❌ | ✅ |
| Edit produk (+ ganti gambar) | ❌ | ✅ |
| Hapus produk | ❌ | ✅ |
| Login/logout | - | ✅ |

## 3. Kategori Produk
Secara default kategori dibatasi ke: `Obat`, `Layanan`, `Alat Kesehatan`.
Silakan sesuaikan di:
- `app/Database/Migrations/..._CreateProdukTable.php` (kolom ENUM)
- `app/Models/ProdukModel.php` (validationRules)
- Semua view yang memiliki `<select name="kategori">`

## 4. Tampilan
Menggunakan Bootstrap 5 + Bootstrap Icons via CDN sehingga otomatis responsif di desktop, tablet, maupun mobile
(card grid produk menyesuaikan jumlah kolom sesuai lebar layar).

## 5. Keamanan
- Password admin di-hash dengan `password_hash()`.
- CSRF protection aktif melalui `csrf_field()` di semua form.
- Validasi upload gambar: hanya image, maksimal 2MB.
- Halaman admin dilindungi filter `auth` (redirect ke login jika belum login).
