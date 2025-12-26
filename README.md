# 🏥 MYMEDICAL - Sistem Informasi Manajemen Rumah Sakit KIKO

![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)

Sistem Informasi Manajemen Rumah Sakit yang komprehensif untuk mengelola data pasien, dokter, jadwal praktik, dan rekam medis dengan antarmuka yang modern dan user-friendly.

## 📋 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Teknologi](#-teknologi)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi](#-konfigurasi)
- [Penggunaan](#-penggunaan)
- [Struktur Database](#-struktur-database)
- [Akses Default](#-akses-default)
- [Screenshot](#-screenshot)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)

## ✨ Fitur Utama

### 👨‍💼 Untuk Administrator
- **Manajemen Pengguna**: Kelola akun perawat dan administrator
- **Manajemen Dokter**: CRUD data dokter beserta spesialisasi dan kontak
- **Manajemen Pasien**: Pendaftaran dan pengelolaan data pasien lengkap
- **Jadwal Praktik**: Atur jadwal praktik dokter per hari dan jam
- **Dashboard Statistik**: Visualisasi data pasien dan rekam medis (harian, bulanan, tahunan)
- **Pencarian Global**: Cari data pasien, dokter, dan staff dengan cepat

### 👨‍⚕️ Untuk Perawat
- **Input Pasien Baru**: Registrasi pasien dengan auto-generate nomor RM
- **Rekam Medis**: Input diagnosa, keluhan, dan resep obat
- **Riwayat Inputan**: Lihat rekap data yang pernah diinput
- **Update Data Pasien**: Edit informasi pasien yang sudah terdaftar

### 🔐 Sistem Autentikasi
- Login dengan email dan password
- Role-based access control (Admin & Perawat)
- Auto-assign role berdasarkan domain email (@admin atau @user)
- Username otomatis dari email

## 🛠 Teknologi

**Backend:**
- Laravel 12.x
- PHP 8.2+
- SQLite Database

**Frontend:**
- Blade Templates
- Tailwind CSS 4.0
- Font Awesome 6.4
- Custom CSS untuk styling tambahan

**Libraries:**
- Laravel Vite Plugin
- Carbon (Date manipulation)

## 📦 Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & NPM (untuk asset compilation)
- SQLite Extension enabled
- Extensions: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone <repository-url>
cd rs-kiko
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup

```bash
# Create SQLite database file
touch database/database.sqlite

# Run migrations
php artisan migrate

# Seed database dengan data awal
php artisan db:seed
```

### 5. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 6. Jalankan Server

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## ⚙️ Konfigurasi

### Database Configuration (.env)

```env
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database/db_rs_kiko.sqlite
```

### Mail Configuration (Optional)

```env
MAIL_MAILER=log
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## 📖 Penggunaan

### Registrasi Akun

1. Akses halaman registrasi
2. Masukkan nama lengkap
3. **Email harus menggunakan domain khusus:**
   - `@admin` untuk akun Administrator
   - `@user` untuk akun Perawat
4. Masukkan password minimal 6 karakter
5. Username akan ter-generate otomatis dari email

**Contoh:**
- Email: `admin@admin` → Role: Administrator
- Email: `siti@user` → Role: Perawat

### Login

1. Masukkan email dan password
2. Sistem akan redirect sesuai role:
   - Admin → Dashboard dengan statistik lengkap
   - Perawat → Halaman input pasien/rekam medis

### Mengelola Data Pasien

**Tambah Pasien Baru:**
1. Klik "Tambah Pasien Baru"
2. Isi formulir (Nomor RM otomatis ter-generate)
3. Data yang perlu diisi:
   - Data Pribadi: Nama, NIK, Tanggal Lahir, Jenis Kelamin, Alamat
   - Data Kesehatan: Golongan Darah, Riwayat Penyakit, Alergi, No. BPJS

**Input Rekam Medis:**
1. Pilih pasien dari daftar
2. Klik "Tambah Rekam Medis"
3. Isi: Dokter, Poli, Tanggal Periksa, Keluhan, Diagnosa, Resep

### Mengelola Dokter & Jadwal

**Tambah Dokter:**
1. Menu Kelola Data Dokter
2. Isi: Nama, Spesialisasi, Kontak, Poliklinik

**Atur Jadwal Praktik:**
1. Menu Kelola Jadwal
2. Pilih dokter
3. Tentukan hari, jam mulai, dan jam selesai

## 🗄 Struktur Database

### Tabel Utama

**users**
- Primary Key: `id_user`
- Fields: nama_lengkap, username, email, password, id_role
- Relasi: belongsTo Role

**pasien**
- Primary Key: `id_pasien`
- Fields: nomor_rm (unique), nik, nama_pasien, tgl_lahir, jenis_kelamin, golongan_darah, riwayat_penyakit, riwayat_alergi, no_bpjs, alamat
- Relasi: hasMany RekamMedis

**dokter**
- Primary Key: `id_dokter`
- Fields: nama_dokter, spesialisasi, kontak, id_poli
- Relasi: belongsTo Poli, hasMany Jadwal

**rekam_medis**
- Primary Key: `id_rekam_medis`
- Fields: id_pasien, id_poli, id_dokter, id_user_input, tgl_periksa, keluhan, diagnosa, resep_obat
- Relasi: belongsTo Pasien, Dokter, Poli, User

**jadwals**
- Primary Key: `id`
- Fields: dokter_id, hari, jam_mulai, jam_selesai
- Relasi: belongsTo Dokter

## 🔑 Akses Default

Setelah menjalankan seeder (`php artisan db:seed`), akun berikut tersedia:

### Administrator
- **Email:** `admin@admin`
- **Password:** `admin123`
- **Akses:** Full control semua fitur

### Perawat
- **Email:** `siti@user`
- **Password:** `siti123`
- **Akses:** Input pasien, rekam medis, view data

## 📸 Screenshot

### Halaman Login
Sistem autentikasi dengan validasi role berbasis email domain.

### Dashboard Admin
Menampilkan statistik pasien baru dan rekam medis (harian, bulanan, tahunan).

### Form Pasien
Formulir lengkap dengan auto-generate nomor rekam medis format: `RM-YYYY0001`

### Rekam Medis
Riwayat lengkap pemeriksaan pasien dengan informasi dokter, poli, dan diagnosa.

## 🤝 Kontribusi

Kontribusi sangat diterima! Untuk berkontribusi:

1. Fork repository ini
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📝 Catatan Penting

- **Nomor Rekam Medis** otomatis ter-generate dengan format `RM-TAHUN-URUT` (contoh: `RM-20250001`)
- **Username** auto-generate dari bagian sebelum @ pada email
- **Usia pasien** dihitung otomatis dari tanggal lahir menggunakan Carbon
- **Validasi email** wajib menggunakan domain `@admin` atau `@user`
- **Hanya Admin** yang dapat menghapus data pasien dan mengelola akun perawat

## 🐛 Troubleshooting

### Error: "Database file not found"
```bash
# Pastikan file database sudah dibuat
touch database/database.sqlite
php artisan migrate
```

### Error: "Permission denied"
```bash
# Set permission untuk folder storage dan cache
chmod -R 775 storage bootstrap/cache
```

### Assets tidak muncul
```bash
# Rebuild assets
npm run build
php artisan optimize:clear
```

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).

## 👨‍💻 Developer

Dikembangkan dengan ❤️ menggunakan Laravel Framework

---

**Versi:** 1.0.0  
**Last Update:** Desember 2025  
**Framework:** Laravel 12.x

Untuk pertanyaan dan support, silakan buat issue di repository ini.
