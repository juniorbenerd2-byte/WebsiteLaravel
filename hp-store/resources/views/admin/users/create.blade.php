@extends('layouts.admin')

@section('title', 'Tambah Pengguna - Admin HP Store')
@section('page-title', 'Tambah Pengguna Baru')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('admin.users.store') }}" method="POST" novalidate>
            @csrf
            <div class="space-y-5">

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full border rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500
                               {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-gray-200' }}"
                        placeholder="Nama lengkap pengguna">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full border rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500
                               {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-gray-200' }}"
                        placeholder="email@contoh.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password" required
                        class="w-full border rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500
                               {{ $errors->has('password') ? 'border-red-400 bg-red-50' : 'border-gray-200' }}"
                        placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Konfirmasi Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" name="password_confirmation" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500"
                        placeholder="Ulangi password">
                </div>

                {{-- Role Toggle --}}
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                    <label class="flex items-center gap-4 cursor-pointer select-none">
                        <input type="checkbox" name="is_admin" value="1"
                               id="toggle_admin"
                               {{ old('is_admin') ? 'checked' : '' }}
                               class="w-4 h-4 text-purple-600 rounded">
                        <div>
                            <p class="text-sm font-medium text-gray-800">Jadikan Admin</p>
                            <p class="text-xs text-gray-500 mt-0.5">Admin dapat mengakses seluruh panel manajemen</p>
                        </div>
                        <span id="role_badge"
                              class="ml-auto text-xs font-semibold px-3 py-1 rounded-full
                                     {{ old('is_admin') ? 'bg-purple-100 text-purple-700' : 'bg-green-100 text-green-700' }}">
                            {{ old('is_admin') ? 'Admin' : 'Pelanggan' }}
                        </span>
                    </label>
                </div>

            </div>

            <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition">
                    <i class="fas fa-save mr-1"></i> Simpan Pengguna
                </button>
                <a href="{{ route('admin.users.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2.5 rounded-xl text-sm font-medium transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const toggle = document.getElementById('toggle_admin');
    const badge  = document.getElementById('role_badge');
    toggle.addEventListener('change', function () {
        if (this.checked) {
            badge.textContent = 'Admin';
            badge.className = 'ml-auto text-xs font-semibold px-3 py-1 rounded-full bg-purple-100 text-purple-700';
        } else {
            badge.textContent = 'Pelanggan';
            badge.className = 'ml-auto text-xs font-semibold px-3 py-1 rounded-full bg-green-100 text-green-700';
        }
    });
</script>
@endpush
@endsection
