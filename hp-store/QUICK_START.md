# 🚀 Quick Start Guide - HP Store

## Langkah Cepat Menjalankan Aplikasi

### 1️⃣ Jalankan Server Development
```bash
php artisan serve
```

Aplikasi akan berjalan di: **http://localhost:8000**

---

## 🔑 Akses Aplikasi

### 🏠 Halaman Utama (Public)
```
http://localhost:8000/
```
- Lihat featured products
- Browse katalog produk
- Lihat detail produk

### 🛒 Halaman Produk
```
http://localhost:8000/products
```
- Filter berdasarkan brand
- Search produk
- Filter harga
- Sorting (terbaru, termurah, termahal, A-Z)

### 🔐 Login
```
http://localhost:8000/login
```

**Akun Admin:**
- Email: `admin@hpstore.com`
- Password: `password`

**Akun Customer:**
- Email: `customer@hpstore.com`
- Password: `password`

### 📝 Register
```
http://localhost:8000/register
```
Buat akun baru sebagai customer

---

## 🎯 Fitur Customer (Setelah Login)

### 🛒 Keranjang Belanja
```
http://localhost:8000/cart
```
- Lihat item di keranjang
- Update quantity
- Hapus item
- Lanjut ke checkout

### 📦 Checkout
```
http://localhost:8000/checkout
```
- Isi data pengiriman
- Konfirmasi pesanan
- Buat order

### 📋 Riwayat Pesanan
```
http://localhost:8000/orders
```
- Lihat semua pesanan
- Cek status pesanan
- Lihat detail pesanan

---

## 👨‍💼 Fitur Admin (Login sebagai Admin)

### 📊 Dashboard Admin
```
http://localhost:8000/admin
```
- Statistik penjualan
- Total produk, pesanan, user
- Grafik penjualan
- Pesanan terbaru

### 📱 Manajemen Produk
```
http://localhost:8000/admin/products
```
- **Lihat semua produk** - List produk dengan filter
- **Tambah produk** - `/admin/products/create`
- **Edit produk** - `/admin/products/{id}/edit`
- **Hapus produk** - Tombol delete di list
- **Upload gambar** - Saat create/edit produk

### 🏷️ Manajemen Kategori
```
http://localhost:8000/admin/categories
```
- **Lihat kategori** - List semua brand
- **Tambah kategori** - `/admin/categories/create`
- **Edit kategori** - `/admin/categories/{id}/edit`
- **Hapus kategori** - Tombol delete di list

### 📦 Manajemen Pesanan
```
http://localhost:8000/admin/orders
```
- **Lihat pesanan** - List semua order dengan filter status
- **Detail pesanan** - `/admin/orders/{id}`
- **Update status** - Ubah status order (pending → processing → shipped → delivered)
- **Filter** - Filter berdasarkan status

### 👥 Manajemen User
```
http://localhost:8000/admin/users
```
- **Lihat user** - List semua user dengan statistik
- **Tambah user** - `/admin/users/create`
- **Edit user** - `/admin/users/{id}/edit`
- **Hapus user** - Tombol delete di list
- **Detail user** - `/admin/users/{id}` (lihat pesanan user)
- **Session monitoring** - Lihat user yang online

---

## 📊 Data yang Sudah Ada

### Users (2)
1. **Admin** - `admin@hpstore.com`
2. **Customer** - `customer@hpstore.com`

### Categories (6 Brand)
- 📱 Samsung
- 📱 iPhone
- 📱 Xiaomi
- 📱 OPPO
- 📱 Vivo
- 📱 Realme

### Products (11)
Berbagai model HP dari brand di atas dengan:
- Harga bervariasi (Rp 2 juta - Rp 20 juta)
- Stok tersedia
- Spesifikasi lengkap
- Gambar produk

---

## 🧪 Testing Flow

