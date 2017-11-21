<h1>Edit Post</h1>
<?php echo Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

    <div class="form-group">
        <?php echo e(Form::label('title', 'Title')); ?>

        <?php echo e(Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::label('body', 'Body')); ?>

        <?php echo e(Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor'])); ?>

    </div>
    <div class="form-group">
        <?php echo e(Form::file('cover_img')); ?>

    </div>
    <?php echo e(Form::hidden('_method', 'PUT')); ?> <!-- To spoof a PUT request instead of POST -->
    <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>

<?php echo Form::close(); ?>