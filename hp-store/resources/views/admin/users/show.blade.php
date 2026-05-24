@extends('layouts.admin')

@section('title', 'Detail Pengguna - Admin HP Store')
@section('page-title', 'Detail Pengguna')

@section('content')
<div class="max-w-4xl">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-sm text-gray-500 mb-5">
        <a href="{{ route('admin.users.index') }}" class="hover:text-blue-600">Pengguna</a>
        <i class="fas fa-chevron-right text-xs"></i>
        <span class="text-gray-800 font-medium">{{ $user->name }}</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">

        {{-- Profile Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center">
            <div class="w-20 h-20 rounded-full flex items-center justify-center text-white text-3xl font-bold mx-auto mb-4"
                 style="background:{{ $user->is_admin ? '#7C3AED' : '#2563EB' }}">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <h3 class="font-bold text-gray-900 text-lg leading-tight">{{ $user->name }}</h3>
            <p class="text-gray-500 text-sm mt-1">{{ $user->email }}</p>
            <div class="mt-3">
                @if($user->is_admin)
                    <span class="bg-purple-100 text-purple-700 text-xs font-semibold px-3 py-1 rounded-full">
                        <i class="fas fa-shield-alt mr-1"></i>Admin
                    </span>
                @else
                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                        <i class="fas fa-user mr-1"></i>Pelanggan
                    </span>
                @endif
            </div>
            <p class="text-xs text-gray-400 mt-3">
                <i class="fas fa-calendar mr-1"></i>
                Bergabung {{ $user->created_at->format('d M Y') }}
            </p>

            <div class="flex gap-2 mt-5">
                <a href="{{ route('admin.users.edit', $user) }}"
                   class="flex-1 bg-blue-600 text-white text-sm py-2 rounded-xl hover:bg-blue-700 transition text-center">
                    <i class="fas fa-edit mr-1"></i>Edit
                </a>
                @if($user->id !== auth()->id())
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                      onsubmit="return confirm('Hapus user {{ addslashes($user->name) }}?')"
                      class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full bg-red-100 text-red-600 text-sm py-2 rounded-xl hover:bg-red-200 transition">
                        <i class="fas fa-trash-alt mr-1"></i>Hapus
                    </button>
                </form>
                @endif
            </div>
        </div>

        {{-- Stats --}}
        <div class="md:col-span-2 grid grid-cols-2 gap-4">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-shopping-bag text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Total Pesanan</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $user->orders_count }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-shopping-cart text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Item Keranjang</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $user->carts_count }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-wallet text-yellow-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Total Belanja</p>
                        <p class="text-base font-bold text-gray-900">
                            Rp {{ number_format($totalSpent, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0
                                {{ $hasSession ? 'bg-green-100' : 'bg-gray-100' }}">
                        <i class="fas fa-circle text-sm {{ $hasSession ? 'text-green-500' : 'text-gray-400' }}"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">Status Sesi</p>
                        @if($hasSession)
                            <p class="text-sm font-bold text-green-600 flex items-center gap-1 mt-0.5">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>Online
                            </p>
                        @else
                            <p class="text-sm font-semibold text-gray-400 mt-0.5">Offline</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Order History --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100">
            <h3 class="font-bold text-gray-800 text-sm">
                <i class="fas fa-history mr-2 text-blue-500"></i>Riwayat Pesanan
            </h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr class="text-left text-gray-500">
                        <th class="px-5 py-3 font-medium">No. Pesanan</th>
                        <th class="px-5 py-3 font-medium">Total</th>
                        <th class="px-5 py-3 font-medium">Status</th>
                        <th class="px-5 py-3 font-medium">Pembayaran</th>
                        <th class="px-5 py-3 font-medium">Tanggal</th>
                        <th class="px-5 py-3 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3 font-medium text-gray-800 text-xs">{{ $order->order_number }}</td>
                        <td class="px-5 py-3 font-semibold text-blue-700">
                            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                        </td>
                        <td class="px-5 py-3">
                            <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $order->status_badge }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-5 py-3">
                            <span class="text-xs font-semibold px-2 py-1 rounded-full
                                {{ $order->payment_status === 'paid'
                                    ? 'bg-green-100 text-green-800'
                                    : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $order->payment_status === 'paid' ? 'Lunas' : 'Belum Bayar' }}
                            </span>
                        </td>
                        <td class="px-5 py-3 text-gray-500 text-xs">
                            {{ $order->created_at->format('d M Y') }}
                        </td>
                        <td class="px-5 py-3">
                            <a href="{{ route('admin.orders.show', $order) }}"
                               class="text-blue-600 hover:text-blue-800 text-xs font-medium">
                                <i class="fas fa-eye mr-1"></i>Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-5 py-8 text-center text-gray-400 text-sm">
                            Belum ada pesanan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
