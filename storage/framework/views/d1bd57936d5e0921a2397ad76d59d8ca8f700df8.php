<?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
    <div class="container">
        <div class="breadcrumb">
            <ul class="list-inline">
                <li>
                    <a href="<?php echo e(route('home')); ?>"><?php echo e(trans('storefront::layout.home')); ?></a>
                </li>

                <?php echo $__env->yieldContent('breadcrumb'); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/vcestore/Themes/Storefront/views/public/layout/breadcrumb.blade.php ENDPATH**/ ?>