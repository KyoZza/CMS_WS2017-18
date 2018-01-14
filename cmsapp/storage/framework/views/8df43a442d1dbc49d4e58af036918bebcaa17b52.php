<!-- 'enctype' => 'multipart/form-data' whenever a file get's submitted-->
<?php echo Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

    <div class="form-group">
        <?php echo e(Form::label('title', 'Title')); ?>

        <?php echo e(Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('title-image', 'Title Image')); ?>   
        <?php echo e(Form::file('cover_img')); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('body', 'Body')); ?>

        <?php echo e(Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor-body'])); ?>

    </div>
    
    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

<?php echo Form::close(); ?>