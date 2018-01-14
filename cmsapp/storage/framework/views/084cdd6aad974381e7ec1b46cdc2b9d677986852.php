<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-9 col-sm-9"><h1>Blog</h1></div>
        <div class="col-md-3 col-sm-3"><a href="/blog/create" class="btn btn-default  pull-right"><?php echo e($language === 'de' ? 'Post erstellen' : 'Create Post'); ?></a></div>
    </div>
        

    <?php if(count($posts) > 0): ?>
        <ul class="blog-list">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="well">
                    <div class="row">
                        <?php if($post->cover_img === 'noimage.jpg'): ?>
                        <div class="col-xs-12">
                        <?php else: ?>
                        <div class="col-md-4 col-sm-4">
                            <img src="/storage/cover_images/<?php echo e($post->cover_img); ?>" class="object-fit-cover">
                        </div>
                        <div class="col-md-8 col-sm-8">
                        <?php endif; ?>             
                            <h3><a href="/blog/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a></h3>
                            <small><?php echo e($post->created_at); ?>, <?php echo e($language === 'de' ? 'von' : 'by'); ?> <?php echo e($post->user->name); ?></small>
                            <hr>
                            <small>
                                <?php if(strlen($post->body) > 200): ?>
                                    <?php echo trim(substr(preg_replace('/(<p>&nbsp;<\/p>)|(<p><img)..*(\/><\/p>)/m', '', $post->body), 0, 200)).'... <a href="/blog/'.$post->id.'">'.($language === 'de' ? 'Lese weiter' : 'Read more').'</a>'; ?>

                                <?php else: ?>
                                    <?php echo trim(preg_replace('/(<p>&nbsp;<\/p>)|(<p><img)..*(\/><\/p>)/m', '', $post->body)); ?>

                                <?php endif; ?>
                            </small>
                        </div>
                    </div>
                    
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($posts->links()); ?>

        </ul>
    <?php else: ?>
        <p>No Posts found</p>    
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.'.$theme, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>