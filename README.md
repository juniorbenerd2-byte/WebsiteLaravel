# 📱 DigiStore - E-Commerce Platform for Smartphones

**DigiStore** adalah platform e-commerce modern berbasis web yang dirancang khusus untuk penjualan berbagai macam produk smartphone dari brand terkemuka. Aplikasi ini memisahkan pengalaman pengguna ke dalam dua sisi utama: **Customer Portal** yang interaktif untuk berbelanja dan **Admin Panel** yang kuat untuk manajemen inventaris, kategori, pesanan, hingga pengguna.

---

## 🚀 Fitur Utama

### 🛍️ Sisi Pelanggan (Customer Side)
* **Landing Page Interaktif:** Tampilan beranda modern dengan banner promosi, navigasi cepat berdasarkan brand, dan statistik toko.
* **Sistem Pencarian & Filter Canggih:** Memudahkan pelanggan menemukan smartphone impian berdasarkan brand, rentang harga, dan pengurutan produk terbaru.
* **Detail Produk Komprehensif:** Informasi spesifikasi lengkap (RAM, Layar, Kamera, Prosesor, Baterai) beserta informasi stok waktu nyata (*real-time*).
* **Dashboard Pelanggan:** Halaman khusus bagi pengguna untuk memantau status pesanan, riwayat belanja, dan jumlah item di keranjang.
* **Autentikasi Aman:** Sistem pendaftaran akun baru (Register) dan masuk log (Login) yang aman bagi pelanggan.

### 💼 Sisi Admin (Admin Panel)
* **Manajemen Produk:** Hak akses penuh untuk menambah, mengubah, menampilkan, atau menghapus (CRUD) katalog smartphone beserta status keunggulannya.
* **Manajemen Kategori:** Pengelompokan brand smartphone yang dinamis disertai ikon visual.
* **Manajemen Pesanan:** Memproses dan memantau status transaksi masuk dari pelanggan secara terstruktur.
* **Manajemen Pengguna & Sesi Aktif:** Melacak pengguna yang terdaftar serta memantau sesi aktif admin dan pelanggan secara *real-time* demi keamanan sistem.

---

## 📸 Dokumentasi Antarmuka (Screenshots)

### 👤 Tampilan Pengguna (Customer Interface)

#### 1. Beranda / Landing Page
Halaman utama yang menyambut pengguna dengan desain bersih, minimalis, dan berfokus pada navigasi brand.
![Landing Page](path/to/your/image/{4703ADDC-E615-4BA2-A168-F2FFECAC14A3}.png)

#### 2. Autentikasi Pengguna (Login & Register)
Sistem masuk dan daftar akun yang ramah pengguna dengan validasi formulir bawaan.
| Halaman Masuk (Login) | Halaman Daftar (Register) |
|---|---|
| ![Login Page](path/to/your/image/{1350075E-0736-4886-AD8C-1BEF452932FE}.png) | ![Register Page](path/to/your/image/{5E48EA32-CB35-4CD0-AD90-922CFC6AFB37}.png) |

#### 3. Katalog & Detail Produk
Sistem filter produk yang responsif serta halaman spesifikasi teknis mendalam untuk setiap smartphone.
| Katalog Produk & Filter | Detail Spesifikasi Produk |
|---|---|
| ![Product Catalog](path/to/your/image/image_3323bc.png) | ![Product Detail](path/to/your/image/image_332ec3.png) |

#### 4. Dashboard Pelanggan
Halaman ringkasan belanja untuk memantau keranjang dan pesanan yang sedang diproses.
![Customer Dashboard](path/to/your/image/{7C79C6E9-9A0B-4285-BE89-E28537D91BAB}.png)

---

### 🔐 Tampilan Control Panel (Admin Interface)

#### 1. Manajemen Produk
Panel kendali utama bagi Admin untuk mengelola seluruh stok, harga, dan status keaktifan produk di toko.
![Admin - Kelola Produk](path/to/your/image/image_333a2b.png)

#### 2. Manajemen Kategori & Brand
Mempermudah penambahan brand baru beserta penataan slug URL otomatis.
![Admin - Kelola Kategori](path/to/your/image/image_3335c6.png)

#### 3. Manajemen Pesanan & Transaksi
Melacak pesanan masuk, metode pembayaran (seperti COD), dan memperbarui status pelacakan belanjaan.
![Admin - Kelola Pesanan](path/to/your/image/image_333322.png)

#### 4. Manajemen Pengguna & Riwayat Sesi
Mengamankan platform dengan memantau siapa saja yang terdaftar dan melihat riwayat alamat IP serta browser dari sesi aktif.
![Admin - Manajemen Pengguna](path/to/your/image/{20551643-19DE-4246-940E-F7D049B6FEDE}.png)

---

## 🛠️ Teknologi yang Digunakan

* **Frontend:** HTML5, CSS3, Tailwind CSS (UIAesthetics)
* **Backend:** PHP / Laravel Framework (Running on localhost:8000)
* **Database:** MySQL / PostgreSQL (Session Driver: Database)
* **Icons:** Emoji & Custom Vector Asset Fonts

---

## ⚙️ Cara Menjalankan Proyek Secara Lokal

1. Kloning repositori ini:
   ```bash
   git clone [https://github.com/username-anda/DigiStore.git](https://github.com/username-anda/DigiStore.git)
