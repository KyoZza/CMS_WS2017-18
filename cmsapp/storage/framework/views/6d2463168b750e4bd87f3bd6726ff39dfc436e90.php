<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('inc.general.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">Pages</div>

        <div class="panel-body">
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <?php if(Auth::user()->hasAnyRole(['Website Manager', 'Super Saiyajin'])): ?>
                <a href="/admin/pages/create" class="btn btn-default">Create Page</a>
                <br><br>
            <?php endif; ?>
            
            
            <?php if(count($pages) > 0): ?>
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Is Published</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="/admin/pages/<?php echo e($page->id); ?>"><?php echo e($page->title); ?></a>
                            </td>
                            <td>
                                <strong><i class="fa fa-<?php echo e($page->is_published ? 'check' : 'times'); ?>" aria-hidden="true"></i></strong>
                            </td>
                            <td>
                                <?php echo e($page->created_at); ?>

                            </td>
                            <td>
                                <?php if(Auth::user()->hasAnyRole(['Website Manager', 'Super Saiyajin'])): ?>
                                    <div class="pull-right">
                                    <a href="/admin/pages/<?php echo e($page->id); ?>/edit" class="btn btn-xs btn-default">Edit</a> 
                                    <?php if($page->url != '/'): ?>
                                        <?php echo Form::open(['action' => ['PagesController@destroy', $page->id], 'method' => 'POST', 'style' => 'display: inline-block']); ?>

                                            <?php echo e(Form::hidden('_method', 'DELETE')); ?> <!-- To spoof a DELETE request instead of POST -->
                                            <?php echo e(Form::submit('Delete', ['class' => 'btn btn-xs btn-danger'])); ?>

                                        <?php echo Form::close(); ?> 
                                    <?php endif; ?>     
                                </div>
                                <?php endif; ?>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php else: ?>
                <p>There are no pages yet.</p>
            <?php endif; ?>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>