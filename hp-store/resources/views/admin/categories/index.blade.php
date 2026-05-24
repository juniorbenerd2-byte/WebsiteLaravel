@extends('layouts.admin')

@section('title', 'Kelola Kategori - Admin HP Store')
@section('page-title', 'Kelola Kategori')

@section('content')
<div class="flex items-center justify-between mb-5">
    <p class="text-gray-500 text-sm">{{ $categories->count() }} kategori terdaftar</p>
    <a href="{{ route('admin.categories.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-medium transition">
        <i class="fas fa-plus mr-1"></i> Tambah Kategori
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr class="text-left text-gray-500">
                <th class="px-5 py-3 font-medium">#</th>
                <th class="px-5 py-3 font-medium">Ikon</th>
                <th class="px-5 py-3 font-medium">Nama</th>
                <th class="px-5 py-3 font-medium">Slug</th>
                <th class="px-5 py-3 font-medium">Jumlah Produk</th>
                <th class="px-5 py-3 font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($categories as $category)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-3 text-gray-400 text-xs">{{ $category->id }}</td>
                <td class="px-5 py-3 text-2xl">{{ $category->icon }}</td>
                <td class="px-5 py-3 font-semibold text-gray-800">{{ $category->name }}</td>
                <td class="px-5 py-3 text-gray-500 font-mono text-xs">{{ $category->slug }}</td>
                <td class="px-5 py-3">
                    <span class="bg-blue-100 text-blue-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                        {{ $category->products_count }} produk
                    </span>
                </td>
                <td class="px-5 py-3">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.categories.edit', $category) }}"
                           class="text-yellow-500 hover:text-yellow-700 p-1.5 rounded-lg hover:bg-yellow-50 transition" title="Edit">
                            <i class="fas fa-edit text-xs"></i>
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                              onsubmit="return confirm('Hapus kategori {{ $category->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-400 hover:text-red-600 p-1.5 rounded-lg hover:bg-red-50 transition" title="Hapus">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-5 py-12 text-center text-gray-400">
                    <i class="fas fa-tags text-3xl mb-2 block"></i>
                    Belum ada kategori
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
