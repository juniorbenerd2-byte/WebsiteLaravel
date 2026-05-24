@extends('layouts.admin')

@section('title', 'Edit Pengguna - Admin HP Store')
@section('page-title', 'Edit Pengguna')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

        {{-- Header --}}
        <div class="flex items-center gap-4 mb-6 pb-5 border-b border-gray-100">
            <div class="w-14 h-14 rounded-full flex items-center justify-center text-white text-xl font-bold flex-shrink-0"
                 style="background:{{ $user->is_admin ? '#7C3AED' : '#2563EB' }}">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div>
                <h3 class="font-bold text-gray-900">{{ $user->name }}</h3>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>
                <p class="text-xs text-gray-400 mt-0.5">
                    Bergabung {{ $user->created_at->format('d M Y') }}
                </p>
            </div>
        </div>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" novalidate>
            @csrf
            @method('PUT')
            <div class="space-y-5">

                {{-- Nama --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full border rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500
                               {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-gray-200' }}">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full border rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500
                               {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-gray-200' }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password (opsional) --}}
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-4">
                    <p class="text-xs font-semibold text-amber-700 mb-3">
                        <i class="fas fa-key mr-1"></i>Ganti Password
                        <span class="font-normal text-amber-600">(kosongkan jika tidak ingin mengubah)</span>
                    </p>
                    <div class="space-y-3">
                        <input type="password" name="password"
                            class="w-full border border-amber-200 bg-white rounded-xl px-4 py-2.5 text-sm
                                   focus:outline-none focus:border-amber-400
                                   {{ $errors->has('password') ? 'border-red-400' : '' }}"
                            placeholder="Password baru">
                        <input type="password" name="password_confirmation"
                            class="w-full border border-amber-200 bg-white rounded-xl px-4 py-2.5 text-sm
                                   focus:outline-none focus:border-amber-400"
                            placeholder="Konfirmasi password baru">
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-2"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Role --}}
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                    <label class="flex items-center gap-4 cursor-pointer select-none
                                  {{ $user->id === auth()->id() ? 'opacity-60 cursor-not-allowed' : '' }}">
                        <input type="checkbox" name="is_admin" value="1"
                               id="toggle_admin"
                               {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                               {{ $user->id === auth()->id() ? 'disabled' : '' }}
                               class="w-4 h-4 text-purple-600 rounded">
                        <div>
                            <p class="text-sm font-medium text-gray-800">Status Admin</p>
                            <p class="text-xs text-gray-500 mt-0.5">
                                @if($user->id === auth()->id())
                                    Tidak bisa mengubah role akun sendiri
                                @else
                                    Admin dapat mengakses seluruh panel manajemen
                                @endif
                            </p>
                        </div>
                        <span id="role_badge"
                              class="ml-auto text-xs font-semibold px-3 py-1 rounded-full
                                     {{ old('is_admin', $user->is_admin) ? 'bg-purple-100 text-purple-700' : 'bg-green-100 text-green-700' }}">
                            {{ old('is_admin', $user->is_admin) ? 'Admin' : 'Pelanggan' }}
                        </span>
                    </label>
                </div>

            </div>

            <div class="flex gap-3 mt-6 pt-5 border-t border-gray-100">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition">
                    <i class="fas fa-save mr-1"></i> Update Pengguna
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
    if (toggle && !toggle.disabled) {
        toggle.addEventListener('change', function () {
            if (this.checked) {
                badge.textContent = 'Admin';
                badge.className = 'ml-auto text-xs font-semibold px-3 py-1 rounded-full bg-purple-100 text-purple-700';
            } else {
                badge.textContent = 'Pelanggan';
                badge.className = 'ml-auto text-xs font-semibold px-3 py-1 rounded-full bg-green-100 text-green-700';
            }
        });
    }
</script>
@endpush
@endsection
