<div class="bg-white rounded-2xl shadow-sm border border-gray-100 card-hover overflow-hidden">
    <a href="<?php echo e(route('products.show', $product->slug)); ?>">
        <div class="relative bg-white h-52 flex items-center justify-center p-4">
            <?php if($product->image && file_exists(storage_path('app/public/' . $product->image))): ?>
                <img src="<?php echo e(asset('storage/' . $product->image)); ?>"
                     alt="<?php echo e($product->name); ?>"
                     class="h-full w-full object-contain mix-blend-multiply">
            <?php else: ?>
                
                <?php
                    $brandColors = [
                        'Samsung' => ['bg' => '#1428A0', 'text' => '#fff'],
                        'Apple'   => ['bg' => '#1d1d1f', 'text' => '#fff'],
                        'Xiaomi'  => ['bg' => '#FF6900', 'text' => '#fff'],
                        'OPPO'    => ['bg' => '#1A1A2E', 'text' => '#00C896'],
                        'Vivo'    => ['bg' => '#415FFF', 'text' => '#fff'],
                        'Realme'  => ['bg' => '#FFD700', 'text' => '#111'],
                    ];
                    $bc = $brandColors[$product->brand] ?? ['bg' => '#374151', 'text' => '#fff'];
                ?>
                <div class="w-32 h-44 rounded-3xl flex flex-col items-center justify-center shadow-lg"
                     style="background: <?php echo e($bc['bg']); ?>;">
                    <span class="text-4xl mb-2">📱</span>
                    <span class="text-xs font-bold px-2 text-center leading-tight"
                          style="color: <?php echo e($bc['text']); ?>"><?php echo e($product->brand); ?></span>
                </div>
            <?php endif; ?>

            <?php if($product->discount_percent > 0): ?>
                <span class="absolute top-2 left-2 badge-discount text-white text-xs font-bold px-2 py-1 rounded-lg">
                    -<?php echo e($product->discount_percent); ?>%
                </span>
            <?php endif; ?>
            <?php if($product->is_featured): ?>
                <span class="absolute top-2 right-2 bg-yellow-400 text-gray-900 text-xs font-bold px-2 py-1 rounded-lg">
                    ⭐ Unggulan
                </span>
            <?php endif; ?>
        </div>
    </a>
    <div class="p-4">
        <div class="text-xs text-blue-600 font-medium mb-1"><?php echo e($product->brand); ?></div>
        <a href="<?php echo e(route('products.show', $product->slug)); ?>">
            <h3 class="text-sm font-semibold text-gray-800 hover:text-blue-600 line-clamp-2 leading-snug"><?php echo e($product->name); ?></h3>
        </a>
        <div class="mt-2">
            <span class="text-blue-700 font-bold text-base">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></span>
            <?php if($product->original_price): ?>
                <span class="text-gray-400 text-xs line-through ml-1">Rp <?php echo e(number_format($product->original_price, 0, ',', '.')); ?></span>
            <?php endif; ?>
        </div>
        <div class="flex items-center justify-between mt-3">
            <span class="text-xs text-gray-400">
                <i class="fas fa-box mr-1"></i>
                <?php echo e($product->stock > 0 ? 'Stok: ' . $product->stock : 'Habis'); ?>

            </span>
            <?php if($product->stock > 0): ?>
                <?php if(auth()->guard()->check()): ?>
                    <form action="<?php echo e(route('cart.add')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 rounded-lg transition">
                            <i class="fas fa-cart-plus mr-1"></i> Keranjang
                        </button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>"
                       class="bg-blue-600 hover:bg-blue-700 text-white text-xs px-3 py-1.5 rounded-lg transition">
                        <i class="fas fa-cart-plus mr-1"></i> Keranjang
                    </a>
                <?php endif; ?>
            <?php else: ?>
                <span class="text-xs text-red-500 font-medium">Stok Habis</span>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\benerd\LaravelProject\hp-store\resources\views/partials/product-card.blade.php ENDPATH**/ ?>