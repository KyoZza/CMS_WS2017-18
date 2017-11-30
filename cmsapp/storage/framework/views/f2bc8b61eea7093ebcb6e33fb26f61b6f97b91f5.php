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
    <link href="/vendor/itsjavi/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css" rel="stylesheet">
    <?php echo $__env->make('inc.style-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php if(!$customizeIsCollapsed): ?>
        <?php echo $__env->make('inc.'.$theme.'.style', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <?php endif; ?>
</head>
<body>
    <div id="app">
        <?php echo $__env->make('inc.navbar-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('inc.header-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('inc.breadcrumb-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="section">
            <div class="container">
                <?php echo $__env->make('inc.general.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
                <div class="row">
                    <div class="col-md-3">
                        <?php echo $__env->make('inc.menu-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="col-md-9">
                        <?php echo $__env->yieldContent('content'); ?>                  
                    </div>               
                </div>
            </div>
        </div>

        <?php echo $__env->make('inc.footer-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
    <?php echo $__env->make('inc.general.ckeditor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('inc.color-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <script>
        function onHeaderTitleChange(event) {
            const value = $(".header-form #title").val();
            
            $("#header-title").text(value);
        }

        function onHeaderSubTitleChange(event) {
            const value = $(".header-form #subtitle").val();
         
            $("#header-subtitle").text(value);
        }

        function onHeaderImageChange(event, element) {
            const src = element.firstElementChild.src;
            document.getElementById('showcase').style.backgroundImage = `url(${src})`;

            const image = src.replace('http://cmsapp.dev/storage/header_images/', '');
            document.getElementById('header_img').value = image;            
        }
    </script>
</body>
</html>
