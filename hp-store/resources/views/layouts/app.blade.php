<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HP Store - Toko Smartphone Terpercaya')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .gradient-hero { background: linear-gradient(135deg, #1e3a5f 0%, #0f2027 50%, #203a43 100%); }
        .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }
        .badge-discount { background: linear-gradient(135deg, #ff416c, #ff4b2b); }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans">

    {{-- Navbar --}}
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <span class="text-2xl">📱</span>
                    <span class="text-xl font-bold text-blue-700">HP<span class="text-gray-800">Store</span></span>
                </a>

                {{-- Search --}}
                <div class="hidden md:flex flex-1 max-w-lg mx-8">
                    <form action="{{ route('products.index') }}" method="GET" class="w-full flex">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari smartphone..."
                            class="w-full border border-gray-300 rounded-l-lg px-4 py-2 text-sm focus:outline-none focus:border-blue-500">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                {{-- Nav Links --}}
                <div class="flex items-center space-x-4">
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-blue-600 text-sm font-medium hidden md:block">
                        <i class="fas fa-th-large mr-1"></i> Produk
                    </a>

                    @auth
                        <a href="{{ route('cart.index') }}" class="relative text-gray-600 hover:text-blue-600">
                            <i class="fas fa-shopping-cart text-xl"></i>
                            @php $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity'); @endphp
                            @if($cartCount > 0)
                                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ $cartCount }}</span>
                            @endif
                        </a>

                        <div class="relative group">
                            <button class="flex items-center space-x-1 text-gray-600 hover:text-blue-600 text-sm font-medium">
                                <i class="fas fa-user-circle text-xl"></i>
                                <span class="hidden md:block">{{ auth()->user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-100 hidden group-hover:block z-50">
                                <a href="{{ route('orders.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-box mr-2 text-blue-500"></i> Pesanan Saya
                                </a>
                                @if(auth()->user()->is_admin)
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                        <i class="fas fa-cog mr-2 text-purple-500"></i> Admin Panel
                                    </a>
                                @endif
                                <hr class="my-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 text-sm font-medium">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg flex items-center justify-between">
                <span><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900"><i class="fas fa-times"></i></button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 mt-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg flex items-center justify-between">
                <span><i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="text-red-700 hover:text-red-900"><i class="fas fa-times"></i></button>
            </div>
        </div>
    @endif

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-gray-300 mt-16">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="text-2xl">📱</span>
                        <span class="text-xl font-bold text-white">HP<span class="text-blue-400">Store</span></span>
                    </div>
                    <p class="text-sm text-gray-400">Toko smartphone terpercaya dengan koleksi lengkap dari brand ternama dunia.</p>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-3">Kategori</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('products.index', ['category' => 'samsung']) }}" class="hover:text-blue-400">Samsung</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'iphone']) }}" class="hover:text-blue-400">iPhone</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'xiaomi']) }}" class="hover:text-blue-400">Xiaomi</a></li>
                        <li><a href="{{ route('products.index', ['category' => 'oppo']) }}" class="hover:text-blue-400">OPPO</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-3">Layanan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-blue-400">Cara Pembelian</a></li>
                        <li><a href="#" class="hover:text-blue-400">Pengiriman</a></li>
                        <li><a href="#" class="hover:text-blue-400">Garansi</a></li>
                        <li><a href="#" class="hover:text-blue-400">Retur & Refund</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-3">Kontak</h4>
                    <ul class="space-y-2 text-sm">
                        <li><i class="fas fa-phone mr-2 text-blue-400"></i> 0800-1234-5678</li>
                        <li><i class="fas fa-envelope mr-2 text-blue-400"></i> cs@hpstore.com</li>
                        <li><i class="fas fa-map-marker-alt mr-2 text-blue-400"></i> Jakarta, Indonesia</li>
                    </ul>
                    <div class="flex space-x-3 mt-4">
                        <a href="#" class="text-gray-400 hover:text-blue-400"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-400"><i class="fab fa-facebook text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-400"><i class="fab fa-tiktok text-xl"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-gray-700 my-8">
            <p class="text-center text-sm text-gray-500">&copy; {{ date('Y') }} HPStore. All rights reserved.</p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
