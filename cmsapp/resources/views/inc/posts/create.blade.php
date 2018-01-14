<!-- 'enctype' => 'multipart/form-data' whenever a file get's submitted-->
{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('title-image', 'Title Image')}}   
        {{Form::file('cover_img')}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor-body'])}}
    </div>
    
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}