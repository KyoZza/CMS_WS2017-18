@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">Your Posts</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <a href="/admin/posts/create" class="btn btn-default">Create Post</a>
            <br><br>
            
            @if(count($posts) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th></th>
                    </tr>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                <a href="/blog/{{$post->id}}">{{$post->title}}</a>
                            </td>
                            <td>
                                <div class="pull-right">
                                    <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-xs btn-default">Edit</a> 
                                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'style' => 'display: inline-block']) !!}
                                        {{Form::hidden('_method', 'DELETE')}} <!-- To spoof a DELETE request instead of POST -->
                                        {{Form::submit('Delete', ['class' => 'btn btn-xs btn-danger'])}}
                                    {!! Form::close() !!} 
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>You have no posts yet.</p>
            @endif
            
        </div>
    </div>
@endsection