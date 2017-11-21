<?php $__env->startSection('content'); ?>
    <h1><?php echo e($page->title); ?></h1>

    <?php echo $page->body; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme1-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>