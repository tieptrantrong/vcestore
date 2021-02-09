<?php $__env->startSection('title'); ?>
<?php echo e($categoryName); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('globals'); ?>
    <script>
        FleetCart.langs['storefront::products.showing_results'] = '<?php echo e(trans("storefront::products.showing_results")); ?>';
        FleetCart.langs['storefront::products.show_more'] = '<?php echo e(trans("storefront::products.show_more")); ?>';
        FleetCart.langs['storefront::products.show_less'] = '<?php echo e(trans("storefront::products.show_less")); ?>';
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo $categoryBreadcrumb; ?>


    <li class="active"><?php echo e($categoryName); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <product-category
        initial-query="<?php echo e(request('query')); ?>"
        initial-brand-name="<?php echo e($brandName ?? ''); ?>"
        initial-brand-banner="<?php echo e($brandBanner ?? ''); ?>"
        initial-brand-slug="<?php echo e(request('brand')); ?>"
        initial-category-name="<?php echo e($categoryName ?? ''); ?>"
        initial-category-banner="<?php echo e($categoryBanner ?? ''); ?>"
        initial-category-slug="<?php echo e(request('category')); ?>"
        initial-tag-name="<?php echo e($tagName ?? ''); ?>"
        initial-tag-slug="<?php echo e(request('tag')); ?>"
        :initial-attribute="<?php echo e(json_encode(request('attribute', []))); ?>"
        :max-price="<?php echo e($maxPrice); ?>"
        initial-sort="<?php echo e(request('sort', 'alphabetic')); ?>"
        :initial-per-page="<?php echo e(request('perPage', 150)); ?>"
        :initial-page="<?php echo e(request('page', 1)); ?>"
        initial-view-mode="<?php echo e(request('viewMode', 'grid')); ?>"
        inline-template
    >
        <section class="product-search-wrap">
            <div class="container">
                <div class="row">
                    <div class="col products-left">
                        <div class="search-result">
                            <div class="search-result-top">
                                <div class="content-left category-title">
                                    <h2 class="h2">Pass <?php echo e($categoryName); ?> Certifications Exam in First Attempt Easily</h2>
                                    <h3 class="h3">Real <?php echo e($categoryName); ?> Certification Exam Dumps, Practice Test Questions, <br> Accurate &amp; Verified Answers As Experienced in the Actual Test!</h3>
                                </div>
                            </div>

                            <div class="category-tab clearfix">
                                <ul class="nav nav-tabs tabs">
                                    <li class="nav-item">
                                        <a href="#category-exams" data-toggle="tab" class="nav-link" :class="{ active: activeTab === 'category-exams' }">
                                            <div class="border"></div>
                                            <?php echo e($categoryName . ' Exams'); ?>

                                        </a>
                                    </li>
    
                                    <li class="nav-item">
                                        <a href="#category-certificates" data-toggle="tab" class="nav-link" :class="{ active: activeTab === 'category-certificates' }">
                                            <div class="border"></div>
                                            <?php echo e($categoryName . ' Certifications'); ?>

                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#category-description" data-toggle="tab" class="nav-link" :class="{ active: activeTab === 'category-description' }">
                                            <div class="border"></div>
                                            <?php echo e('About ' . $categoryName); ?>

                                        </a>
                                    </li>
                                </ul>
    
                                <div class="tab-content category-content">
                                    <?php echo $__env->make('public.products.category.tab_exams', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('public.products.category.tab_certificates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('public.products.category.tab_description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <?php if($categories->isNotEmpty()): ?>
                        <div class="d-none browse-categories-wrap">
                            <h4 class="section-title">
                                <?php echo e(trans('storefront::products.browse_categories')); ?>

                            </h4>

                            <?php echo $__env->make('public.products.index.browse_categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php endif; ?>
                        <div class="d-none">
                            <?php echo $__env->make('public.products.index.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php echo $__env->make('public.layout.right_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </section>
    </product-category>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcestore/Themes/Storefront/views/public/products/category.blade.php ENDPATH**/ ?>