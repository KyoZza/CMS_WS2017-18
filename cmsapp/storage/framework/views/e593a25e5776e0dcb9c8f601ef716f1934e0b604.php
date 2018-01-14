<nav class="admin navbar navbar-inverse main-color-bg">
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
            <a class="navbar-brand" href="<?php echo e(url('/admin')); ?>">
                <?php echo e(config('app.name', 'Laravel')); ?>

            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="/">View Website</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                    <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                <?php else: ?>
                    <li>
                        <a href="#" id="page-color">Page Color</a>
              
                        <?php echo Form::open(['action' => ['AdminController@setPageColor', str_replace('/', '.', Request::path())], 'method' => 'POST']); ?>

                            <div class="form-group" style="display: none">
                                <?php echo e(Form::text('color', '', ['id' => 'nav-color-picker-value'])); ?>

                                <?php echo e(Form::hidden('_method', 'PUT')); ?> <!-- To spoof a PUT request instead of POST -->
                                <?php echo e(Form::submit('Submit', ['id' => 'nav-color-picker-submit'])); ?>

                            </div>
                        <?php echo Form::close(); ?>

                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle main-color-bg" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <img src="<?php echo e(Auth::user()->avatar === null ? '/storage/general_images/transparent.png' : '/storage/user_images/'.Auth::user()->avatar); ?>" 
                                width="26px" style="border: 1px solid #ddd; margin-right: 4px">
                            Yo, <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="users/<?php echo e(Auth::user()->id); ?>">
                                    Profile
                                </a>

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