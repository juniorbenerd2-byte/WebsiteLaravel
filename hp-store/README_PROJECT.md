# 📱 HP Store - E-Commerce Laravel

Aplikasi E-Commerce untuk penjualan HP (Handphone) yang dibangun dengan Laravel 11, Tailwind CSS, dan SQLite.

---

## 🎯 Fitur Utama

### 👥 Untuk Pelanggan
- ✅ **Katalog Produk** - Lihat semua produk HP dengan filter dan pencarian
- ✅ **Detail Produk** - Informasi lengkap produk dengan spesifikasi
- ✅ **Keranjang Belanja** - Tambah, ubah, hapus item di keranjang
- ✅ **Checkout & Order** - Proses pemesanan dengan form pengiriman
- ✅ **Riwayat Pesanan** - Lihat status dan detail pesanan
- ✅ **Autentikasi** - Register, Login, Logout
- ✅ **Filter & Pencarian** - Filter berdasarkan brand, harga, dan sorting

### 🔐 Untuk Admin
- ✅ **Dashboard** - Statistik penjualan, produk, dan pesanan
- ✅ **Manajemen Produk** - CRUD produk dengan upload gambar
- ✅ **Manajemen Kategori** - CRUD kategori/brand HP
- ✅ **Manajemen Pesanan** - Lihat dan update status pesanan
- ✅ **Manajemen User** - CRUD user dengan role admin/customer
- ✅ **Session Monitoring** - Lihat user yang sedang online

---

## 🗄️ Struktur Database

### Tabel Users
```
- id (primary key)
- name (string)
- email (string, unique)
- password (hashed)
- is_admin (boolean, default: false)
- email_verified_at (timestamp, nullable)
- remember_token
- timestamps
```

### Tabel Categories
```
- id (primary key)
- name (string)
- slug (string, unique)
- icon (string, emoji)
- timestamps
```

### Tabel Products
```
- id (primary key)
- category_id (foreign key)
- name (string)
- slug (string, unique)
- brand (string)
- description (text)
- price (decimal)
- original_price (decimal, nullable)
- stock (integer)
- image (string, nullable)
- specs (json, nullable)
- is_active (boolean, default: true)
- timestamps
```

### Tabel Orders
```
- id (primary key)
- user_id (foreign key)
- order_number (string, unique)
- total_amount (decimal)
- status (enum: pending, processing, shipped, delivered, cancelled)
- shipping_name (string)
- shipping_phone (string)
- shipping_address (text)
- notes (text, nullable)
- timestamps
```

### Tabel Order_Items
```
- id (primary key)
- order_id (foreign key)
- product_id (foreign key)
- quantity (integer)
- price (decimal)
- timestamps
```

### Tabel Carts
```
- id (primary key)
- user_id (foreign key)
- product_id (foreign key)
- quantity (integer)
- timestamps
```

### Tabel Sessions
```
- id (primary key)
- user_id (foreign key, nullable)
- ip_address (string)
- user_agent (text)
- payload (longtext)
- last_activity (integer)
```

---

## 📂 Struktur File Penting

### Controllers
```
app/Http/Controllers/
├── HomeController.php              # Halaman utama
├── ProductController.php           # Katalog & detail produk
├── CartController.php              # Keranjang belanja
├── OrderController.php             # Checkout & riwayat pesanan
├── Admin/
│   ├── AdminDashboardController.php
│   ├── AdminProductController.php
│   ├── AdminCategoryController.php
│   ├── AdminOrderController.php
│   └── AdminUserController.php
└── Auth/
    ├── LoginController.php
    ├── RegisterController.php
    └── LogoutController.php
```

### Models
```
app/Models/
├── User.php
├── Category.php
├── Product.php
├── Order.php
├── OrderItem.php
└── Cart.php
```

### Views
```
resources/views/
├── layouts/
│   ├── app.blade.php              # Layout utama
│   └── admin.blade.php            # Layout admin
├── home.blade.php                 # Homepage
├── products/
│   ├── index.blade.php            # Katalog produk
│   └── show.blade.php             # Detail produk
├── cart/
│   └── index.blade.php            # Keranjang
├── orders/
│   ├── checkout.blade.php         # Checkout
│   ├── index.blade.php            # Riwayat pesanan
│   └── show.blade.php             # Detail pesanan
├── admin/
│   ├── dashboard.blade.php
│   ├── products/                  # CRUD produk
│   ├── categories/                # CRUD kategori
│   ├── orders/                    # Manajemen pesanan
│   └── users/                     # CRUD user
└── auth/
    ├── login.blade.php
    └── register.blade.php
```

### Routes
```
routes/web.php                     # Semua routing aplikasi
routes/auth.php                    # Routing autentikasi
```

---

## 🚀 Cara Menjalankan Aplikasi

### 1. Install Dependencies
```bash
composer install
```

### 2. Setup Environment
File `.env` sudah dikonfigurasi dengan:
- Database: SQLite (`database/database.sqlite`)
- Session Driver: Database
- Queue: Database

### 3. Generate Application Key (jika belum)
```bash
php artisan key:generate
```

