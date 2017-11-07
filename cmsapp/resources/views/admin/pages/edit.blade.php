@extends('layouts.backend')

@section('content')
    <h1>Update Page</h1>    <!-- 'enctype' => 'multipart/form-data' whenever a file get's submitted-->
    {!! Form::open(['action' => ['PagesController@update', $page->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $page->title, ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            {{Form::label('url', 'Url')}}
            {{Form::text('url', $page->url, ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
            @if ($errors->has('url'))
                <span class="help-block">
                    <strong>{{ $errors->first('url') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $page->body, ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor', 'required'])}}
            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            {{Form::label('is_published', 'Is Published ')}}            
            {{Form::checkbox('is_published', 'Is Published', $page->is_published)}}
        </div>

        {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection