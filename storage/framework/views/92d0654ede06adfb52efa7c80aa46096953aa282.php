<div class="box-body index-table" id="media-table">
    <?php $__env->startComponent('admin::components.table'); ?>
        <?php $__env->slot('thead'); ?>
            <tr>
                <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <th data-sort><?php echo e(trans('admin::admin.table.id')); ?></th>
                <th><?php echo e(trans('media::media.table.thumbnail')); ?></th>
                <th><?php echo e(trans('media::media.table.filename')); ?></th>
                <th data-sort><?php echo e(trans('admin::admin.table.created')); ?></th>

                <?php if (! (request()->routeIs('admin.media.index'))): ?>
                    <th class="min-tablet"></th>
                <?php endif; ?>
            </tr>
        <?php $__env->endSlot(); ?>
    <?php if (isset($__componentOriginaldee888a357ec29c71597049b25b353da45b3a06e)): ?>
<?php $component = $__componentOriginaldee888a357ec29c71597049b25b353da45b3a06e; ?>
<?php unset($__componentOriginaldee888a357ec29c71597049b25b353da45b3a06e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
</div>
<?php /**PATH /var/www/vcestore/Modules/Media/Resources/views/admin/media/partials/table.blade.php ENDPATH**/ ?>