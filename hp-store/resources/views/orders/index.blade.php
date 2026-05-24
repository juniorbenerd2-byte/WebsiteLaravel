@extends('layouts.app')

@section('title', 'Pesanan Saya - HP Store')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><i class="fas fa-box mr-2 text-blue-600"></i> Pesanan Saya</h1>

    @if($orders->isEmpty())
        <div class="bg-white rounded-2xl p-16 text-center shadow-sm border border-gray-100">
            <span class="text-7xl">📦</span>
            <p class="text-gray-500 mt-4 text-lg">Belum ada pesanan</p>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition">
                Mulai Belanja
            </a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($orders as $order)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                    <div>
                        <span class="font-bold text-gray-800">{{ $order->order_number }}</span>
                        <span class="text-gray-400 text-sm ml-2">{{ $order->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-semibold px-3 py-1 rounded-full {{ $order->status_badge }}">
                            {{ ucfirst($order->status) }}
                        </span>
                        <span class="text-xs font-semibold px-3 py-1 rounded-full {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}
                        </span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3 mb-4">
                    @foreach($order->items->take(3) as $item)
                    <div class="flex items-center gap-2 bg-gray-50 rounded-xl px-3 py-2">
                        <span class="text-xl">📱</span>
                        <div>
                            <p class="text-xs font-medium text-gray-700">{{ Str::limit($item->product->name, 25) }}</p>
                            <p class="text-xs text-gray-500">{{ $item->quantity }}x</p>
                        </div>
                    </div>
                    @endforeach
                    @if($order->items->count() > 3)
                        <div class="flex items-center bg-gray-50 rounded-xl px-3 py-2 text-xs text-gray-500">
                            +{{ $order->items->count() - 3 }} item lainnya
                        </div>
                    @endif
                </div>
                <div class="flex items-center justify-between">
                    <span class="font-bold text-blue-700">Total: Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                    <a href="{{ route('orders.show', $order) }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                        Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