### 4. Jalankan Migrasi (jika belum)
```bash
php artisan migrate
```

### 5. Jalankan Server
```bash
php artisan serve
```

Aplikasi akan berjalan di: `http://localhost:8000`

---

## 👤 Akun Default

### Admin
- Email: `admin@hpstore.com`
- Password: `password`

### Customer
- Email: `customer@hpstore.com`
- Password: `password`

*(Sesuaikan dengan data yang ada di database Anda)*

---

## 🎨 Teknologi yang Digunakan

- **Framework**: Laravel 11
- **Database**: SQLite
- **Frontend**: Blade Templates + Tailwind CSS (via CDN)
- **Icons**: Font Awesome 6
- **Session**: Database Driver
- **Authentication**: Laravel Breeze (custom)

---

## 📱 Fitur Produk

### Data Produk Tersedia
Aplikasi sudah memiliki **11 produk** dari **6 brand**:
- 📱 Samsung
- 📱 iPhone (Apple)
- 📱 Xiaomi
- 📱 OPPO
- 📱 Vivo
- 📱 Realme

Setiap produk memiliki:
- Nama & Brand
- Harga (dengan diskon jika ada)
- Stok
- Deskripsi
- Spesifikasi (RAM, Storage, Chipset, dll)
- Gambar produk

---

## 🔐 Middleware & Authorization

### AdminMiddleware
File: `app/Http/Middleware/AdminMiddleware.php`

Melindungi semua route admin, hanya user dengan `is_admin = true` yang bisa akses.

### Route Protection
```php
// Public routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/orders', [OrderController::class, 'index']);
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index']);
    Route::resource('products', AdminProductController::class);
    Route::resource('users', AdminUserController::class);
});
```

---

## 📊 Fitur Session Management

Aplikasi menggunakan **database session driver** yang memungkinkan:
- ✅ Tracking user yang sedang online
- ✅ Melihat IP address dan browser user
- ✅ Monitoring aktivitas terakhir
- ✅ Menampilkan status online/offline di admin panel

### Konfigurasi Session
File: `config/session.php`
```php
'driver' => env('SESSION_DRIVER', 'database'),
'lifetime' => 120, // 2 jam
```

---

## 🛒 Flow Pembelian

1. **Browse Produk** → Customer melihat katalog
2. **Tambah ke Keranjang** → Pilih produk dan quantity
3. **Lihat Keranjang** → Review item yang akan dibeli
4. **Checkout** → Isi data pengiriman
5. **Konfirmasi Order** → Order dibuat dengan status "pending"
6. **Admin Process** → Admin update status order
7. **Customer Track** → Customer lihat status di riwayat pesanan

---

## 🎯 Status Order

- **pending** → Menunggu konfirmasi
- **processing** → Sedang diproses
- **shipped** → Dalam pengiriman
- **delivered** → Sudah diterima
- **cancelled** → Dibatalkan

---

## 📸 Upload Gambar Produk

Gambar produk disimpan di:
```
storage/app/public/products/
```

Untuk mengakses gambar, pastikan symbolic link sudah dibuat:
```bash
php artisan storage:link
```

Gambar akan dapat diakses via:
```
http://localhost:8000/storage/products/nama-file.jpg
```

---

## 🔧 Troubleshooting

### Error: "No application encryption key has been specified"
```bash
php artisan key:generate
```

### Error: Storage link tidak berfungsi
```bash
php artisan storage:link
```

### Error: Database tidak ditemukan
Pastikan file `database/database.sqlite` ada. Jika tidak:
```bash
touch database/database.sqlite  # Linux/Mac
type nul > database/database.sqlite  # Windows
php artisan migrate
```

### Error: Session tidak berfungsi
```bash
php artisan migrate  # Pastikan tabel sessions ada
php artisan config:clear
php artisan cache:clear
```

---

## 📝 Catatan Pengembangan

### Fitur yang Sudah Selesai ✅
- [x] Autentikasi (Login, Register, Logout)
- [x] Homepage dengan featured products
- [x] Katalog produk dengan filter & search
- [x] Detail produk dengan spesifikasi
- [x] Keranjang belanja
- [x] Checkout & order
- [x] Riwayat pesanan customer
- [x] Admin dashboard dengan statistik
- [x] CRUD produk (dengan upload gambar)
- [x] CRUD kategori
- [x] Manajemen pesanan
- [x] CRUD user dengan role management
- [x] Session monitoring
- [x] Responsive design (mobile-friendly)

### Fitur yang Bisa Ditambahkan 🚀
- [ ] Payment gateway integration
- [ ] Email notification
- [ ] Product reviews & ratings
- [ ] Wishlist
- [ ] Product comparison
- [ ] Advanced search & filters
- [ ] Promo codes & discounts
- [ ] Shipping cost calculation
- [ ] Export reports (PDF/Excel)
- [ ] Multi-language support

---

## 📞 Support

Jika ada pertanyaan atau masalah, silakan hubungi developer atau buat issue di repository.

---

**Dibuat dengan ❤️ menggunakan Laravel & Tailwind CSS**
