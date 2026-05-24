

<?php $__env->startSection('title', 'Semua Produk - HP Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-6">

        
        <aside class="w-full md:w-64 flex-shrink-0">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 sticky top-20">
                <h3 class="font-bold text-gray-800 mb-4 text-lg">Filter Produk</h3>
                <form action="<?php echo e(route('products.index')); ?>" method="GET" id="filterForm">

                    
                    <div class="mb-4">
                        <label class="text-sm font-medium text-gray-600 block mb-1">Cari</label>
                        <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                            placeholder="Nama / brand..."
                            class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                    </div>

                    
                    <div class="mb-4">
                        <label class="text-sm font-medium text-gray-600 block mb-2">Brand</label>
                        <div class="space-y-1">
                            <label class="flex items-center gap-2 text-sm cursor-pointer">
                                <input type="radio" name="category" value="" <?php echo e(!request('category') ? 'checked' : ''); ?> class="text-blue-600">
                                <span>Semua Brand</span>
                            </label>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="flex items-center gap-2 text-sm cursor-pointer">
                                <input type="radio" name="category" value="<?php echo e($cat->slug); ?>"
                                    <?php echo e(request('category') === $cat->slug ? 'checked' : ''); ?> class="text-blue-600">
                                <span><?php echo e($cat->icon); ?> <?php echo e($cat->name); ?></span>
                            </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    
                    <div class="mb-4">
                        <label class="text-sm font-medium text-gray-600 block mb-2">Harga</label>
                        <div class="flex gap-2">
                            <input type="number" name="min_price" value="<?php echo e(request('min_price')); ?>"
                                placeholder="Min" class="w-full border border-gray-200 rounded-lg px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                            <input type="number" name="max_price" value="<?php echo e(request('max_price')); ?>"
                                placeholder="Max" class="w-full border border-gray-200 rounded-lg px-2 py-1.5 text-sm focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    
                    <div class="mb-5">
                        <label class="text-sm font-medium text-gray-600 block mb-1">Urutkan</label>
                        <select name="sort" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                            <option value="newest" <?php echo e(request('sort','newest') === 'newest' ? 'selected' : ''); ?>>Terbaru</option>
                            <option value="price_asc" <?php echo e(request('sort') === 'price_asc' ? 'selected' : ''); ?>>Harga Terendah</option>
                            <option value="price_desc" <?php echo e(request('sort') === 'price_desc' ? 'selected' : ''); ?>>Harga Tertinggi</option>
                            <option value="name" <?php echo e(request('sort') === 'name' ? 'selected' : ''); ?>>Nama A-Z</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition">
                        <i class="fas fa-filter mr-1"></i> Terapkan Filter
                    </button>
                    <a href="<?php echo e(route('products.index')); ?>" class="block text-center text-sm text-gray-500 hover:text-gray-700 mt-2">Reset Filter</a>
                </form>
            </div>
        </aside>

        
        <div class="flex-1">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold text-gray-800">
                    <?php echo e($products->total()); ?> Produk Ditemukan
                    <?php if(request('search')): ?>
                        <span class="text-blue-600">untuk "<?php echo e(request('search')); ?>"</span>
                    <?php endif; ?>
                </h2>
            </div>

            <?php if($products->isEmpty()): ?>
                <div class="bg-white rounded-2xl p-16 text-center border border-gray-100">
                    <span class="text-6xl">🔍</span>
                    <p class="text-gray-500 mt-4 text-lg">Produk tidak ditemukan</p>
                    <a href="<?php echo e(route('products.index')); ?>" class="mt-4 inline-block text-blue-600 hover:underline">Lihat semua produk</a>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('partials.product-card', ['product' => $product], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="mt-8">
                    <?php echo e($products->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\benerd\LaravelProject\hp-store\resources\views/products/index.blade.php ENDPATH**/ ?>