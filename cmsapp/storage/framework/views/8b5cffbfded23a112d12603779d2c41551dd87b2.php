<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('inc.posts.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme1-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>