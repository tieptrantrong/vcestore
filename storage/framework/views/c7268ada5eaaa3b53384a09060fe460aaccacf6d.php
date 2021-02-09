<div id="private-product-group">
    
</div>

<div class="box-footer no-border p-t-0">
    <div class="form-group pull-left">
        <div class="col-md-10">
            <button type="button" class="btn btn-default m-r-10" id="add-new-private-product">
                <?php echo e(trans('product::products.private_product.add_new_product')); ?>

            </button>
        </div>
    </div>
</div>
<?php echo $__env->make('product::admin.products.partials.private_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('globals'); ?>
    <script>
        FleetCart.data['product.privateUrlProducts'] = <?php echo old_json('options', $product->privateUrlProducts); ?>;
        FleetCart.errors['product.privateUrlProducts'] = <?php echo json_encode($errors->get('options.*'), JSON_FORCE_OBJECT, 512) ?>;
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /var/www/vcestore/Modules/Product/Resources/views/admin/products/tabs/product_urls.blade.php ENDPATH**/ ?>