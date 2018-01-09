<h1>Edit Post</h1>
{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor-body'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_img')}}
    </div>
    {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}