<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    <?php if(auth::user()): ?>
                        <i class="fa fa-<?php echo e($icon); ?>" aria-hidden="true"></i>
                        <?php echo e($title); ?>

                    <?php else: ?>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Sign In
                    <?php endif; ?>
                    
                </h1>
            </div>
            <?php if(auth::user()): ?>
                <div class="col-md-2">
                <div class="dropdown create">
                    <button class="btn btn-default dropdown-toggle" type="button" id="createContent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Create Content
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="createContent">
                        <?php if(Auth::user()->hasAnyRole(['Website Manager', 'Super Saiyajin'])): ?>
                            <li><a href="/admin/pages/create">Create Page</a></li>
                        <?php endif; ?>
                        
                        <li><a href="/admin/posts/create">Create Post</a></li>
                        
                        <?php if(Auth::user()->hasRole('Super Saiyajin')): ?>
                            <li><a href="/admin/users/create">Create User</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>     
        </div>
    </div>
</header>