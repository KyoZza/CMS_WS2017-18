<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">Your Posts</div>

        <div class="panel-body">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <a href="/admin/posts/create" class="btn btn-default">Create Post</a>
            <br><br>
            
            <?php if(count($posts) > 0): ?>
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th></th>
                    </tr>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="/blog/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a>
                            </td>
                            <td>
                                <div class="pull-right">
                                    <a href="/admin/posts/<?php echo e($post->id); ?>/edit" class="btn btn-xs btn-default">Edit</a> 
                                    <?php echo Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'style' => 'display: inline-block']); ?>

                                        <?php echo e(Form::hidden('_method', 'DELETE')); ?> <!-- To spoof a DELETE request instead of POST -->
                                        <?php echo e(Form::submit('Delete', ['class' => 'btn btn-xs btn-danger'])); ?>

                                    <?php echo Form::close(); ?> 
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php else: ?>
                <p>You have no posts yet.</p>
            <?php endif; ?>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>