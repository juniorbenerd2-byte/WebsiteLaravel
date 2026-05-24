@extends('layouts.app')

@section('title', 'Semua Produk - HP Store')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-6">

        {{-- Sidebar Filter --}}
        <aside class="w-full md:w-64 flex-shrink-0">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 sticky top-20">
                <h3 class="font-bold text-gray-800 mb-4 text-lg">Filter Produk</h3>
                <form action="{{ route('products.index') }}" method="GET" id="filterForm">

                    {{-- Search --}}
                    <div class="mb-4">
                        <label class="text-sm font-medium text-gray-600 block mb-1">Cari</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Nama / brand..."
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                    </div>

                    {{-- Category --}}
                    <div class="mb-4">
                        <label class="text-sm font-medium text-gray-600 block mb-2">Brand</label>
                        <div class="space-y-1">
                            <label class="flex items-center gap-2 text-sm cursor-pointer">
                                <input type="radio" name="category" value="" {{ !request('category') ? 'checked' : '' }} class="text-blue-600">
                                <span>Semua Brand</span>
                            </label>
                            @foreach($categories as $cat)
                            <label class="flex items-center gap-2 text-sm cursor-pointer">
                                <input type="radio" name="category" value="{{ $cat->slug }}"
                                    {{ request('category') === $cat->slug ? 'checked' : '' }} class="text-blue-600">
                                <span>{{ $cat->icon }} {{ $cat->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Price Range --}}
                    <div class="mb-4">
                        <label class="text-sm font-medium text-gray-600 block mb-2">Harga</label>
                        <div class="flex gap-2">
                            <input type="number" name="min_price" value="{{ request('min_price') }}"
                                placeholder="Min" class="w-full border border-gray-200 rounded-lg px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                            <input type="number" name="max_price" value="{{ request('max_price') }}"
                                placeholder="Max" class="w-full border border-gray-200 rounded-lg px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    {{-- Sort --}}
                    <div class="mb-5">
                        <label class="text-sm font-medium text-gray-600 block mb-1">Urutkan</label>
                        <select name="sort" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                            <option value="newest" {{ request('sort','newest') === 'newest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                            <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                            <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Nama A-Z</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                        <i class="fas fa-filter mr-1"></i> Terapkan Filter
                    </button>
                    <a href="{{ route('products.index') }}" class="block text-center text-sm text-gray-500 hover:text-gray-700 mt-2">Reset Filter</a>
                </form>
            </div>
        </aside>

        {{-- Products Grid --}}
        <div class="flex-1">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-800">
                    {{ $products->total() }} Produk Ditemukan
                    @if(request('search'))
                        <span class="text-blue-600">untuk "{{ request('search') }}"</span>
                    @endif
                </h2>
            </div>

            @if($products->isEmpty())
                <div class="bg-white rounded-2xl p-16 text-center border border-gray-100">
                    <span class="text-6xl">🔍</span>
                    <p class="text-gray-500 mt-4 text-lg">Produk tidak ditemukan</p>
                    <a href="{{ route('products.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Lihat semua produk</a>
                </div>
            @else
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($products as $product)
                        @include('partials.product-card', ['product' => $product])
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
