<?php echo e(Form::text('name', trans('product::attributes.name'), $errors, $product, ['labelCol' => 2, 'required' => true])); ?>

<?php echo e(Form::text('title', trans('product::attributes.title'), $errors, $product, ['labelCol' => 2, 'required' => false])); ?>

<?php echo e(Form::wysiwyg('description', trans('product::attributes.description'), $errors, $product, ['labelCol' => 2, 'required' => true])); ?>


<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::select('brand_id', trans('product::attributes.brand_id'), $errors, $brands, $product)); ?>

        <?php echo e(Form::select('categories', trans('product::attributes.categories'), $errors, $categories, $product, ['class' => 'selectize prevent-creation', 'multiple' => true])); ?>

        <?php echo e(Form::select('tax_class_id', trans('product::attributes.tax_class_id'), $errors, $taxClasses, $product)); ?>

        <?php echo e(Form::select('tags', trans('product::attributes.tags'), $errors, $tags, $product, ['class' => 'selectize prevent-creation', 'multiple' => true])); ?>

        <?php echo e(Form::checkbox('is_active', trans('product::attributes.is_active'), trans('product::products.form.enable_the_product'), $errors, $product)); ?>

        <?php echo e(Form::checkbox('is_certificate', trans('product::attributes.is_certificate'), trans('product::products.form.enable_the_product'), $errors, $product)); ?>

        <?php echo e(Form::number('questions', trans('product::attributes.number_of_questions'), $errors, $product, ['min' => 0])); ?>

    </div>
</div>
<?php /**PATH /var/www/vcestore/Modules/Product/Resources/views/admin/products/tabs/general.blade.php ENDPATH**/ ?>