<header id="showcase" class="showcase-slim">
    <div class="well">
        <h1>Welcome to CMSAPP!</h1>
        <i><h3>A content management system project created at OTHAW</h3></i>
    </div>
    <div id="nav">
        <?php echo $__env->make('inc.theme1.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</header>