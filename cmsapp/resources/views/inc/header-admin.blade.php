<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>
                    <i class="fa fa-{{$icon}}" aria-hidden="true"></i>
                     {{$title}}
                </h1>
            </div>
            @if(auth::user())
                <div class="col-md-2">
                <div class="dropdown create">
                    <button class="btn btn-default dropdown-toggle" type="button" id="createContent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Create Content
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="createContent">
                        @if(Auth::user()->hasAnyRole(['Website Manager', 'Super Saiyajin']))
                            <li><a href="/admin/pages/create">Create Page</a></li>
                        @endif
                        
                        <li><a href="/admin/posts/create">Create Post</a></li>
                        
                        @if(Auth::user()->hasRole('Super Saiyajin'))
                            <li><a href="/admin/users/create">Create User</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            @endif     
        </div>
    </div>
</header>