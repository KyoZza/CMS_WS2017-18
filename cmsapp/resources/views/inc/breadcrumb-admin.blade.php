<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/admin">Admin Area</a></li>        
            @foreach($breadcrumbs as $breadcrumb)
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                @switch($breadcrumb->name)
                    @case('Edit Post')
                        <li class="{{$breadcrumb->class}}"><a href="{{$breadcrumb->url}}{{$post->id}}/edit">{{$breadcrumb->name}}</a></li>                        
                        @break
                    @case('User')
                        <li class="{{$breadcrumb->class}}"><a href="{{$breadcrumb->url}}{{$user->id}}">{{$breadcrumb->name}}</a></li>                                                
                        @break
                    @case('Edit User')
                        <li class="{{$breadcrumb->class}}"><a href="{{$breadcrumb->url}}{{$user->id}}/edit">{{$breadcrumb->name}}</a></li>                                                
                        @break
                    @case('Page')
                        <li class="{{$breadcrumb->class}}"><a href="{{$breadcrumb->url}}{{$page->id}}">{{$breadcrumb->name}}</a></li>                                                
                        @break
                    @case('Edit Page')
                        <li class="{{$breadcrumb->class}}"><a href="{{$breadcrumb->url}}{{$page->id}}/edit">{{$breadcrumb->name}}</a></li>                                                
                        @break
                    @default
                        <li class="{{$breadcrumb->class}}"><a href="{{$breadcrumb->url}}">{{$breadcrumb->name}}</a></li>                     
                @endswitch
            @endforeach
        </ol>
    </div>
</section>