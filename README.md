
# Digi Store

<img width="1024" height="572" alt="image" src="https://github.com/user-attachments/assets/f759250a-1f37-421b-9d81-f99566a39fba" />


> Digi Store adalah aplikasi web e-commerce modern berbasis Laravel yang memudahkan pengguna untuk mencatat, memahami, dan mengelola transaksi keuangan serta belanja produk digital secara real-time. Dengan fitur insight AI, dashboard interaktif, dan desain responsif, Digi Store membantu pengguna mencapai kontrol finansial yang lebih baik.

---

## Fitur Utama

- **Manajemen Produk (CRUD):** Tambah, edit, hapus, dan kelola produk digital dengan mudah.
- **Kategori Produk:** Pengelompokan produk berdasarkan kategori.
- **Keranjang Belanja:** Pengguna dapat menambah produk ke keranjang dan checkout.
- **Checkout & Order:** Proses pembelian dan riwayat pesanan.
- **Autentikasi Pengguna:** Registrasi, login, dan manajemen akun.
- **Dashboard Admin:** Pantau statistik penjualan, transaksi, dan insight keuangan.
- **AI Financial Insight:** Analisis pola transaksi dan rekomendasi keuangan.
- **Laporan & Grafik:** Visualisasi pemasukan, pengeluaran, dan kategori.
- **Desain Responsif:** Menggunakan Tailwind CSS, tampilan optimal di berbagai perangkat.

## Teknologi yang Digunakan

- **Laravel** (Backend)
- **Tailwind CSS** (UI/UX)
- **Vite** (Build tool)
- **MySQL** (Database)
- **JavaScript/Blade** (Frontend)

## Screenshot

Letakkan file screenshot aplikasi pada folder `docs/screenshot.png`.

Contoh tampilan:

![Contoh Screenshot](docs/screenshot.png)

---

## Instalasi

1. **Clone repository**
   ```bash
   git clone <repo-url>
   cd digi-store
   ```
2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```
3. **Copy file environment**
   ```bash
   cp .env.example .env
   ```
4. **Generate application key**
   ```bash
   php artisan key:generate
   ```
5. **Konfigurasi database**
   Edit file `.env` sesuai konfigurasi database Anda.
6. **Migrasi dan seeder database**
   ```bash
   php artisan migrate --seed
   ```
7. **Build assets**
   ```bash
   npm run build
   ```
8. **Jalankan server**
   ```bash
   php artisan serve
   ```

Akses aplikasi di `http://localhost:8000`

---

## Struktur Folder Penting

- `app/Models` : Model Eloquent
- `app/Http/Controllers` : Controller aplikasi
- `database/migrations` : File migrasi database
- `resources/views` : Blade template
- `routes/web.php` : Routing utama

---

## Cara Penggunaan

1. Register akun baru atau login.
2. Tambahkan produk ke keranjang dan lakukan checkout.
3. Pantau transaksi dan laporan keuangan di dashboard.
4. Gunakan insight AI untuk rekomendasi pengelolaan keuangan.

---

## Kontribusi

Pull request dan issue sangat terbuka untuk pengembangan lebih lanjut. Silakan fork repository ini dan ajukan perubahan atau perbaikan.

---

## Lisensi

Proyek ini menggunakan lisensi MIT.
