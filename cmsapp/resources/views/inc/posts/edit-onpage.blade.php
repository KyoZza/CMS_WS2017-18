{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', $language === 'de' ? 'Titel' : 'Title')}}
        {{Form::text('title', $post->title, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title-image', $language === 'de' ? 'Titelbild' : 'Title Image')}}   
        {{Form::file('cover_img')}}
    </div>
    <div class="form-group">
        {{Form::label('body', $language === 'de' ? 'Text' : 'Body')}}
        {{Form::textarea('body', $post->body, ['class' => 'form-control', 'id' => 'article-ckeditor-body'])}}
    </div>

    {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
    {{Form::submit($language === 'de' ? 'Bestätigen' : 'Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}