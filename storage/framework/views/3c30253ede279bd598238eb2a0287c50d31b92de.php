<?php $__env->startSection('breadcrumb'); ?>
<li class="active"> Certification Providers</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="all-brands-wrap">
    <div class="container">
        <div class="row">
            <div class="col products-left">
                <div class="hot-provider all-brands">
                    <h3 class="provider-title">Hot Providers</h3>
                    <div class="all-brands-inner">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($category->is_hot): ?>
                                <div class="col-lg-3 col-md-6 col-9">
                                    <a href="https://fleetcart.envaysoft.com/en/brands/apple/products" class="brand-image">
                                        <img src="https://fleetcart.envaysoft.com/storage/media/jZG1juhijMhWSrn8B4jgsX5x4Vb8dOTdZTtGNACo.png" alt="brand image">
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="all-provider all-brands">
                    <h3 class="provider-title">All Providers</h3>
                    <div class="all-brands-inner">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-6 col-9">
                                <a href="https://fleetcart.envaysoft.com/en/brands/apple/products" class="brand-image">
                                    <img src="https://fleetcart.envaysoft.com/storage/media/jZG1juhijMhWSrn8B4jgsX5x4Vb8dOTdZTtGNACo.png" alt="brand image">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-4">
                <?php echo $__env->make('public.products.index.hot_products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcestore/Themes/Storefront/views/public/products//all.blade.php ENDPATH**/ ?>