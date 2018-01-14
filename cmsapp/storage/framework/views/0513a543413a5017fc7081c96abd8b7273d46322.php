<nav class="navbar navbar-default navbar-static">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <?php echo e(config('app.name', 'Laravel')); ?>

            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url($navItem->link)); ?>"><?php echo e($navItem->title); ?></a></li>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                    <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                <?php else: ?>
                    <li id="nav-dropdown" class="dropup">
                        <img src="<?php echo e(Auth::user()->avatar === null ? '/storage/general_images/transparent.png' : '/storage/user_images/'.Auth::user()->avatar); ?>" 
                            width="38px" style="border: 1px solid #ddd; position: relative; bottom: 1px;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="display: inline-block">
                            Yo, <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo e(url('/blog/create')); ?>"><?php echo e($language === 'de' ? 'Post erstellen' : 'Create Post'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/admin')); ?>"><?php echo e($language === 'de' ? 'Nutzerbereich' : 'User Area'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>