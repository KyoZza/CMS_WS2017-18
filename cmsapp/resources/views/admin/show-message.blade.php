@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">Message</div>

            <div class="panel-body">

                <div class="row">
                    <div class="col-md-3 col-sm-3"><strong>Name:</strong></div>
                    <div class="col-md-9 col-sm-9">{{$message->name}}</div>            
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3"><strong>Email:</strong></div>
                    <div class="col-md-9 col-sm-9">{{$message->email}}</div>            
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3"><strong>Date Received:</strong></div>
                    <div class="col-md-9 col-sm-9">{{$message->created_at}}</div>            
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3"><strong>Subject:</strong></div>
                    <div class="col-md-9 col-sm-9">{{$message->subject}}</div>            
                </div>
                
                <div><strong>Message:</strong></div>
                <div>{{$message->message}}</div>

                <br><br>
                {!! Form::open(['action' => 'AdminController@replyMessage', 'method' => 'POST']) !!}
                    <div class="form-group{{ $errors->has('reply') ? ' has-error' : '' }}">
                        {{Form::label('reply', 'Reply')}}
                        {{Form::textarea('reply', '', ['class' => 'form-control', 'required'])}}
                        @if ($errors->has('bodyde'))
                            <span class="help-block">
                                <strong>{{ $errors->first('reply') }}</strong>
                            </span>
                        @endif
                    </div>
                    

                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection