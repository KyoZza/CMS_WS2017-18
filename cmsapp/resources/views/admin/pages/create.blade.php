@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{$breadcrumbs[1]->name}}</h3>
        </div>
        <div class="panel-body">
            <!-- 'enctype' => 'multipart/form-data' whenever a file get's submitted-->
            {!! Form::open(['action' => 'PagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'page-form']) !!}
            
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {{Form::label('title', 'English Title')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required', 'onkeyup'=> 'onPageTitleChange(event);'])}}
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group{{ $errors->has('titlede') ? ' has-error' : '' }}">
                        {{Form::label('titlede', 'German Title')}}
                        {{Form::text('titlede', '', ['class' => 'form-control', 'placeholder' => 'Title', 'required'])}}
                        @if ($errors->has('titlede'))
                            <span class="help-block">
                                <strong>{{ $errors->first('titlede') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                {{Form::label('url', 'Url')}}
                {{Form::text('url', '', ['class' => 'form-control', 'placeholder' => 'Url', 'required'])}}
                @if ($errors->has('url'))
                    <span class="help-block">
                        <strong>{{ $errors->first('url') }}</strong>
                    </span>
                @endif
            </div>
            




            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                {{Form::label('body', 'English Body')}}
                {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor-body', 'required'])}}
                @if ($errors->has('body'))
                    <span class="help-block">
                        <strong>{{ $errors->first('body') }}</strong>
                    </span>
                @endif
            </div>     

            
            <div class="form-group{{ $errors->has('bodyde') ? ' has-error' : '' }}">
                {{Form::label('bodyde', 'German Body')}}
                {{Form::textarea('bodyde', '', ['class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'article-ckeditor-bodyde', 'required'])}}
                @if ($errors->has('bodyde'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bodyde') }}</strong>
                    </span>
                @endif
            </div>



            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {{Form::label('is_published', 'Is Published ')}}            
                        {{Form::checkbox('is_published', 'Is Published', true)}}
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {{Form::label('has_navitem', 'Automatically create navbar link? ')}}            
                        {{Form::checkbox('has_navitem', 'Automatically create navbar link? ', true)}}
                    </div>
                </div>
            </div>
            

            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
        </div>
    </div>  
    
@endsection