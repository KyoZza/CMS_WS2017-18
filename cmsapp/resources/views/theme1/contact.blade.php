@extends('layouts.theme1-main')

@section('content')
    <h1>{{$language === 'de' ? 'Kontaktieren' : 'Contact'}}</h1>

   {!! Form::open(['url' => 'contact/submit']) !!}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control'])}}
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {{Form::label('email', 'E-Mail '.($language === 'de' ? 'Adresse' : 'address'))}}
            {{Form::text('email', '', ['class' => 'form-control'])}}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
            {{Form::label('subject', $language === 'de' ? 'Betreff' : 'Subject')}}
            {{Form::text('subject', '', ['class' => 'form-control'])}}
            @if ($errors->has('subject'))
                <span class="help-block">
                    <strong>{{ $errors->first('subject') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
            {{Form::label('message', $language === 'de' ? 'Nachricht' : 'Message')}}
            {{Form::textarea('message', '', ['class' => 'form-control'])}}
            @if ($errors->has('message'))
                <span class="help-block">
                    <strong>{{ $errors->first('message') }}</strong>
                </span>
            @endif
        </div>
    {{Form::submit($language === 'de' ? 'Absenden' : 'Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection