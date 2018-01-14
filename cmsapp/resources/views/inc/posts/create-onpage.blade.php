<!-- 'enctype' => 'multipart/form-data' whenever a file get's submitted-->
{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', $language === 'de' ? 'Titel' : 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('title-image', $language === 'de' ? 'Titelbild' : 'Title Image')}}   
        {{Form::file('cover_img')}}
    </div>
    <div class="form-group">
        {{Form::label('body', $language === 'de' ? 'Text' : 'Body')}}
        {{Form::textarea('body', '', ['class' => 'form-control', 'id' => 'article-ckeditor-body'])}}
    </div>
    
    {{Form::submit($language === 'de' ? 'Erstellen' : 'Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}