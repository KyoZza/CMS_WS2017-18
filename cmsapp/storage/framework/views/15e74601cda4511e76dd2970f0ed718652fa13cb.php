<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <?php echo $__env->make('inc.navbar-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('inc.header-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <div class="section">
            <?php echo $__env->yieldContent('content'); ?>                  
        </div>

        <?php echo $__env->make('inc.footer-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