### Test sebagai Customer:
1. ✅ Buka homepage → Lihat featured products
2. ✅ Klik "Lihat Semua Produk" → Browse katalog
3. ✅ Gunakan filter brand → Pilih "Samsung"
4. ✅ Klik detail produk → Lihat spesifikasi
5. ✅ Tambah ke keranjang → Pilih quantity
6. ✅ Lihat keranjang → Review item
7. ✅ Checkout → Isi data pengiriman
8. ✅ Konfirmasi order → Order berhasil dibuat
9. ✅ Lihat riwayat pesanan → Cek status

### Test sebagai Admin:
1. ✅ Login sebagai admin
2. ✅ Lihat dashboard → Cek statistik
3. ✅ Kelola produk → Tambah/edit/hapus
4. ✅ Kelola kategori → Tambah brand baru
5. ✅ Kelola pesanan → Update status order
6. ✅ Kelola user → Tambah admin/customer baru
7. ✅ Lihat session → Cek user online

---

## 🎨 Fitur UI/UX

### Responsive Design
- ✅ Mobile-friendly
- ✅ Tablet-friendly
- ✅ Desktop-optimized

### Modern UI
- ✅ Tailwind CSS styling
- ✅ Font Awesome icons
- ✅ Smooth transitions
- ✅ Clean & minimalist design

### User Experience
- ✅ Flash messages (success/error)
- ✅ Form validation
- ✅ Confirmation dialogs
- ✅ Loading states
- ✅ Empty states

---

## 🔧 Commands Berguna

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Database
```bash
# Lihat status migrasi
php artisan migrate:status

# Rollback migrasi
php artisan migrate:rollback

# Fresh migrate (hapus semua data)
php artisan migrate:fresh

# Seed database (jika ada seeder)
php artisan db:seed
```

### Storage
```bash
# Buat symbolic link untuk storage
php artisan storage:link
```

### Tinker (Laravel Console)
```bash
php artisan tinker

# Contoh command di tinker:
>>> User::count()
>>> Product::where('brand', 'Samsung')->get()
>>> Order::where('status', 'pending')->count()
```

---

## 📝 Tips Penggunaan

### Upload Gambar Produk
1. Gambar akan disimpan di `storage/app/public/products/`
2. Pastikan folder `public/storage` sudah di-link: `php artisan storage:link`
3. Format yang didukung: JPG, PNG, JPEG, GIF
4. Ukuran maksimal: 2MB (bisa diubah di controller)

### Session Management
- Session disimpan di database (tabel `sessions`)
- Lifetime: 2 jam (120 menit)
- User online ditandai dengan adanya record di tabel sessions

### Order Status Flow
```
pending → processing → shipped → delivered
                    ↓
                cancelled
```

### Role Management
- `is_admin = true` → Akses admin panel
- `is_admin = false` → Customer biasa
- Middleware `admin` melindungi route admin

---

## ❓ Troubleshooting

### Server tidak bisa dijalankan
```bash
# Pastikan port 8000 tidak digunakan
php artisan serve --port=8001
```

### Gambar tidak muncul
```bash
php artisan storage:link
```

### Error 500
```bash
# Cek log error
tail -f storage/logs/laravel.log  # Linux/Mac
type storage\logs\laravel.log     # Windows
```

### Session tidak berfungsi
```bash
php artisan migrate  # Pastikan tabel sessions ada
php artisan config:clear
```

---

## 🎯 Next Steps

Setelah aplikasi berjalan, Anda bisa:

1. **Customize Design** - Edit file blade di `resources/views/`
2. **Tambah Fitur** - Lihat saran di `README_PROJECT.md`
3. **Integrasi Payment** - Tambah payment gateway
4. **Deploy** - Deploy ke hosting (shared hosting, VPS, cloud)

---

## 📞 Need Help?

Jika ada error atau pertanyaan:
1. Cek file log: `storage/logs/laravel.log`
2. Baca dokumentasi Laravel: https://laravel.com/docs
3. Cek README_PROJECT.md untuk detail lengkap

---

**Happy Coding! 🚀**
