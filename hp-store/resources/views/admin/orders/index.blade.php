@extends('layouts.admin')

@section('title', 'Kelola Pesanan - Admin HP Store')
@section('page-title', 'Kelola Pesanan')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr class="text-left text-gray-500">
                    <th class="px-5 py-3 font-medium">No. Pesanan</th>
                    <th class="px-5 py-3 font-medium">Pelanggan</th>
                    <th class="px-5 py-3 font-medium">Total</th>
                    <th class="px-5 py-3 font-medium">Metode</th>
                    <th class="px-5 py-3 font-medium">Status</th>
                    <th class="px-5 py-3 font-medium">Pembayaran</th>
                    <th class="px-5 py-3 font-medium">Tanggal</th>
                    <th class="px-5 py-3 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($orders as $order)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3 font-medium text-gray-800">{{ $order->order_number }}</td>
                    <td class="px-5 py-3 text-gray-600">{{ $order->user->name }}</td>
                    <td class="px-5 py-3 font-semibold text-blue-700">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                    <td class="px-5 py-3 text-gray-600">{{ $order->payment_method === 'transfer' ? 'Transfer' : 'COD' }}</td>
                    <td class="px-5 py-3">
                        <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $order->status_badge }}">{{ ucfirst($order->status) }}</span>
                    </td>
                    <td class="px-5 py-3">
                        <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-gray-500">{{ $order->created_at->format('d M Y') }}</td>
                    <td class="px-5 py-3">
                        <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-5 py-10 text-center text-gray-400">Belum ada pesanan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $orders->links() }}
    </div>
</div>
@endsection
