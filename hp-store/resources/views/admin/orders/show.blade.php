@extends('layouts.admin')

@section('title', 'Detail Pesanan - Admin HP Store')
@section('page-title', 'Detail Pesanan')

@section('content')
<div class="max-w-3xl">
    <div class="flex items-center gap-3 mb-5">
        <a href="{{ route('admin.orders.index') }}" class="text-gray-500 hover:text-gray-700"><i class="fas fa-arrow-left"></i></a>
        <span class="font-bold text-gray-800">{{ $order->order_number }}</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <h3 class="font-bold text-gray-800 mb-3">Info Pelanggan</h3>
            <p class="text-sm text-gray-700"><i class="fas fa-user mr-2 text-blue-500"></i>{{ $order->user->name }}</p>
            <p class="text-sm text-gray-700 mt-1"><i class="fas fa-envelope mr-2 text-blue-500"></i>{{ $order->user->email }}</p>
            <p class="text-sm text-gray-700 mt-1"><i class="fas fa-phone mr-2 text-blue-500"></i>{{ $order->phone }}</p>
            <p class="text-sm text-gray-700 mt-1"><i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>{{ $order->shipping_address }}</p>
            @if($order->notes)
                <p class="text-sm text-gray-500 mt-1"><i class="fas fa-sticky-note mr-2"></i>{{ $order->notes }}</p>
            @endif
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <h3 class="font-bold text-gray-800 mb-3">Update Status</h3>
            <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="space-y-3">
                @csrf
                @method('PATCH')
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Status Pesanan</label>
                    <select name="status" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                        @foreach(['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $s)
                            <option value="{{ $s }}" {{ $order->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-600 mb-1">Status Pembayaran</label>
                    <select name="payment_status" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                        <option value="unpaid" {{ $order->payment_status === 'unpaid' ? 'selected' : '' }}>Belum Bayar</option>
                        <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Lunas</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-xl text-sm font-medium transition">
                    <i class="fas fa-save mr-1"></i> Update Status
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
        <h3 class="font-bold text-gray-800 mb-4">Item Pesanan</h3>
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
        <div class="border-t border-gray-100 mt-4 pt-4 flex justify-between font-bold text-gray-900">
            <span>Total Bayar</span>
            <span class="text-blue-700">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
        </div>
    </div>
</div>
@endsection
