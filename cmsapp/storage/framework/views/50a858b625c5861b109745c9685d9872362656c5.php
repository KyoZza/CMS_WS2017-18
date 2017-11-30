<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title"><?php echo e($breadcrumbs[1]->name); ?></h3>
        </div>
        <div class="panel-body">
            
            <div class="<?php echo e($theme); ?>-customize-navbar customize-frontend">           
                <?php echo $__env->make('inc.'.$theme.'.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>