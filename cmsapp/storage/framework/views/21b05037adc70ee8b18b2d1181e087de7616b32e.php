<?php $__env->startSection('content'); ?>
    <h1>Create Page</h1>    <!-- 'enctype' => 'multipart/form-data' whenever a file get's submitted-->
    <?php echo Form::open(['action' => 'PagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
            <?php echo e(Form::label('title', 'Title')); ?>

            <?php echo e(Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])); ?>

            <?php if($errors->has('title')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('title')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('url') ? ' has-error' : ''); ?>">
            <?php echo e(Form::label('url', 'Url')); ?>

            <?php echo e(Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])); ?>

            <?php if($errors->has('url')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('url')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('body') ? ' has-error' : ''); ?>">
            <?php echo e(Form::label('body', 'Body')); ?>

            <?php echo e(Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor', 'required'])); ?>

            <?php if($errors->has('body')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('body')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <?php echo e(Form::label('is_published', 'Is Published ')); ?>            
            <?php echo e(Form::checkbox('is_published', 'Is Published', true)); ?>

        </div>

        <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>