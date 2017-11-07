@extends('layouts.backend')

@section('content')
    <h1>Create Page</h1>    <!-- 'enctype' => 'multipart/form-data' whenever a file get's submitted-->
    {!! Form::open(['action' => 'PagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            {{Form::label('url', 'Url')}}
            {{Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
            @if ($errors->has('url'))
                <span class="help-block">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor', 'required'])}}
            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
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