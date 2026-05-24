@extends('layouts.app')

@section('title', 'Detail Pesanan - HP Store')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('orders.index') }}" class="text-gray-500 hover:text-gray-700"><i class="fas fa-arrow-left"></i></a>
        <h1 class="text-2xl font-bold text-gray-800">Detail Pesanan</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-5">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
            <div>
                <p class="text-sm text-gray-500">Nomor Pesanan</p>
                <p class="font-bold text-gray-900 text-lg">{{ $order->order_number }}</p>
                <p class="text-sm text-gray-400">{{ $order->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div class="flex flex-col gap-2">
                <span class="text-sm font-semibold px-4 py-1.5 rounded-full text-center {{ $order->status_badge }}">
                    Status: {{ ucfirst($order->status) }}
                </span>
                <span class="text-sm font-semibold px-4 py-1.5 rounded-full text-center {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    Pembayaran: {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm mb-5">
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="font-semibold text-gray-700 mb-1"><i class="fas fa-map-marker-alt mr-1 text-blue-500"></i> Alamat Pengiriman</p>
                <p class="text-gray-600">{{ $order->shipping_address }}</p>
                <p class="text-gray-600 mt-1"><i class="fas fa-phone mr-1"></i> {{ $order->phone }}</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-4">
                <p class="font-semibold text-gray-700 mb-1"><i class="fas fa-wallet mr-1 text-blue-500"></i> Pembayaran</p>
                <p class="text-gray-600">{{ $order->payment_method === 'transfer' ? 'Transfer Bank' : 'COD (Bayar di Tempat)' }}</p>
                @if($order->notes)
                    <p class="text-gray-500 mt-1 text-xs"><i class="fas fa-sticky-note mr-1"></i> {{ $order->notes }}</p>
                @endif
            </div>
        </div>

        <h3 class="font-bold text-gray-800 mb-3">Item Pesanan</h3>
        <div class="space-y-3">
            @foreach($order->items as $item)
            <div class="flex gap-4 items-center border border-gray-100 rounded-xl p-3">
                <div class="w-14 h-14 bg-gray-50 rounded-xl flex items-center justify-center flex-shrink-0">
                    @if($item->product->image)
                        <img src="{{ asset('storage/' . $item->product->image) }}" class="w-full h-full object-contain rounded-xl">
                    @else
                        <span class="text-3xl">📱</span>
                    @endif
                </div>
                <div class="flex-1">
                    <p class="font-medium text-gray-800 text-sm">{{ $item->product->name }}</p>
                    <p class="text-gray-500 text-xs">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                </div>
                <span class="font-semibold text-gray-800 text-sm">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
            </div>
            @endforeach
        </div>

        <div class="border-t border-gray-100 mt-5 pt-4 space-y-2 text-sm">
            <div class="flex justify-between text-gray-600">
                <span>Subtotal</span>
                <span>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between text-gray-600">
                <span>Ongkos Kirim</span>
                <span class="text-green-600">Gratis</span>
            </div>
            <div class="flex justify-between font-bold text-gray-900 text-base pt-2 border-t">
                <span>Total Bayar</span>
                <span class="text-blue-700">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition text-sm">
        <i class="fas fa-shopping-bag mr-2"></i> Lanjut Belanja
    </a>
</div>
@endsection
