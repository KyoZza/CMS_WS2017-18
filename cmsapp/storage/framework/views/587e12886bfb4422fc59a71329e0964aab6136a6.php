<header id="showcase">
    <div class="well">
        <h1 id="header-title"><?php echo e($header->title); ?></h1>
        <i><h3 id="header-subtitle"><?php echo e($header->subtitle); ?></h3></i>
    </div>
    <div id="nav">
        <?php echo $__env->make('inc.theme1.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</header>