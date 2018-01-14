<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Website Overview</h3>
    </div>
    <div class="panel-body">
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fa fa-user-circle" aria-hidden="true"></i><?php echo e($numUsers); ?></h2>
                <h4>Users</h4>
            </div>       
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fa fa-pencil-square-o" aria-hidden="true"></i><?php echo e($numPosts); ?></h2>
                <h4>Posts</h4>
            </div>      
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fa fa-leanpub" aria-hidden="true"></i><?php echo e($numPages); ?></h2>
                <h4>Pages</h4>
            </div>      
        </div>
        <div class="col-md-3">
            <div class="well dash-box">
                <h2><i class="fa fa-comments-o" aria-hidden="true"></i><?php echo e($numMessages); ?></h2>
                <h4>Messages</h4>
            </div>       
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading  main-color-bg">
        <h3 class="panel-title">Latest Activities</h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <th>Activity</th>
                <th>Date</th>
            </tr>
            <?php if(count($activities) > 0): ?>
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($activity->description); ?>: <a href="<?php echo e($activity->url_address); ?>"><?php echo e($activity->url_title); ?></a>
                            <?php if(isset($activity->user->name)): ?>
                                , by <a href="/admin/users/<?php echo e($activity->user->id); ?>"><?php echo e($activity->user->name); ?></a> 
                            <?php else: ?>
                                , by 'user deleted'                               
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e($activity->created_at); ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>