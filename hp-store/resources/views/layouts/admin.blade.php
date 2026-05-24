<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - HP Store')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex h-screen overflow-hidden">
    {{-- Sidebar --}}
    <aside class="w-64 bg-gray-900 text-white flex flex-col flex-shrink-0">
        <div class="p-5 border-b border-gray-700">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                <span class="text-2xl">📱</span>
                <span class="text-lg font-bold">HP<span class="text-blue-400">Store</span>
                    <span class="text-xs text-gray-400 font-normal">Admin</span>
                </span>
            </a>
        </div>

        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                      {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                <i class="fas fa-tachometer-alt w-4 text-center"></i> Dashboard
            </a>

            {{-- Divider --}}
            <p class="text-xs text-gray-500 uppercase tracking-wider px-4 pt-4 pb-1">Katalog</p>

            {{-- Produk --}}
            <a href="{{ route('admin.products.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                      {{ request()->routeIs('admin.products.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                <i class="fas fa-mobile-alt w-4 text-center"></i> Produk
            </a>

            {{-- Kategori --}}
            <a href="{{ route('admin.categories.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                      {{ request()->routeIs('admin.categories.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                <i class="fas fa-tags w-4 text-center"></i> Kategori
            </a>

            {{-- Divider --}}
            <p class="text-xs text-gray-500 uppercase tracking-wider px-4 pt-4 pb-1">Transaksi</p>

            {{-- Pesanan --}}
            <a href="{{ route('admin.orders.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                      {{ request()->routeIs('admin.orders.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                <i class="fas fa-shopping-bag w-4 text-center"></i> Pesanan
                @php $pendingOrders = \App\Models\Order::where('status','pending')->count(); @endphp
                @if($pendingOrders > 0)
                    <span class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-0.5">{{ $pendingOrders }}</span>
                @endif
            </a>

            {{-- Divider --}}
            <p class="text-xs text-gray-500 uppercase tracking-wider px-4 pt-4 pb-1">Pengguna</p>

            {{-- Users --}}
            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition
                      {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                <i class="fas fa-users w-4 text-center"></i> Pengguna
            </a>
        </nav>

        <div class="p-4 border-t border-gray-700 space-y-1">
            <a href="{{ route('home') }}"
               class="flex items-center gap-2 text-gray-400 hover:text-white text-sm py-2 px-3 rounded-lg hover:bg-gray-800 transition">
                <i class="fas fa-store w-4 text-center"></i> Lihat Toko
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-2 text-gray-400 hover:text-red-400 text-sm w-full py-2 px-3 rounded-lg hover:bg-gray-800 transition">
                    <i class="fas fa-sign-out-alt w-4 text-center"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Top Bar --}}
        <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between flex-shrink-0">
            <h1 class="text-lg font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
            <div class="flex items-center gap-3 text-sm text-gray-600">
                <span class="hidden md:block text-gray-400">{{ now()->format('d M Y') }}</span>
                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-sm font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <span class="font-medium">{{ auth()->user()->name }}</span>
            </div>
        </header>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="mx-6 mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg flex items-center justify-between">
                <span><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
            </div>
        @endif
        @if(session('error'))
            <div class="mx-6 mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg flex items-center justify-between">
                <span><i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()"><i class="fas fa-times"></i></button>
            </div>
        @endif

        {{-- Page Content --}}
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
