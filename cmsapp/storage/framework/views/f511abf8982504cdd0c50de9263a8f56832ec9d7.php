<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li>Admin Area</li>        
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <?php switch($breadcrumb->name):
                    case ('Edit Post'): ?>
                        <li class="<?php echo e($breadcrumb->class); ?>"><a href="<?php echo e($breadcrumb->url); ?><?php echo e($post->id); ?>/edit"><?php echo e($breadcrumb->name); ?></a></li>                        
                        <?php break; ?>
                    <?php case ('User'): ?>
                        <li class="<?php echo e($breadcrumb->class); ?>"><a href="<?php echo e($breadcrumb->url); ?><?php echo e($user->id); ?>"><?php echo e($breadcrumb->name); ?></a></li>                                                
                        <?php break; ?>
                    <?php case ('Edit User'): ?>
                        <li class="<?php echo e($breadcrumb->class); ?>"><a href="<?php echo e($breadcrumb->url); ?><?php echo e($user->id); ?>/edit"><?php echo e($breadcrumb->name); ?></a></li>                                                
                        <?php break; ?>
                    <?php case ('Page'): ?>
                        <li class="<?php echo e($breadcrumb->class); ?>"><a href="<?php echo e($breadcrumb->url); ?><?php echo e($page->id); ?>"><?php echo e($breadcrumb->name); ?></a></li>                                                
                        <?php break; ?>
                    <?php case ('Edit Page'): ?>
                        <li class="<?php echo e($breadcrumb->class); ?>"><a href="<?php echo e($breadcrumb->url); ?><?php echo e($page->id); ?>/edit"><?php echo e($breadcrumb->name); ?></a></li>                                                
                        <?php break; ?>
                    <?php default: ?>
                        <li class="<?php echo e($breadcrumb->class); ?>"><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->name); ?></a></li>                     
                <?php endswitch; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </div>
</section>