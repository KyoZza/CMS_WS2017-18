<?php $__env->startSection('content'); ?>
    <div class="blog-post">
        <div class="well">
            <div class="row">
                <div class="col-md-9 col-sm-9"><h1><?php echo e($post->title); ?></h1></div>
                <div class="col-md-3 col-sm-3"><a href="/blog" class="btn btn-default pull-right"><?php echo e($language === 'de' ? 'Zurück' : 'Go Back'); ?></a></div>
            </div>
            
            <p><?php echo e($language === 'de' ? 'Verfasst am' : 'Written on'); ?> <?php echo e($post->created_at); ?> <?php echo e($language === 'de' ? 'von' : 'by'); ?> <?php echo e($post->user->name); ?></p>
            <hr>

            <?php if($post->cover_img != 'noimage.jpg'): ?>
                <img src="/storage/cover_images/<?php echo e($post->cover_img); ?>" class="object-fit-cover-show-page">
                <br><br>    
            <?php endif; ?>
            
            <div>
                <p><?php echo $post->body; ?></p>       <!-- !! to parse html -->
            </div>
            <hr>

            <?php if(!Auth::guest()): ?>
                <?php if(Auth::user()->id == $post->user_id || Auth::user()->hasRole('Super Saiyajin')): ?>
                    <a href="/blog/<?php echo e($post->id); ?>/edit" class="btn btn-default"><?php echo e($language === 'de' ? 'Bearbeiten' : 'Edit'); ?></a>
                    <?php echo Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']); ?>

                        <?php echo e(Form::hidden('_method', 'DELETE')); ?> <!-- To spoof a DELETE request instead of POST -->
                        <?php echo e(Form::submit($language === 'de' ? 'Löschen' : 'Delete', ['class' => 'btn btn-danger'])); ?>

                    <?php echo Form::close(); ?> 
                <?php endif; ?>     
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.'.$theme, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>