@extends('layouts.app')

@section('title', $product->name . ' - HP Store')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">

    {{-- Breadcrumb --}}
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
        <span class="mx-2">/</span>
        <a href="{{ route('products.index') }}" class="hover:text-blue-600">Produk</a>
        <span class="mx-2">/</span>
        <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="hover:text-blue-600">{{ $product->category->name }}</a>
        <span class="mx-2">/</span>
        <span class="text-gray-800">{{ $product->name }}</span>
    </nav>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
        <div class="flex flex-col md:flex-row gap-8">

            {{-- Product Image --}}
            <div class="md:w-2/5">
                <div class="bg-gray-50 rounded-2xl h-80 flex items-center justify-center relative">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                             class="h-full w-full object-contain rounded-2xl">
                    @else
                        <span class="text-9xl">📱</span>
                    @endif
                    @if($product->discount_percent > 0)
                        <span class="absolute top-4 left-4 badge-discount text-white text-sm font-bold px-3 py-1 rounded-lg">
                            -{{ $product->discount_percent }}% OFF
                        </span>
                    @endif
                </div>
            </div>

            {{-- Product Info --}}
            <div class="md:w-3/5">
                <span class="text-blue-600 text-sm font-medium bg-blue-50 px-3 py-1 rounded-full">{{ $product->brand }}</span>
                <h1 class="text-2xl font-bold text-gray-900 mt-3">{{ $product->name }}</h1>

                <div class="flex items-center gap-3 mt-4">
                    <span class="text-3xl font-extrabold text-blue-700">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    @if($product->original_price)
                        <span class="text-gray-400 text-lg line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
                        <span class="badge-discount text-white text-sm font-bold px-2 py-0.5 rounded-lg">Hemat Rp {{ number_format($product->original_price - $product->price, 0, ',', '.') }}</span>
                    @endif
                </div>

                <div class="flex items-center gap-4 mt-4 text-sm">
                    <span class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-500' }} font-medium">
                        <i class="fas fa-{{ $product->stock > 0 ? 'check-circle' : 'times-circle' }} mr-1"></i>
                        {{ $product->stock > 0 ? 'Stok Tersedia (' . $product->stock . ')' : 'Stok Habis' }}
                    </span>
                    <span class="text-gray-400">|</span>
                    <span class="text-gray-500">Kategori: <a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="text-blue-600 hover:underline">{{ $product->category->name }}</a></span>
                </div>

                <p class="text-gray-600 mt-4 leading-relaxed">{{ $product->description }}</p>

                @if($product->stock > 0)
                <form action="{{ route('cart.add') }}" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                            <button type="button" onclick="changeQty(-1)" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold">−</button>
                            <input type="number" name="quantity" id="qty" value="1" min="1" max="{{ $product->stock }}"
                                class="w-16 text-center py-2 border-0 focus:outline-none text-sm font-medium">
                            <button type="button" onclick="changeQty(1)" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold">+</button>
                        </div>
                        <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition">
                            <i class="fas fa-cart-plus mr-2"></i> Tambah ke Keranjang
                        </button>
                    </div>
                </form>
                @else
                    <div class="mt-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm font-medium">
                        <i class="fas fa-exclamation-triangle mr-2"></i> Maaf, stok produk ini sedang habis.
                    </div>
                @endif

                {{-- Trust Badges --}}
                <div class="grid grid-cols-3 gap-3 mt-6 text-center text-xs text-gray-500">
                    <div class="bg-gray-50 rounded-xl p-3">
                        <i class="fas fa-shield-alt text-green-500 text-lg mb-1 block"></i>
                        Garansi Resmi
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <i class="fas fa-shipping-fast text-blue-500 text-lg mb-1 block"></i>
                        Gratis Ongkir
                    </div>
                    <div class="bg-gray-50 rounded-xl p-3">
                        <i class="fas fa-undo text-purple-500 text-lg mb-1 block"></i>
                        Retur 7 Hari
                    </div>
                </div>
            </div>
        </div>

        {{-- Specs --}}
        @if($product->specs)
        <div class="mt-8 border-t border-gray-100 pt-8">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Spesifikasi</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                @foreach($product->specs as $key => $value)
                <div class="flex bg-gray-50 rounded-xl overflow-hidden">
                    <span class="bg-blue-600 text-white text-sm font-medium px-4 py-2 w-36 flex-shrink-0">{{ $key }}</span>
                    <span class="text-gray-700 text-sm px-4 py-2">{{ $value }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    {{-- Related Products --}}
    @if($related->count())
    <div class="mt-10">
        <h3 class="text-xl font-bold text-gray-800 mb-5">Produk Serupa</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
            @foreach($related as $product)
                @include('partials.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
function changeQty(delta) {
    const input = document.getElementById('qty');
    const max = parseInt(input.max);
    let val = parseInt(input.value) + delta;
    if (val < 1) val = 1;
    if (val > max) val = max;
    input.value = val;
}
</script>
@endpush
@endsection
