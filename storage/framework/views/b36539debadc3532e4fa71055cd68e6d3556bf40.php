<div class="col-lg-3 col-md-6 col-9 category-item">
    <a href="<?php echo e($category->url()); ?>" class="brand-image">
        <div class="imgWrap"><img src="<?php echo e($category->logo->path); ?>" alt="brand image"></div>
        <div class="title"><?php echo e($category->name); ?></div>
        <div class="name"><?php echo e($category->products()->where('is_certificate', '=', false)->count()); ?> exams</div>                        
    </a>
</div><?php /**PATH /var/www/vcestore/Themes/Storefront/views/public/categories/component/category.blade.php ENDPATH**/ ?>