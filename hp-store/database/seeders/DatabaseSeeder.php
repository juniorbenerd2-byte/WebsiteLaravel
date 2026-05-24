<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@hpstore.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        User::create([
            'name'     => 'John Doe',
            'email'    => 'user@hpstore.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        $categories = [
            ['name' => 'Samsung', 'slug' => 'samsung', 'icon' => '📱'],
            ['name' => 'iPhone',  'slug' => 'iphone',  'icon' => '🍎'],
            ['name' => 'Xiaomi',  'slug' => 'xiaomi',  'icon' => '📲'],
            ['name' => 'OPPO',    'slug' => 'oppo',    'icon' => '📳'],
            ['name' => 'Vivo',    'slug' => 'vivo',    'icon' => '📵'],
            ['name' => 'Realme',  'slug' => 'realme',  'icon' => '🔋'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // image: path lokal jika file ada, null jika tidak
        // image_url: URL eksternal sebagai fallback
        $products = [
            [
                'category_id'    => 1,
                'name'           => 'Samsung Galaxy S24 Ultra',
                'brand'          => 'Samsung',
                'description'    => 'Smartphone flagship Samsung dengan kamera 200MP, layar Dynamic AMOLED 2X 6.8 inci, dan prosesor Snapdragon 8 Gen 3. Dilengkapi S Pen built-in untuk produktivitas maksimal.',
                'price'          => 19999000,
                'original_price' => 22999000,
                'stock'          => 15,
                'is_featured'    => true,
                'image'          => 'products/samsung_s24_ultra.png',
                'image_url'      => 'https://images.samsung.com/is/image/samsung/p6pim/id/2401/gallery/id-galaxy-s24-ultra-s928-sm-s928bzkcxid-thumb-539573651',
                'specs'          => ['Layar' => '6.8" Dynamic AMOLED 2X', 'Prosesor' => 'Snapdragon 8 Gen 3', 'RAM' => '12GB', 'Storage' => '256GB', 'Kamera' => '200MP + 12MP + 10MP + 10MP', 'Baterai' => '5000mAh', 'OS' => 'Android 14'],
            ],
            [
                'category_id'    => 1,
                'name'           => 'Samsung Galaxy A55 5G',
                'brand'          => 'Samsung',
                'description'    => 'Smartphone mid-range Samsung dengan layar Super AMOLED 6.6 inci, kamera 50MP OIS, dan baterai 5000mAh. Mendukung jaringan 5G untuk koneksi super cepat.',
                'price'          => 6499000,
                'original_price' => 7499000,
                'stock'          => 30,
                'is_featured'    => true,
                'image'          => 'products/samsung_a55.png',
                'image_url'      => 'https://images.samsung.com/is/image/samsung/p6pim/id/2403/gallery/id-galaxy-a55-5g-sm-a556ezaaxid-thumb-539573651',
                'specs'          => ['Layar' => '6.6" Super AMOLED', 'Prosesor' => 'Exynos 1480', 'RAM' => '8GB', 'Storage' => '128GB', 'Kamera' => '50MP + 12MP + 5MP', 'Baterai' => '5000mAh', 'OS' => 'Android 14'],
            ],
            [
                'category_id'    => 1,
                'name'           => 'Samsung Galaxy Z Fold 6',
                'brand'          => 'Samsung',
                'description'    => 'Smartphone lipat premium Samsung dengan layar utama 7.6 inci dan layar cover 6.3 inci. Desain tipis dan ringan dengan performa flagship.',
                'price'          => 29999000,
                'original_price' => null,
                'stock'          => 8,
                'is_featured'    => false,
                'image'          => 'products/samsung_zfold6.jpg',
                'image_url'      => null,
                'specs'          => ['Layar Utama' => '7.6" Dynamic AMOLED 2X', 'Layar Cover' => '6.3" Dynamic AMOLED 2X', 'Prosesor' => 'Snapdragon 8 Gen 3', 'RAM' => '12GB', 'Storage' => '256GB', 'Baterai' => '4400mAh'],
            ],
            [
                'category_id'    => 2,
                'name'           => 'iPhone 16 Pro Max',
                'brand'          => 'Apple',
                'description'    => 'iPhone terbaru dengan chip A18 Pro, kamera 48MP dengan zoom 5x, layar Super Retina XDR 6.9 inci, dan fitur Apple Intelligence.',
                'price'          => 24999000,
                'original_price' => 26999000,
                'stock'          => 12,
                'is_featured'    => true,
                'image'          => 'products/iphone_16_pro_max.jpg',
                'image_url'      => null,
                'specs'          => ['Layar' => '6.9" Super Retina XDR', 'Chip' => 'A18 Pro', 'RAM' => '8GB', 'Storage' => '256GB', 'Kamera' => '48MP + 48MP + 12MP', 'Baterai' => '4685mAh', 'OS' => 'iOS 18'],
            ],
            [
                'category_id'    => 2,
                'name'           => 'iPhone 15',
                'brand'          => 'Apple',
                'description'    => 'iPhone 15 dengan chip A16 Bionic, Dynamic Island, kamera 48MP, dan port USB-C. Desain elegan dengan warna-warna cantik.',
                'price'          => 14999000,
                'original_price' => 16999000,
                'stock'          => 20,
                'is_featured'    => true,
                'image'          => 'products/iphone_15.jpg',
                'image_url'      => null,
                'specs'          => ['Layar' => '6.1" Super Retina XDR', 'Chip' => 'A16 Bionic', 'Storage' => '128GB', 'Kamera' => '48MP + 12MP', 'Baterai' => '3877mAh', 'OS' => 'iOS 17'],
            ],
            [
                'category_id'    => 3,
                'name'           => 'Xiaomi 14 Ultra',
                'brand'          => 'Xiaomi',
                'description'    => 'Flagship Xiaomi dengan sistem kamera Leica, layar AMOLED 6.73 inci 120Hz, dan prosesor Snapdragon 8 Gen 3. Baterai 5000mAh dengan fast charging 90W.',
                'price'          => 16999000,
                'original_price' => 18999000,
                'stock'          => 10,
                'is_featured'    => true,
                'image'          => 'products/xiaomi_14_ultra.jpg',
                'image_url'      => null,
                'specs'          => ['Layar' => '6.73" AMOLED 120Hz', 'Prosesor' => 'Snapdragon 8 Gen 3', 'RAM' => '16GB', 'Storage' => '512GB', 'Kamera' => '50MP Leica + 50MP + 50MP', 'Baterai' => '5000mAh 90W'],
            ],
            [
                'category_id'    => 3,
                'name'           => 'Redmi Note 13 Pro',
                'brand'          => 'Xiaomi',
                'description'    => 'Smartphone mid-range terbaik dengan kamera 200MP, layar AMOLED 6.67 inci 120Hz, dan baterai 5100mAh. Performa kencang dengan harga terjangkau.',
                'price'          => 3999000,
                'original_price' => 4499000,
                'stock'          => 50,
                'is_featured'    => false,
                'image'          => 'products/redmi_note_13_pro.jpg',
                'image_url'      => null,
                'specs'          => ['Layar' => '6.67" AMOLED 120Hz', 'Prosesor' => 'Helio G99 Ultra', 'RAM' => '8GB', 'Storage' => '256GB', 'Kamera' => '200MP + 8MP + 2MP', 'Baterai' => '5100mAh 67W'],
            ],
            [
                'category_id'    => 4,
                'name'           => 'OPPO Find X8 Pro',
                'brand'          => 'OPPO',
                'description'    => 'Flagship OPPO dengan kamera Hasselblad, layar AMOLED 6.78 inci 120Hz, dan prosesor Dimensity 9400. Desain premium dengan bodi keramik.',
                'price'          => 17999000,
                'original_price' => null,
                'stock'          => 7,
                'is_featured'    => false,
                'image'          => 'products/oppo_find_x8_pro.png',
                'image_url'      => null,
                'specs'          => ['Layar' => '6.78" AMOLED 120Hz', 'Prosesor' => 'Dimensity 9400', 'RAM' => '16GB', 'Storage' => '512GB', 'Kamera' => '50MP Hasselblad + 50MP + 50MP', 'Baterai' => '5910mAh 80W'],
            ],
            [
                'category_id'    => 4,
                'name'           => 'OPPO Reno 12 Pro',
                'brand'          => 'OPPO',
                'description'    => 'Smartphone stylish dengan kamera portrait AI, layar AMOLED 6.7 inci, dan desain tipis elegan. Cocok untuk konten kreator.',
                'price'          => 7499000,
                'original_price' => 8499000,
                'stock'          => 25,
                'is_featured'    => false,
                'image'          => 'products/oppo_reno_12_pro.png',
                'image_url'      => null,
                'specs'          => ['Layar' => '6.7" AMOLED 120Hz', 'Prosesor' => 'Dimensity 7300 Energy', 'RAM' => '12GB', 'Storage' => '256GB', 'Kamera' => '50MP + 8MP + 2MP', 'Baterai' => '5000mAh 80W'],
            ],
            [
                'category_id'    => 5,
                'name'           => 'Vivo X100 Pro',
                'brand'          => 'Vivo',
                'description'    => 'Flagship Vivo dengan kamera ZEISS, layar AMOLED 6.78 inci 120Hz, dan prosesor Dimensity 9300. Baterai 5400mAh dengan fast charging 100W.',
                'price'          => 15999000,
                'original_price' => 17999000,
                'stock'          => 9,
                'is_featured'    => false,
                'image'          => 'products/vivo_x100_pro.jpg',
                'image_url'      => null,
                'specs'          => ['Layar' => '6.78" AMOLED 120Hz', 'Prosesor' => 'Dimensity 9300', 'RAM' => '16GB', 'Storage' => '256GB', 'Kamera' => '50MP ZEISS + 50MP + 64MP', 'Baterai' => '5400mAh 100W'],
            ],
            [
                'category_id'    => 6,
                'name'           => 'Realme GT 6',
                'brand'          => 'Realme',
                'description'    => 'Smartphone gaming dengan prosesor Snapdragon 8s Gen 3, layar AMOLED 6.78 inci 120Hz, dan baterai 5500mAh dengan fast charging 120W.',
                'price'          => 8999000,
                'original_price' => 9999000,
                'stock'          => 18,
                'is_featured'    => true,
                'image'          => 'products/realme_gt6.jpg',
                'image_url'      => null,
                'specs'          => ['Layar' => '6.78" AMOLED 120Hz', 'Prosesor' => 'Snapdragon 8s Gen 3', 'RAM' => '12GB', 'Storage' => '256GB', 'Kamera' => '50MP + 8MP + 2MP', 'Baterai' => '5500mAh 120W'],
            ],
        ];

        foreach ($products as $p) {
            // Cek apakah file gambar lokal benar-benar ada
            $imagePath = null;
            if ($p['image']) {
                $fullPath = storage_path('app/public/' . $p['image']);
                if (file_exists($fullPath) && filesize($fullPath) > 5000) {
                    $imagePath = $p['image'];
                }
            }

            Product::create([
                'category_id'    => $p['category_id'],
                'name'           => $p['name'],
                'slug'           => Str::slug($p['name']) . '-' . uniqid(),
                'brand'          => $p['brand'],
                'description'    => $p['description'],
                'price'          => $p['price'],
                'original_price' => $p['original_price'],
                'stock'          => $p['stock'],
                'image'          => $imagePath,
                'specs'          => $p['specs'],
                'is_featured'    => $p['is_featured'],
                'is_active'      => true,
            ]);
        }
    }
}
