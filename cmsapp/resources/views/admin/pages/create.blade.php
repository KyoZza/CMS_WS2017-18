@extends('layouts.backend')

@section('content')
    <h1>Create Page</h1>    <!-- 'enctype' => 'multipart/form-data' whenever a file get's submitted-->
    {!! Form::open(['action' => 'PagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        
                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            {{Form::label('url', 'Url')}}
            {{Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
            @if ($errors->has('url'))
                <span class="help-block">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {{Form::label('title', 'English Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>





        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
            {{Form::label('body', 'English Text')}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor-body', 'required'])}}
            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>
        


        <div class="form-group{{ $errors->has('titlede') ? ' has-error' : '' }}">
            {{Form::label('titlede', 'Deutsch Titel')}}
            {{Form::text('titlede', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
            @if ($errors->has('titlede'))
                <span class="help-block">
                    <strong>{{ $errors->first('titlede') }}</strong>
                </span>
            @endif
        </div>

        
                <div class="form-group{{ $errors->has('bodyde') ? ' has-error' : '' }}">
            {{Form::label('bodyde', 'Deutsch Text')}}
            {{Form::textarea('bodyde', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor-bodyde', 'required'])}}
            @if ($errors->has('bodyde'))
                <span class="help-block">
                    <strong>{{ $errors->first('bodyde') }}</strong>
                </span>
            @endif
        </div>



        <div class="form-group">
            {{Form::label('is_published', 'Is Published ')}}            
            {{Form::checkbox('is_published', 'Is Published', true)}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection