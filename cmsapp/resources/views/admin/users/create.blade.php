@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">Create User</div>

        <div class="panel-body">
            {!! Form::open(['action' => 'UserController@store', 'method' => 'POST']) !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{Form::label('name', 'Name')}}
                    {{Form::text('name', '', ['class' => 'form-control', 'required'])}}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {{Form::label('email', 'Email')}}
                    {{Form::email('email', '', ['class' => 'form-control'])}}
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
                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                    {{Form::label('role', 'Role')}}
                    {{Form::select('role', $roles, null, ['class' => 'form-control', 'required'])}}
                    @if ($errors->has('role'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif
                </div>
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection