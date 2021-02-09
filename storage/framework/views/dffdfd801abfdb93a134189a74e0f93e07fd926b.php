<?php
function convertToReadableSize($size){
  $base = log($size) / log(1024);
  $suffix = array("", "KB", "MB", "GB", "TB");
  $f_base = floor($base);
  return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
}
?>

<div id="public-resources" class="tab-pane public-resources" :class="{ active: activeTab === 'public-resources' }">
    <table class="table table-bordered table-public-resources">
        <thead class="table-header-bg">
            <tr>
                <th scope="col" class="center-align-product"><?php echo e(trans('storefront::product_card.title_exam')); ?></th>
                <th scope="col" class="center-align-product"><?php echo e(trans('storefront::product_card.file_size')); ?></th>
                <th scope="col" class="center-align-product"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $product->public_resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $public_resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="center-align-product"><a href="<?php echo e($public_resource->path); ?>" download="<?php echo e($public_resource->filename); ?>"><?php echo e($public_resource->filename); ?></a></td>
                <td class="center-align-product"><?php echo e(convertToReadableSize($public_resource->size)); ?></td>
                <td class="center-align-product"><a href="<?php echo e($public_resource->path); ?>"  download="<?php echo e($public_resource->filename); ?>x">Download</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /var/www/vcestore/Themes/Storefront/views/public/products/show/tab_public_resources.blade.php ENDPATH**/ ?>