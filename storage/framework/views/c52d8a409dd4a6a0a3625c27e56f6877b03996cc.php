<aside class="main-sidebar">
    <header class="main-header clearfix">
        <a class="logo" href="<?php echo e(route('admin.dashboard.index')); ?>">
            <span class="logo-lg">VcePro</span>
        </a>

        <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <i aria-hidden="true" class="fa fa-bars"></i>
        </a>
    </header>

    <section class="sidebar">
        <?php echo $sidebar; ?>

    </section>
</aside>
<?php /**PATH /var/www/vcestore/Modules/Admin/Resources/views/partials/sidebar.blade.php ENDPATH**/ ?>