@extends('layouts.'.$theme)

@section('content')
    <div class="blog-post">
        <div class="well">
            <div class="row">
                <div class="col-md-9 col-sm-9"><h1>{{$post->title}}</h1></div>
                <div class="col-md-3 col-sm-3"><a href="/blog" class="btn btn-default pull-right">Go Back</a></div>
            </div>
            
            <p>Written on {{$post->created_at}} by {{$post->user->name}}</p>
            <hr>

            @if($post->cover_img != 'noimage.jpg')
                <img src="/storage/cover_images/{{$post->cover_img}}" class="object-fit-cover-show-page">
                <br><br>    
            @endif
            
            <div>
                <p>{!!$post->body!!}</p>       <!-- !! to parse html -->
            </div>
            <hr>

            @if(!Auth::guest())
                @if(Auth::user()->id == $post->user_id || Auth::user()->hasRole('Super Saiyajin'))
                    <a href="/blog/{{$post->id}}/edit" class="btn btn-default">Edit</a>
                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}} <!-- To spoof a DELETE request instead of POST -->
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close() !!} 
                @endif     
            @endif
        </div>
    </div>
@endsection