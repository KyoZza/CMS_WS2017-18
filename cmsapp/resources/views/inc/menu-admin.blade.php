<div class="list-group">
    <a href="/admin" class="list-group-item {{$activeListGroupItem == 'dashboard' ? 'active main-color-bg' : ''}}">
        <i class="fa fa-pagelines" aria-hidden="true"></i>Dashboard</a>
    <a href="/admin/posts" class="list-group-item {{$activeListGroupItem == 'posts' ? 'active main-color-bg' : ''}}">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Posts</a>
    <a href="/admin/pages" class="list-group-item {{$activeListGroupItem == 'pages' ? 'active main-color-bg' : ''}}">
        <i class="fa fa-leanpub" aria-hidden="true"></i>Pages</a>
    


    @if($customizeIsCollapsed)
    <a data-toggle="collapse" data-target="#customize-content" class="list-group-item">
        <i class="fa fa-paint-brush" aria-hidden="true"></i>Customize <span class="caret"></span>     
    </a>
    <div id="customize-content" class="collapse">
    @else
    <a data-toggle="collapse" data-target="#customize-content" class="list-group-item" aria-expanded="true">
        <i class="fa fa-paint-brush" aria-hidden="true"></i>Customize <span class="caret"></span>     
    </a>
    <div id="customize-content" class="collapse in" aria-expanded="true">
    @endif
    
        <div class="customize-content-item"><a href="#" class="list-group-item {{$activeListGroupItem == 'general' ? 'active main-color-bg' : ''}}">
            General</a></div>
        <div class="customize-content-item"><a href="/admin/customize/navbar" class="list-group-item {{$activeListGroupItem == 'navbar' ? 'active main-color-bg' : ''}}">
            Navbar</a></div>
        <div class="customize-content-item"><a href="#" class="list-group-item {{$activeListGroupItem == 'header' ? 'active main-color-bg' : ''}}">
            Header</a></div>
        <div class="customize-content-item"><a href="#" class="list-group-item {{$activeListGroupItem == 'footer' ? 'active main-color-bg' : ''}}">
            Footer</a></div>   
    </div> 


    <a href="/admin/users" class="list-group-item {{$activeListGroupItem == 'users' ? 'active main-color-bg' : ''}}">
        <i class="fa fa-user-circle" aria-hidden="true"></i>Users</a>
    <a href="#" class="list-group-item {{$activeListGroupItem == 'etc' ? 'active main-color-bg' : ''}}">
        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>And so on....</a>
</div>