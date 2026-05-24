@extends('layouts.app')

@section('title', 'Checkout - HP Store')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><i class="fas fa-credit-card mr-2 text-blue-600"></i> Checkout</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="flex flex-col lg:flex-row gap-6">

            {{-- Shipping Form --}}
            <div class="flex-1 space-y-5">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-bold text-gray-800 mb-4 text-lg"><i class="fas fa-map-marker-alt mr-2 text-blue-500"></i> Alamat Pengiriman</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap <span class="text-red-500">*</span></label>
                        <textarea name="shipping_address" rows="3" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-blue-500 @error('shipping_address') border-red-400 @enderror"
                            placeholder="Jl. Contoh No. 123, Kelurahan, Kecamatan, Kota, Provinsi">{{ old('shipping_address') }}</textarea>
                        @error('shipping_address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nomor HP <span class="text-red-500">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-blue-500 @error('phone') border-red-400 @enderror"
                            placeholder="08xxxxxxxxxx">
                        @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Catatan (opsional)</label>
                        <textarea name="notes" rows="2"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-blue-500"
                            placeholder="Catatan untuk penjual...">{{ old('notes') }}</textarea>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-bold text-gray-800 mb-4 text-lg"><i class="fas fa-wallet mr-2 text-blue-500"></i> Metode Pembayaran</h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-blue-400 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50">
                            <input type="radio" name="payment_method" value="transfer" checked class="text-blue-600">
                            <div>
                                <div class="font-medium text-gray-800 text-sm">Transfer Bank</div>
                                <div class="text-xs text-gray-500">BCA, Mandiri, BNI, BRI</div>
                            </div>
                            <span class="ml-auto text-2xl">🏦</span>
                        </label>
                        <label class="flex items-center gap-3 border border-gray-200 rounded-xl p-4 cursor-pointer hover:border-blue-400 has-[:checked]:border-blue-500 has-[:checked]:bg-blue-50">
                            <input type="radio" name="payment_method" value="cod" class="text-blue-600">
                            <div>
                                <div class="font-medium text-gray-800 text-sm">COD (Bayar di Tempat)</div>
                                <div class="text-xs text-gray-500">Bayar saat barang tiba</div>
                            </div>
                            <span class="ml-auto text-2xl">💵</span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="lg:w-80 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 sticky top-20">
                    <h3 class="font-bold text-gray-800 text-lg mb-4">Ringkasan Pesanan</h3>
                    <div class="space-y-3 max-h-64 overflow-y-auto mb-4">
                        @foreach($cartItems as $item)
                        <div class="flex gap-3 items-center">
                            <div class="w-12 h-12 bg-gray-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                @if($item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" class="w-full h-full object-contain rounded-lg">
                                @else
                                    <span class="text-2xl">📱</span>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-medium text-gray-700 line-clamp-1">{{ $item->product->name }}</p>
                                <p class="text-xs text-gray-500">{{ $item->quantity }}x Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                            </div>
                            <span class="text-xs font-semibold text-gray-800 flex-shrink-0">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>
                    <hr class="my-3">
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Ongkos Kirim</span>
                            <span class="text-green-600 font-medium">Gratis</span>
                        </div>
                        <hr>
                        <div class="flex justify-between font-bold text-gray-900 text-base">
                            <span>Total Bayar</span>
                            <span class="text-blue-700">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <button type="submit" class="w-full mt-5 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition">
                        <i class="fas fa-check-circle mr-2"></i> Buat Pesanan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
