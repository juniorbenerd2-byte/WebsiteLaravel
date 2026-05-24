@extends('layouts.admin')

@section('title', 'Kelola Produk - Admin HP Store')
@section('page-title', 'Kelola Produk')

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-gray-500 text-sm">{{ $products->total() }} produk terdaftar</p>
    <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-medium transition">
        <i class="fas fa-plus mr-1"></i> Tambah Produk
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr class="text-left text-gray-500">
                    <th class="px-5 py-3 font-medium">Produk</th>
                    <th class="px-5 py-3 font-medium">Brand</th>
                    <th class="px-5 py-3 font-medium">Harga</th>
                    <th class="px-5 py-3 font-medium">Stok</th>
                    <th class="px-5 py-3 font-medium">Status</th>
                    <th class="px-5 py-3 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-contain rounded-lg">
                                @else
                                    <span class="text-xl">📱</span>
                                @endif
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ Str::limit($product->name, 35) }}</p>
                                <p class="text-xs text-gray-400">{{ $product->category->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-3 text-gray-600">{{ $product->brand }}</td>
                    <td class="px-5 py-3 font-semibold text-blue-700">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td class="px-5 py-3">
                        <span class="{{ $product->stock > 5 ? 'text-green-600' : ($product->stock > 0 ? 'text-yellow-600' : 'text-red-600') }} font-medium">
                            {{ $product->stock }}
                        </span>
                    </td>
                    <td class="px-5 py-3">
                        <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                            {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                        @if($product->is_featured)
                            <span class="text-xs font-semibold px-2 py-1 rounded-full bg-yellow-100 text-yellow-800 ml-1">⭐ Unggulan</span>
                        @endif
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-blue-800 p-1" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                  onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600 p-1" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-10 text-center text-gray-400">Belum ada produk</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $products->links() }}
    </div>
</div>
@endsection
