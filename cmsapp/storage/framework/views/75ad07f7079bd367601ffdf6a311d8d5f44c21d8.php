<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" class="theme1">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Styles -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

        <?php echo $__env->make('inc.theme1.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>
    <body>
        <div id="app">
            <?php echo $__env->make('inc.theme1.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="main-content container body-fontSize">
                <?php echo $__env->make('inc.general.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>                  
            </div>
            <?php echo $__env->make('inc.theme1.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <?php echo $__env->make('inc.theme1.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('inc.general.ckeditor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--language local storage-->
        <script>

        

        </script>

    </body>
</html>
