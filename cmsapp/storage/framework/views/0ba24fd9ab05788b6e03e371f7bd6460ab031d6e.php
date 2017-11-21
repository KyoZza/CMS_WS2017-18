<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
        <h3 class="panel-title">Page Details</h3>
    </div>
    <div class="panel-body">
        <?php if($page->is_published): ?>
            <a href="<?php echo e($page->url); ?>" class="btn btn-default">View on Website</a>
            <br><br>
        <?php endif; ?>
        
        <div class="row">
            <div class="col-md-8 col-sm-8"><label>Title</label></div>
            <div class="col-md-4 col-sm-4"><label>Is Published</label></div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-8"><?php echo e($page->title); ?></div>
            <div class="col-md-4 col-sm-4"><strong>
                <i class="fa fa-<?php echo e($page->is_published ? 'check' : 'times'); ?>" aria-hidden="true"></i>
            </strong></div>        
        </div>
        <div class="row">
        	<br>
            <div class="col-md-12 col-sm-12"><label>Body</label></div>          
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12"><p><?php echo $page->body; ?></p></div>        
        </div>
        
    </div>
</div>


<?php if(Auth::user()->hasAnyRole(['Website Manager', 'Super Saiyajin'])): ?>
    <a href="/admin/pages/<?php echo e($page->id); ?>/edit" class="btn btn-default">Edit</a>
    <?php if($page->url != '/'): ?>
        <?php echo Form::open(['action' => ['PagesController@destroy', $page->id], 'method' => 'POST', 'class' => 'pull-right']); ?>

            <?php echo e(Form::hidden('_method', 'DELETE')); ?> <!-- To spoof a DELETE request instead of POST -->
            <?php echo e(Form::submit('Delete', ['class' => 'btn btn-danger'])); ?>

        <?php echo Form::close(); ?> 
    <?php endif; ?>
<?php endif; ?> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>