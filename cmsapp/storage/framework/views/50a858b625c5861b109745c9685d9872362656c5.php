<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title"><?php echo e($breadcrumbs[1]->name); ?></h3>
        </div>
        <div class="panel-body">
            

            
                
                <!-- Nav tabs -->
                <ul id="navbar-tabs" class="nav nav-tabs" role="tablist">
                    <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($navItem->position == 0): ?>
                            <li role="presentation" class="active">
                        <?php else: ?>
                            <li role="presentation">
                        <?php endif; ?>
                                <a href="#<?php echo e($navItem->title); ?>" aria-controls="<?php echo e($navItem->title); ?>" role="tab" data-toggle="tab"><?php echo e($navItem->title); ?></a>
                            </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                
                <br>
                <!-- Tab panes -->
                <div class="tab-content">
                    <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($navItem->position == 0): ?>
                            <div role="tabpanel" class="tab-pane active" id="<?php echo e($navItem->title); ?>">
                        <?php else: ?>
                            <div role="tabpanel" class="tab-pane" id="<?php echo e($navItem->title); ?>">
                        <?php endif; ?>
                                <?php echo Form::open(['action' => ['AdminController@customizeNavbarUpdate', $navItem->id], 'method' => 'POST']); ?>


                                    <div class="form-group">
                                        <?php echo e(Form::label('navitem-title', 'Title')); ?>

                                        <?php echo e(Form::text('navitem-title', $navItem->title, ['class' => 'form-control'/*, 'onkeyup'=> 'onNavbarTitleChange(event);'*/])); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo e(Form::label('navitem-link', 'Link')); ?>

                                        <?php if($navItem->link == '/blog'): ?>
                                            <?php echo e(Form::text('navitem-link', $navItem->link, ['class' => 'form-control', 'deactivated'])); ?>

                                        <?php else: ?>
                                            <?php echo e(Form::text('navitem-link', $navItem->link, ['class' => 'form-control'])); ?>

                                        <?php endif; ?>
                                        
                                        <br>
                                        <select class="form-control" onchange="onNavbarPageChange(event);">
                                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($page->url == $navItem->link): ?>
                                                    <option value="<?php echo e($page->url); ?>" selected>
                                                <?php else: ?>
                                                    <option value="<?php echo e($page->url); ?>">
                                                <?php endif; ?>
                                                        <?php echo e($page->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            <?php if($navItem->link == '/blog'): ?>
                                                    <option value="/blog" selected>
                                            <?php else: ?>
                                                    <option value="/blog">
                                            <?php endif; ?>
                                                        Blog</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <?php echo e(Form::label('navitem-position', 'Position')); ?>

                                        <?php echo e(Form::text('navitem-position', $navItem->position, ['class' => 'form-control', 'onkeyup'=> 'onNavbarPositionChange(event);'])); ?>

                                    </div>

                                    <?php echo e(Form::hidden('_method', 'PUT')); ?> <!-- To spoof a PUT request instead of POST -->
                                    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

                                <?php echo Form::close(); ?>


                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            
                
                
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>