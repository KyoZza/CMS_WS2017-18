@extends('layouts.'.$theme)

@section('content')
    <div class="row">
        <div class="col-md-9 col-sm-9"><h1>Blog</h1></div>
        <div class="col-md-3 col-sm-3"><a href="/blog/create" class="btn btn-default  pull-right">{{$language === 'de' ? 'Post erstellen' : 'Create Post'}}</a></div>
    </div>
        

    @if(count($posts) > 0)
        <ul class="blog-list">
            @foreach($posts as $post)
                <div class="well">
                    <div class="row">
                        @if ($post->cover_img === 'noimage.jpg')
                        <div class="col-xs-12">
                        @else
                        <div class="col-md-4 col-sm-4">
                            <img src="/storage/cover_images/{{$post->cover_img}}" class="object-fit-cover">
                        </div>
                        <div class="col-md-8 col-sm-8">
                        @endif             
                            <h3><a href="/blog/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>{{$post->created_at}}, {{$language === 'de' ? 'von' : 'by'}} {{$post->user->name}}</small>
                            <hr>
                            <small>
                                @if(strlen($post->body) > 200)
                                    {!! trim(substr(preg_replace('/(<p>&nbsp;<\/p>)|(<p><img)..*(\/><\/p>)/m', '', $post->body), 0, 200)).'... <a href="/blog/'.$post->id.'">'.($language === 'de' ? 'Lese weiter' : 'Read more').'</a>' !!}
                                @else
                                    {!! trim(preg_replace('/(<p>&nbsp;<\/p>)|(<p><img)..*(\/><\/p>)/m', '', $post->body)) !!}
                                @endif
                            </small>
                        </div>
                    </div>
                    
                </div>
            @endforeach
            {{$posts->links()}}
        </ul>
    @else
        <p>No Posts found</p>    
    @endif
@endsection