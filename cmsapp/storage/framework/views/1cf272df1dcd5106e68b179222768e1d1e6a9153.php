<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
        <h3 class="panel-title">User Details</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3 col-sm-3"><strong>Username:</strong></div>
            <div class="col-md-9 col-sm-9"><?php echo e($user->name); ?></div>            
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3"><strong>Email:</strong></div>
            <div class="col-md-9 col-sm-9"><?php echo e($user->email); ?></div>            
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3"><strong>Role:</strong></div>
            <div class="col-md-9 col-sm-9"><?php echo e($user->roles->first()->name); ?></div>            
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3"><strong>User since:</strong></div>
            <div class="col-md-9 col-sm-9"><?php echo e($user->created_at); ?></div>            
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
            <?php if(count($user->activities) > 0): ?>
                <?php $__currentLoopData = $user->activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($activity->description); ?>: <a href="<?php echo e($activity->url_address); ?>"><?php echo e($activity->url_title); ?></a>
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

<?php if(Auth::user()->id == $user->id || Auth::user()->hasRole('Super Saiyajin')): ?>
    <a href="/admin/users/<?php echo e($user->id); ?>/edit" class="btn btn-default">Edit</a>
    <?php echo Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right']); ?>

        <?php echo e(Form::hidden('_method', 'DELETE')); ?> <!-- To spoof a DELETE request instead of POST -->
        <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger'])); ?>

    <?php echo Form::close(); ?> 
<?php endif; ?> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>