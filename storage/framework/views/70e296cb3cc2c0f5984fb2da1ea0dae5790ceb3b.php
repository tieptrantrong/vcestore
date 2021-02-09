<div class="multiple-images-wrapper">
    <h4><?php echo e($title); ?></h4>

    <button type="button" class="vce-picker btn btn-default" data-input-name="<?php echo e($inputName); ?>" data-multiple>
        <i class="fa fa-folder-open m-r-5"></i><?php echo e(trans('media::media.browse')); ?>

    </button>

    <div class="multiple-files public-resources">
        <ul class="file-list">
            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="public-resource"><?php echo e($file->filename); ?>

                    <button type="button" class="close remove-public-resource" data-input-name="<?php echo e($inputName); ?>">&times;</button>
                    <input type="hidden" name="<?php echo e($inputName); ?>" value="<?php echo e($file->id); ?>">
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH /var/www/vcestore/Modules/Media/Resources/views/admin/image_picker/files.blade.php ENDPATH**/ ?>