@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{$breadcrumbs[1]->name}}</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(['action' => 'AdminController@customizeFooterUpdate', 'method' => 'POST']) !!}

                <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                    {{Form::label('about', 'About English')}}
                    {{Form::textarea('about', preg_replace('/(<br\/>)|(<br \/>)/m', "", $footer->about_en), ['class' => 'form-control', 'required'])}}
                    @if ($errors->has('about'))
                        <span class="help-block">
                            <strong>{{ $errors->first('about') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('aboutde') ? ' has-error' : '' }}">
                    {{Form::label('aboutde', 'About German')}}
                    {{Form::textarea('aboutde', preg_replace('/(<br\/>)|(<br \/>)/m', "", $footer->about_de), ['class' => 'form-control', 'required'])}}
                    @if ($errors->has('aboutde'))
                        <span class="help-block">
                            <strong>{{ $errors->first('aboutde') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    {{Form::label('address', 'Address English')}}
                    {{Form::textarea('address', preg_replace('/(<br\/>)|(<br \/>)/m', "", $footer->address_en), ['class' => 'form-control', 'required'])}}
                    @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('addressde') ? ' has-error' : '' }}">
                    {{Form::label('addressde', 'Address German')}}
                    {{Form::textarea('addressde', preg_replace('/(<br\/>)|(<br \/>)/m', "", $footer->address_de), ['class' => 'form-control', 'required'])}}
                    @if ($errors->has('addressde'))
                        <span class="help-block">
                            <strong>{{ $errors->first('addressde') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                    {{Form::label('facebook', 'Facebook')}}
                    {{Form::text('facebook', $footer->facebook, ['class' => 'form-control', 'required'])}}
                    @if ($errors->has('facebook'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebook') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                    {{Form::label('twitter', 'Twitter')}}
                    {{Form::text('twitter', $footer->twitter, ['class' => 'form-control', 'required'])}}
                    @if ($errors->has('twitter'))
                        <span class="help-block">
                            <strong>{{ $errors->first('twitter') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
                    {{Form::label('youtube', 'Youtube')}}
                    {{Form::text('youtube', $footer->youtube, ['class' => 'form-control', 'required'])}}
                    @if ($errors->has('youtube'))
                        <span class="help-block">
                            <strong>{{ $errors->first('youtube') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('linkedin') ? ' has-error' : '' }}">
                    {{Form::label('linkedin', 'LinkedIn')}}
                    {{Form::text('linkedin', $footer->linkedin, ['class' => 'form-control', 'required'])}}
                    @if ($errors->has('linkedin'))
                        <span class="help-block">
                            <strong>{{ $errors->first('linkedin') }}</strong>
                        </span>
                    @endif
                </div>

                {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection