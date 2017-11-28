<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title"><?php echo e($breadcrumbs[1]->name); ?></h3>
        </div>
        <div class="panel-body">
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>