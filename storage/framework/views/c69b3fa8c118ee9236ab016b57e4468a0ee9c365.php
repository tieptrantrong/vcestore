<?php echo $__env->make('media::admin.image_picker.files', [
    'title' => trans('product::products.form.public_resources'),
    'inputName' => 'files[public_resources][]',
    'files' => $product->public_resources,
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcestore/Modules/Product/Resources/views/admin/products/tabs/public_resources.blade.php ENDPATH**/ ?>