@extends('layouts.backend')

@section('content')

    <h1>Edit User</h1>
    {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST']) !!}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $user->name, ['class' => 'form-control', 'required'])}}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {{Form::label('email', 'Email')}}
            {{Form::email('email', $user->email, ['class' => 'form-control'])}}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', ['class' => 'form-control'])}}
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{Form::label('password-confirm', 'Confirm Password')}}
            {{Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection