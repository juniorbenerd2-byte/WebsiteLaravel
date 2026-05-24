<div class="bg-white rounded-2xl shadow-sm border border-gray-100 card-hover overflow-hidden">
    <a href="{{ route('products.show', $product->slug) }}">
        <div class="relative bg-white h-52 flex items-center justify-center p-4">
            @if($product->image && file_exists(storage_path('app/public/' . $product->image)))
                <img src="{{ asset('storage/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="h-full w-full object-contain mix-blend-multiply">
            @else
                {{-- Placeholder dengan nama brand --}}
                @php
                    $brandColors = [
                        'Samsung' => ['bg' => '#1428A0', 'text' => '#fff'],
                        'Apple'   => ['bg' => '#1d1d1f', 'text' => '#fff'],
                        'Xiaomi'  => ['bg' => '#FF6900', 'text' => '#fff'],
                        'OPPO'    => ['bg' => '#1A1A2E', 'text' => '#00C896'],
                        'Vivo'    => ['bg' => '#415FFF', 'text' => '#fff'],
                        'Realme'  => ['bg' => '#FFD700', 'text' => '#111'],
                    ];
                    $bc = $brandColors[$product->brand] ?? ['bg' => '#374151', 'text' => '#fff'];
                @endphp
                <div class="w-32 h-44 rounded-3xl flex flex-col items-center justify-center shadow-lg"
                     style="background: {{ $bc['bg'] }};">
                    <span class="text-4xl mb-2">📱</span>
                    <span class="text-xs font-bold px-2 text-center leading-tight"
                          style="color: {{ $bc['text'] }}">{{ $product->brand }}</span>
                </div>
            @endif

            @if($product->discount_percent > 0)
                <span class="absolute top-2 left-2 badge-discount text-white text-xs font-bold px-2 py-1 rounded-lg">
                    -{{ $product->discount_percent }}%
                </span>
            @endif
            @if($product->is_featured)
                <span class="absolute top-2 right-2 bg-yellow-400 text-gray-900 text-xs font-bold px-2 py-1 rounded-lg">
                    ⭐ Unggulan
                </span>
            @endif
        </div>
    </a>
    <div class="p-4">
        <div class="text-xs text-blue-600 font-medium mb-1">{{ $product->brand }}</div>
        <a href="{{ route('products.show', $product->slug) }}">
            <h3 class="text-sm font-semibold text-gray-800 hover:text-blue-600 line-clamp-2 leading-snug">{{ $product->name }}</h3>
        </a>
        <div class="mt-2">
            <span class="text-blue-700 font-bold text-base">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            @if($product->original_price)
                <span class="text-gray-400 text-xs line-through ml-1">Rp {{ number_format($product->original_price, 0, ',', '.') }}</span>
            @endif
        </div>
        <div class="flex items-center justify-between mt-3">
            <span class="text-xs text-gray-400">
                <i class="fas fa-box mr-1"></i>
                {{ $product->stock > 0 ? 'Stok: ' . $product->stock : 'Habis' }}
            </span>
            @if($product->stock > 0)
                @auth
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 rounded-lg transition">
                            <i class="fas fa-cart-plus mr-1"></i> Keranjang
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 rounded-lg transition">
                        <i class="fas fa-cart-plus mr-1"></i> Keranjang
                    </a>
                @endauth
            @else
                <span class="text-xs text-red-500 font-medium">Stok Habis</span>
            @endif
        </div>
    </div>
</div>
