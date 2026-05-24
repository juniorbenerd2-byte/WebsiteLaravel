@extends('layouts.app')

@section('title', 'Keranjang Belanja - HP Store')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><i class="fas fa-shopping-cart mr-2 text-blue-600"></i> Keranjang Belanja</h1>

    @if($cartItems->isEmpty())
        <div class="bg-white rounded-2xl p-16 text-center shadow-sm border border-gray-100">
            <span class="text-7xl">🛒</span>
            <p class="text-gray-500 mt-4 text-lg">Keranjang Anda masih kosong</p>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition">
                Mulai Belanja
            </a>
        </div>
    @else
        <div class="flex flex-col lg:flex-row gap-6">
            {{-- Cart Items --}}
            <div class="flex-1 space-y-4">
                @foreach($cartItems as $item)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 flex gap-4 items-center">
                    <div class="w-20 h-20 bg-gray-50 rounded-xl flex items-center justify-center flex-shrink-0">
                        @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-contain rounded-xl">
                        @else
                            <span class="text-4xl">📱</span>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <a href="{{ route('products.show', $item->product->slug) }}" class="font-semibold text-gray-800 hover:text-blue-600 text-sm line-clamp-2">{{ $item->product->name }}</a>
                        <div class="text-blue-700 font-bold mt-1">Rp {{ number_format($item->product->price, 0, ',', '.') }}</div>
                        <div class="text-xs text-gray-400 mt-0.5">Subtotal: Rp {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                            @csrf
                            @method('PATCH')
                            <button type="button" onclick="this.form.quantity.value = Math.max(1, parseInt(this.form.quantity.value)-1); this.form.submit()"
                                class="px-2 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-sm">−</button>
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock }}"
                                class="w-10 text-center text-sm border-0 focus:outline-none py-1" onchange="this.form.submit()">
                            <button type="button" onclick="this.form.quantity.value = Math.min({{ $item->product->stock }}, parseInt(this.form.quantity.value)+1); this.form.submit()"
                                class="px-2 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-sm">+</button>
                        </form>
                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-600 p-2" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Order Summary --}}
            <div class="lg:w-72 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 sticky top-20">
                    <h3 class="font-bold text-gray-800 text-lg mb-4">Ringkasan Pesanan</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal ({{ $cartItems->sum('quantity') }} item)</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Ongkos Kirim</span>
                            <span class="text-green-600 font-medium">Gratis</span>
                        </div>
                        <hr class="my-3">
                        <div class="flex justify-between font-bold text-gray-900 text-base">
                            <span>Total</span>
                            <span class="text-blue-700">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('orders.checkout') }}" class="block mt-5 bg-blue-600 hover:bg-blue-700 text-white text-center font-semibold py-3 rounded-xl transition">
                        <i class="fas fa-credit-card mr-2"></i> Checkout Sekarang
                    </a>
                    <a href="{{ route('products.index') }}" class="block mt-2 text-center text-sm text-gray-500 hover:text-gray-700">
                        <i class="fas fa-arrow-left mr-1"></i> Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
