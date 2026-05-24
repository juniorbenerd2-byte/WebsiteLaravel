@extends('layouts.app')

@section('title', 'HP Store - Toko Smartphone Terpercaya')

@section('content')

{{-- Hero Section --}}
<section class="gradient-hero text-white py-20">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center gap-10">
        <div class="flex-1">
            <span class="bg-blue-500 bg-opacity-30 text-blue-200 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">🔥 Flash Sale Hari Ini</span>
            <h1 class="text-4xl md:text-5xl font-extrabold mt-4 leading-tight">
                Temukan Smartphone<br><span class="text-blue-400">Impianmu</span> di Sini
            </h1>
            <p class="mt-4 text-gray-300 text-lg">Koleksi lengkap smartphone terbaru dari brand ternama. Harga terbaik, garansi resmi, pengiriman cepat ke seluruh Indonesia.</p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-8 py-3 rounded-xl transition">
                    <i class="fas fa-shopping-bag mr-2"></i> Belanja Sekarang
                </a>
                <a href="{{ route('products.index', ['sort' => 'price_asc']) }}" class="border border-white text-white hover:bg-white hover:text-gray-900 font-semibold px-8 py-3 rounded-xl transition">
                    <i class="fas fa-tag mr-2"></i> Lihat Promo
                </a>
            </div>
            <div class="mt-10 flex gap-8">
                <div class="text-center">
                    <div class="text-2xl font-bold text-blue-400">500+</div>
                    <div class="text-xs text-gray-400 mt-1">Produk</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-blue-400">10K+</div>
                    <div class="text-xs text-gray-400 mt-1">Pelanggan</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-blue-400">6</div>
                    <div class="text-xs text-gray-400 mt-1">Brand</div>
                </div>
            </div>
        </div>
        <div class="flex-1 flex justify-center">
            <div class="relative">
                <div class="w-64 h-64 bg-blue-500 bg-opacity-20 rounded-full flex items-center justify-center">
                    <span class="text-9xl">📱</span>
                </div>
                <div class="absolute -top-4 -right-4 bg-yellow-400 text-gray-900 text-xs font-bold px-3 py-1 rounded-full">NEW 2025</div>
                <div class="absolute -bottom-4 -left-4 bg-green-400 text-gray-900 text-xs font-bold px-3 py-1 rounded-full">Garansi Resmi</div>
            </div>
        </div>
    </div>
</section>

{{-- Features Bar --}}
<section class="bg-blue-600 text-white py-4">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center text-sm">
            <div class="flex items-center justify-center gap-2">
                <i class="fas fa-shipping-fast text-yellow-300"></i>
                <span>Gratis Ongkir</span>
            </div>
            <div class="flex items-center justify-center gap-2">
                <i class="fas fa-shield-alt text-yellow-300"></i>
                <span>Garansi Resmi</span>
            </div>
            <div class="flex items-center justify-center gap-2">
                <i class="fas fa-undo text-yellow-300"></i>
                <span>Retur 7 Hari</span>
            </div>
            <div class="flex items-center justify-center gap-2">
                <i class="fas fa-headset text-yellow-300"></i>
                <span>CS 24/7</span>
            </div>
        </div>
    </div>
</section>

{{-- Categories --}}
<section class="max-w-7xl mx-auto px-4 py-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Belanja by Brand</h2>
    <div class="grid grid-cols-3 md:grid-cols-6 gap-4">
        @foreach($categories as $cat)
        <a href="{{ route('products.index', ['category' => $cat->slug]) }}"
           class="bg-white rounded-2xl p-4 text-center shadow-sm hover:shadow-md card-hover border border-gray-100">
            <div class="text-4xl mb-2">{{ $cat->icon }}</div>
            <div class="text-sm font-semibold text-gray-700">{{ $cat->name }}</div>
            <div class="text-xs text-gray-400 mt-1">{{ $cat->products_count }} produk</div>
        </a>
        @endforeach
    </div>
</section>

{{-- Featured Products --}}
@if($featured->count())
<section class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">🔥 Produk Unggulan</h2>
            <p class="text-gray-500 text-sm mt-1">Pilihan terbaik dari kami</p>
        </div>
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($featured as $product)
            @include('partials.product-card', ['product' => $product])
        @endforeach
    </div>
</section>
@endif

{{-- Newest Products --}}
@if($newest->count())
<section class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">✨ Produk Terbaru</h2>
            <p class="text-gray-500 text-sm mt-1">Baru saja tiba di toko kami</p>
        </div>
        <a href="{{ route('products.index', ['sort' => 'newest']) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($newest as $product)
            @include('partials.product-card', ['product' => $product])
        @endforeach
    </div>
</section>
@endif

{{-- Banner Promo --}}
<section class="max-w-7xl mx-auto px-4 py-8">
    <div class="bg-gradient-to-r from-purple-600 to-blue-600 rounded-2xl p-8 text-white flex flex-col md:flex-row items-center justify-between">
        <div>
            <h3 class="text-2xl font-bold">Dapatkan Diskon Hingga 30%</h3>
            <p class="text-purple-200 mt-2">Untuk pembelian pertama Anda. Daftar sekarang dan nikmati promo eksklusif!</p>
        </div>
        <a href="{{ route('register') }}" class="mt-4 md:mt-0 bg-white text-purple-700 font-bold px-8 py-3 rounded-xl hover:bg-purple-50 transition">
            Daftar Gratis
        </a>
    </div>
</section>

@endsection
