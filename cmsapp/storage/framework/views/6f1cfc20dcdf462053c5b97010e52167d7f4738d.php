<?php $__env->startSection('content'); ?>
    <h1>Create Post</h1>    <!-- 'enctype' => 'multipart/form-data' whenever a file get's submitted-->
    <?php echo Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

        <div class="form-group">
            <?php echo e(Form::label('title', 'Title')); ?>

            <?php echo e(Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('body', 'Body')); ?>

            <?php echo e(Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor'])); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::file('cover_img')); ?>

        </div>
        <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>



<!-- work on bootstrap file button
<label class="btn btn-default btn-file">
    Browse... <?php echo e(Form::file('cover_img', ['style' => 'display: none'])); ?>

</label>
-- >
<?php echo $__env->make('layouts.theme1-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>