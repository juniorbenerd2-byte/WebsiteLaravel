
# Digi Store

<img width="1024" height="572" alt="image" src="https://github.com/user-attachments/assets/f759250a-1f37-421b-9d81-f99566a39fba" />


> Digi Store adalah aplikasi web e-commerce modern berbasis Laravel yang memudahkan pengguna untuk mencatat, memahami, dan mengelola transaksi keuangan serta belanja produk digital secara real-time. Dengan fitur insight AI, dashboard interaktif, dan desain responsif, Digi Store membantu pengguna mencapai kontrol finansial yang lebih baik.

---

### 🛍️ Portal Pelanggan (Customer Area)

**1. Halaman Beranda (Landing Page)**
Halaman utama yang didesain untuk menarik perhatian pelanggan dan memudahkan navigasi awal.
*   **Hero Section & Promosi:** Menampilkan banner *Flash Sale* atau promo utama dengan tombol *Call-to-Action* (CTA) "Belanja Sekarang".
*   **Navigasi Cepat (Belanja by Brand):** Pelanggan dapat langsung menyaring produk berdasarkan brand populer (Samsung, Apple, Xiaomi, OPPO, Vivo, Realme).
*   **Highlight Layanan:** Informasi nilai tambah toko seperti "Gratis Ongkir", "Garansi Resmi", "Retur 7 Hari", dan "CS 24/7".
*   **Statistik Toko:** Menampilkan jumlah produk, pelanggan, dan brand yang tersedia untuk membangun kepercayaan.

**2. Autentikasi (Login & Register)**
Sistem akses yang aman dan mudah bagi pengguna.
*   **Login:** Masuk menggunakan Email dan Password, dilengkapi dengan fitur "Ingat Saya" (Remember Me).
*   **Register:** Pendaftaran akun baru yang meminta Nama Lengkap, Email, dan validasi Konfirmasi Password (minimal 8 karakter).

**3. Halaman Katalog Produk (Product Listing)**
Pusat pencarian produk dengan alat navigasi yang komprehensif.
*   **Pencarian Cerdas:** Bilah pencarian (*search bar*) di bagian atas untuk mencari tipe smartphone secara instan.
*   **Sistem Filter Lengkap (Sidebar):** Filter dinamis berdasarkan Brand, Rentang Harga (Min - Max), dan Pengurutan (Terbaru, dll).
*   **Kartu Produk Informatif:** Menampilkan gambar, nama, harga (termasuk harga coret/diskon), sisa stok, label persentase diskon, dan label "Unggulan".
*   **Aksi Cepat:** Tombol "Keranjang" langsung di kartu produk.

**4. Halaman Detail Produk**
Menyajikan informasi mendalam untuk meyakinkan pelanggan sebelum membeli.
*   **Galeri & Info Utama:** Gambar produk besar, harga final, badge total penghematan, dan jumlah stok tersedia.
*   **Kontrol Pembelian:** Penyesuaian kuantitas produk (-/+) dan tombol utama "Tambah ke Keranjang".
*   **Tabel Spesifikasi Lengkap:** Menjabarkan detail teknis seperti ukuran Layar, kapasitas RAM & Storage, resolusi Kamera, OS, Prosesor, dan kapasitas Baterai.

**5. Dashboard Pelanggan**
Pusat kendali akun pelanggan untuk memantau aktivitas belanja.
*   **Ringkasan Metrik:** Menampilkan Total Pesanan, Pesanan Diproses, Pesanan Selesai, dan jumlah item di Keranjang.
*   **Total Belanja:** Kartu khusus yang menunjukkan total akumulasi pengeluaran pelanggan di toko.
*   **Status Pesanan:** Rincian pelacakan pesanan secara *real-time* (Menunggu, Diproses, Dikirim, Selesai, Dibatalkan).
*   **Pesanan Terbaru:** Akses cepat untuk melihat barang yang baru saja di-checkout.

---

### 💼 Panel Admin (Admin Dashboard)

**1. Halaman Manajemen Produk (Kelola Produk)**
Pusat pengelolaan inventaris toko.
*   **Tabel Inventaris:** Menampilkan daftar lengkap produk beserta Brand, Harga, Stok, Status (Aktif/Tidak), dan label keunggulan.
*   **Fitur CRUD:** Tombol "Tambah Produk" untuk memasukkan item baru, serta aksi "Edit" dan "Hapus" pada masing-masing baris.

**2. Halaman Manajemen Kategori**
Mengatur struktur pengelompokan produk.
*   **Daftar Kategori:** Tabel yang berisi Ikon, Nama Kategori (Brand), Slug (URL), dan Jumlah Produk yang terikat pada kategori tersebut.
*   **Fitur CRUD:** Kemampuan untuk menambah kategori baru, mengubah, atau menghapus kategori yang sudah ada.

**3. Halaman Kelola Pesanan (Order Management)**
Memantau dan memproses transaksi yang masuk dari pelanggan.
*   **Daftar Transaksi:** Menampilkan No. Pesanan, Nama Pelanggan, Total Harga, Metode Pengiriman (misal: COD), Status Pesanan (Pending, dll), Status Pembayaran (Belum Bayar, dll), dan Tanggal transaksi.
*   **Detail Aksi:** Tombol "Detail" untuk memperbarui status pesanan (misal: dari *Pending* menjadi *Diproses* atau *Dikirim*).

**4. Halaman Manajemen Pengguna (User Management)**
Mengelola hak akses dan memantau aktivitas pengunjung.
*   **Statistik Pengguna:** Metrik ringkas mengenai Total User, jumlah Admin, jumlah Pelanggan, dan Sesi Aktif saat ini.
*   **Tabel Pengguna:** Menampilkan detail akun (Nama, Email, Role Admin/Pelanggan, total pesanan & keranjang, status Online/Offline).
*   **Riwayat Sesi Aktif (Active Sessions):** Fitur keamanan yang melacak IP Address, jenis Browser, dan stempel waktu aktivitas terakhir dari pengguna yang sedang masuk.

## Teknologi yang Digunakan

- **Laravel** (Backend)
- **Tailwind CSS** (UI/UX)
- **Vite** (Build tool)
- **MySQL** (Database)
- **JavaScript/Blade** (Frontend)

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
