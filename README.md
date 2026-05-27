# Digi Store

Digi Store adalah aplikasi e-commerce sederhana berbasis Laravel yang memungkinkan pengguna untuk melihat, membeli, dan mengelola produk secara online.

## Fitur Utama
- Manajemen Produk (CRUD)
- Kategori Produk
- Keranjang Belanja
- Checkout & Order
- Autentikasi Pengguna
- Dashboard Admin
- Responsive Design (Tailwind CSS)

## ScreenShot
<img width="1920" height="1080" alt="{5A1C60D3-B340-4068-ADDA-9C2933691CC2}" src="https://github.com/user-attachments/assets/cde7d3e0-b917-4558-a183-0a3abfbb4861" />


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

## Struktur Folder Penting
- `app/Models` : Model Eloquent
- `app/Http/Controllers` : Controller aplikasi
- `database/migrations` : File migrasi database
- `resources/views` : Blade template
- `routes/web.php` : Routing utama

## Kontribusi
Pull request dan issue sangat terbuka untuk pengembangan lebih lanjut.

## Lisensi
Proyek ini menggunakan lisensi MIT.
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
