<?php $__env->startSection('content'); ?>
    <h1><?php echo e($language === 'de' ? 'Post ändern' : 'Edit Post'); ?></h1>
    <?php echo $__env->make('inc.posts.edit-onpage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.'.$theme, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>