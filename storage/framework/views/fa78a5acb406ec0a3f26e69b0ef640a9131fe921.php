<div class="custom-products">
    <?php echo e(Form::select('certificates', trans('storefront::attributes.products'), $errors, $product->certificates->pluck('name', 'id'), null, ['class' => 'selectize prevent-creation', 'data-url' => route('admin.products.index'), 'multiple' => true, 'select_all' => true])); ?>

</div><?php /**PATH /var/www/vcestore/Modules/Product/Resources/views/admin/products/tabs/children.blade.php ENDPATH**/ ?>