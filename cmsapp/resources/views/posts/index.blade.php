@extends('layouts.'.$theme)

@section('content')
    <h1>Blog</h1>
    @if(count($posts) > 0)
        <ul class="blog-list">
            @foreach($posts as $post)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img src="/storage/cover_images/{{$post->cover_img}}" class="object-fit-cover">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3><a href="/blog/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>{{$post->created_at}}, by {{$post->user->name}}</small>
                            <hr>
                            <small>
                                @if(strlen($post->body) > 200)
                                    {!! substr($post->body, 0, 200).'... <a href="/blog/'.$post->id.'">Read more</a>' !!}
                                @else
                                    {!!$post->body!!}
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