<?php $__env->startSection('content'); ?>

    <h1>Edit User</h1>
    <?php echo Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST']); ?>

        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
            <?php echo e(Form::label('name', 'Name')); ?>

            <?php echo e(Form::text('name', $user->name, ['class' => 'form-control', 'required'])); ?>

            <?php if($errors->has('name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <?php echo e(Form::label('email', 'Email')); ?>

            <?php echo e(Form::email('email', $user->email, ['class' => 'form-control'])); ?>

            <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <?php echo e(Form::label('password', 'Password')); ?>

            <?php echo e(Form::password('password', ['class' => 'form-control'])); ?>

            <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <?php echo e(Form::label('password-confirm', 'Confirm Password')); ?>

            <?php echo e(Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'form-control'])); ?>

        </div>
        <?php echo e(Form::hidden('_method', 'PUT')); ?> <!-- To spoof a PUT request instead of POST -->
        <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>