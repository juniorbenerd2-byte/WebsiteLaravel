@extends('layouts.admin')

@section('title', 'Tambah Kategori - Admin HP Store')
@section('page-title', 'Tambah Kategori')

@section('content')
<div class="max-w-lg">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Kategori <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 @error('name') border-red-400 @enderror"
                        placeholder="Contoh: Samsung">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ikon (Emoji)</label>
                    <input type="text" name="icon" value="{{ old('icon', '📱') }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500"
                        placeholder="📱">
                    <p class="text-xs text-gray-400 mt-1">Masukkan satu emoji sebagai ikon kategori</p>
                </div>

                <div class="bg-gray-50 rounded-xl p-3 text-xs text-gray-500">
                    <i class="fas fa-info-circle mr-1 text-blue-400"></i>
                    Slug akan dibuat otomatis dari nama kategori.
                </div>
            </div>

            <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
                <a href="{{ route('admin.categories.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2.5 rounded-xl text-sm font-medium transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
