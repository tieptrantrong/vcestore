<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('attribute::admin.attributes')); ?>

    <li class="active"><?php echo e(trans('attribute::admin.attributes')); ?></li>
<?php if (isset($__componentOriginald1838d9cbc3e98f76d88606a9883c1cec482d537)): ?>
<?php $component = $__componentOriginald1838d9cbc3e98f76d88606a9883c1cec482d537; ?>
<?php unset($__componentOriginald1838d9cbc3e98f76d88606a9883c1cec482d537); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::components.page.index_table'); ?>
    <?php $__env->slot('buttons', ['create']); ?>
    <?php $__env->slot('resource', 'attributes'); ?>
    <?php $__env->slot('name', trans('attribute::admin.attribute')); ?>

    <?php $__env->startComponent('admin::components.table'); ?>
        <?php $__env->slot('thead'); ?>
            <tr>
                <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <th><?php echo e(trans('admin::admin.table.id')); ?></th>
                <th><?php echo e(trans('attribute::admin.table.name')); ?></th>
                <th><?php echo e(trans('attribute::admin.table.attribute_set')); ?></th>
                <th><?php echo e(trans('attribute::admin.table.filterable')); ?></th>
                <th data-sort><?php echo e(trans('admin::admin.table.created')); ?></th>
            </tr>
        <?php $__env->endSlot(); ?>
    <?php if (isset($__componentOriginaldee888a357ec29c71597049b25b353da45b3a06e)): ?>
<?php $component = $__componentOriginaldee888a357ec29c71597049b25b353da45b3a06e; ?>
<?php unset($__componentOriginaldee888a357ec29c71597049b25b353da45b3a06e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php if (isset($__componentOriginalc2e763454f271710e588c202de697a849434b70e)): ?>
<?php $component = $__componentOriginalc2e763454f271710e588c202de697a849434b70e; ?>
<?php unset($__componentOriginalc2e763454f271710e588c202de697a849434b70e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#attributes-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'attribute_set', name: 'attributeSet.name', searchable: false, orderable: false, defaultContent: '' },
                { data: 'is_filterable', name: 'is_filterable', searchable: false, orderable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vcestore/Modules/Attribute/Resources/views/admin/attributes/index.blade.php ENDPATH**/ ?>