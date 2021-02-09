<div class="form-group variant-input">
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <label for="option-<?php echo e($option->id); ?>">
                <?php echo $option->name .
                    $option->values->first()->formattedPriceForProduct($product) .
                    ($option->is_required ? '<span>*</span>' : ''); ?>

            </label>
        </div>

        <div class="col-xl-10 col-lg-12">
            <div class="form-input">
                <input
                    name="options[<?php echo e($option->id); ?>]"
                    class="form-control <?php echo e(array_pull($attributes, 'class')); ?>"
                    id="option-<?php echo e($option->id); ?>"
                    v-model="cartItemForm.options[<?php echo e($option->id); ?>]"
                    <?php echo e(html_attrs($attributes)); ?>

                >
            </div>

            <span
                class="error-message"
                v-if="errors.has('<?php echo e("options.{$option->id}"); ?>')"
                v-text="errors.get('<?php echo e("options.{$option->id}"); ?>')"
            >
            </span>
        </div>
    </div>
</div>
<?php /**PATH /var/www/vcestore/Themes/Storefront/views/public/products/show/custom_options/input.blade.php ENDPATH**/ ?>