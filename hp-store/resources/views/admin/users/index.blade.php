@extends('layouts.admin')

@section('title', 'Manajemen Pengguna - Admin HP Store')
@section('page-title', 'Manajemen Pengguna')

@section('content')

{{-- Stats --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 flex items-center gap-3">
        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <i class="fas fa-users text-blue-600"></i>
        </div>
        <div>
            <p class="text-xs text-gray-500">Total User</p>
            <p class="text-2xl font-bold text-gray-900">{{ $totalUsers }}</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 flex items-center gap-3">
        <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <i class="fas fa-user-shield text-purple-600"></i>
        </div>
        <div>
            <p class="text-xs text-gray-500">Admin</p>
            <p class="text-2xl font-bold text-gray-900">{{ $totalAdmins }}</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 flex items-center gap-3">
        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <i class="fas fa-user text-green-600"></i>
        </div>
        <div>
            <p class="text-xs text-gray-500">Pelanggan</p>
            <p class="text-2xl font-bold text-gray-900">{{ $totalCustomers }}</p>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 flex items-center gap-3">
        <div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center flex-shrink-0">
            <i class="fas fa-circle text-yellow-500"></i>
        </div>
        <div>
            <p class="text-xs text-gray-500">Sesi Aktif</p>
            <p class="text-2xl font-bold text-gray-900">{{ $activeSessions }}</p>
        </div>
    </div>
</div>

{{-- Filter --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-4">
    <form action="{{ route('admin.users.index') }}" method="GET"
          class="flex flex-wrap gap-3 items-end">
        <div class="flex-1 min-w-48">
            <label class="block text-xs font-medium text-gray-600 mb-1">Cari</label>
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Nama atau email..."
                class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
        </div>
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Role</label>
            <select name="role"
                class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                <option value="">Semua</option>
                <option value="admin"    {{ request('role') === 'admin'    ? 'selected' : '' }}>Admin</option>
                <option value="customer" {{ request('role') === 'customer' ? 'selected' : '' }}>Pelanggan</option>
            </select>
        </div>
        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-blue-700 transition">
            <i class="fas fa-search mr-1"></i> Cari
        </button>
        <a href="{{ route('admin.users.index') }}"
           class="bg-gray-100 text-gray-600 px-4 py-2 rounded-xl text-sm font-medium hover:bg-gray-200 transition">
            Reset
        </a>
        <a href="{{ route('admin.users.create') }}"
           class="ml-auto bg-green-600 text-white px-4 py-2 rounded-xl text-sm font-medium hover:bg-green-700 transition">
            <i class="fas fa-plus mr-1"></i> Tambah User
        </a>
    </form>
</div>

{{-- Users Table --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr class="text-left text-gray-500">
                    <th class="px-5 py-3 font-medium">Pengguna</th>
                    <th class="px-5 py-3 font-medium">Email</th>
                    <th class="px-5 py-3 font-medium">Role</th>
                    <th class="px-5 py-3 font-medium text-center">Pesanan</th>
                    <th class="px-5 py-3 font-medium text-center">Keranjang</th>
                    <th class="px-5 py-3 font-medium text-center">Sesi</th>
                    <th class="px-5 py-3 font-medium">Bergabung</th>
                    <th class="px-5 py-3 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($users as $user)
                <tr class="hover:bg-gray-50 {{ $user->id === auth()->id() ? 'bg-blue-50/50' : '' }}">
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center
                                        text-white text-sm font-bold flex-shrink-0"
                                 style="background:{{ $user->is_admin ? '#7C3AED' : '#2563EB' }}">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="font-medium text-gray-800 leading-tight">
                                    {{ $user->name }}
                                    @if($user->id === auth()->id())
                                        <span class="text-xs text-blue-500 font-normal">(Anda)</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-3 text-gray-500">{{ $user->email }}</td>
                    <td class="px-5 py-3">
                        @if($user->is_admin)
                            <span class="bg-purple-100 text-purple-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fas fa-shield-alt mr-1"></i>Admin
                            </span>
                        @else
                            <span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                                <i class="fas fa-user mr-1"></i>Pelanggan
                            </span>
                        @endif
                    </td>
                    <td class="px-5 py-3 text-center font-semibold text-gray-700">
                        {{ $user->orders_count }}
                    </td>
                    <td class="px-5 py-3 text-center text-gray-500">
                        {{ $user->carts_count }}
                    </td>
                    <td class="px-5 py-3 text-center">
                        @if(in_array($user->id, $onlineUserIds))
                            <span class="inline-flex items-center gap-1 text-green-600 text-xs font-medium">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>Online
                            </span>
                        @else
                            <span class="text-gray-400 text-xs">Offline</span>
                        @endif
                    </td>
                    <td class="px-5 py-3 text-gray-400 text-xs">
                        {{ $user->created_at->format('d M Y') }}
                    </td>
                    <td class="px-5 py-3">
                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.users.show', $user) }}"
                               class="p-1.5 text-blue-500 hover:text-blue-700 hover:bg-blue-50 rounded-lg transition"
                               title="Detail">
                                <i class="fas fa-eye text-xs"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="p-1.5 text-yellow-500 hover:text-yellow-700 hover:bg-yellow-50 rounded-lg transition"
                               title="Edit">
                                <i class="fas fa-edit text-xs"></i>
                            </a>
                            @if($user->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                  onsubmit="return confirm('Hapus user {{ addslashes($user->name) }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="p-1.5 text-red-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
                                    title="Hapus">
                                    <i class="fas fa-trash-alt text-xs"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-5 py-12 text-center text-gray-400">
                        <i class="fas fa-users text-3xl mb-2 block opacity-30"></i>
                        Tidak ada pengguna ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-gray-100">
        {{ $users->links() }}
    </div>
</div>

{{-- Session Table --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-5 py-4 border-b border-gray-100 flex items-center justify-between">
        <h3 class="font-bold text-gray-800 text-sm">
            <i class="fas fa-clock mr-2 text-yellow-500"></i>Sesi Aktif (20 Terbaru)
        </h3>
        <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-lg">
            Session Driver: Database
        </span>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr class="text-left text-gray-500">
                    <th class="px-5 py-3 font-medium">Pengguna</th>
                    <th class="px-5 py-3 font-medium">IP Address</th>
                    <th class="px-5 py-3 font-medium">Browser</th>
                    <th class="px-5 py-3 font-medium">Terakhir Aktif</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @php
                    $sessions = \Illuminate\Support\Facades\DB::table('sessions')
                        ->leftJoin('users', 'sessions.user_id', '=', 'users.id')
                        ->select('sessions.ip_address', 'sessions.user_agent',
                                 'sessions.last_activity', 'sessions.user_id',
                                 'users.name as user_name', 'users.email as user_email')
                        ->orderByDesc('sessions.last_activity')
                        ->limit(20)
                        ->get();
                @endphp
                @forelse($sessions as $sess)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3">
                        @if($sess->user_name)
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 rounded-full bg-blue-600 flex items-center
                                            justify-center text-white text-xs font-bold flex-shrink-0">
                                    {{ strtoupper(substr($sess->user_name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800 text-xs leading-tight">{{ $sess->user_name }}</p>
                                    <p class="text-gray-400 text-xs">{{ $sess->user_email }}</p>
                                </div>
                            </div>
                        @else
                            <span class="text-gray-400 text-xs italic">
                                <i class="fas fa-user-secret mr-1"></i>Guest
                            </span>
                        @endif
                    </td>
                    <td class="px-5 py-3 font-mono text-xs text-gray-600">
                        {{ $sess->ip_address ?? '-' }}
                    </td>
                    <td class="px-5 py-3 text-xs text-gray-500">
                        @php
                            $ua = $sess->user_agent ?? '';
                            if (str_contains($ua, 'Edg'))     $browser = '🔷 Edge';
                            elseif (str_contains($ua, 'Chrome'))  $browser = '🌐 Chrome';
                            elseif (str_contains($ua, 'Firefox')) $browser = '🦊 Firefox';
                            elseif (str_contains($ua, 'Safari'))  $browser = '🧭 Safari';
                            else $browser = '🌐 Browser';

                            if (str_contains($ua, 'Mobile'))  $browser .= ' (Mobile)';
                        @endphp
                        {{ $browser }}
                    </td>
                    <td class="px-5 py-3 text-xs text-gray-500">
                        {{ \Carbon\Carbon::createFromTimestamp($sess->last_activity)->diffForHumans() }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-5 py-8 text-center text-gray-400 text-sm">
                        Belum ada sesi aktif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
