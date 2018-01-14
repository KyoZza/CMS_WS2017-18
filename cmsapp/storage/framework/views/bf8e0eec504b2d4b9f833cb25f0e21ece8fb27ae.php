<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">Users</div>

        <div class="panel-body">
            
            <?php if(Auth::user()->hasRole('Super Saiyajin')): ?>
                <a href="/admin/users/create" class="btn btn-default">Create User</a>
                <br><br>
            <?php endif; ?>
            
            
            <?php if(count($users) > 0): ?>
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <img src="<?php echo e($user->avatar === null ? '/storage/general_images/transparent.png' : '/storage/user_images/'.$user->avatar); ?>" 
                                    width="26px">
                                <a href="/admin/users/<?php echo e($user->id); ?>"><?php echo e($user->name); ?></a>
                            </td>
                            <td>
                                <span data-toggle="tooltip" data-placement="bottom" title="<?php echo e($user->roles->first()->description); ?>">
                                    <?php echo e($user->roles->first()->name); ?>

                                </span>
                            </td>
                            <td>
                                <?php if($user->id == Auth::user()->id): ?>
                                    <div class="pull-right">
                                        <a href="/admin/users/<?php echo e($user->id); ?>/edit" class="btn btn-xs btn-default">Edit</a> 
                                    </div>
                                <?php else: ?>
                                    <?php if(Auth::user()->hasRole('Super Saiyajin')): ?>
                                        <div class="pull-right">
                                        <a href="/admin/users/<?php echo e($user->id); ?>/edit" class="btn btn-xs btn-default">Edit</a> 
                                        <?php if($user->id != Auth::user()->id): ?>
                                            <?php echo Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'POST', 'style' => 'display: inline-block']); ?>

                                                <?php echo e(Form::hidden('_method', 'DELETE')); ?> <!-- To spoof a DELETE request instead of POST -->
                                                <?php echo e(Form::submit('Delete', ['class' => 'btn btn-xs btn-danger'])); ?>

                                            <?php echo Form::close(); ?> 
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php else: ?>
                <p>There are no users yet.</p>
            <?php endif; ?>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>