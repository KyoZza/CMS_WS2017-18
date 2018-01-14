@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">Messages</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

           @if(count($messages) > 0)
                @foreach($messages as $message)
                    <div class = "list-group">                   
                        <a href="messages/{{$message->id}}" class = "list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>From: </strong>{{$message->name}}
                                </div>
                                <div class="col-md-4">
                                    <strong>Subject: </strong>{{$message->name}}                                    
                                </div>
                                <div class="col-md-4">
                                    <strong>Date: </strong>{{$message->created_at}}                                    
                                </div>
                            </div> 
                        </a>
                    </div>
                @endforeach
            @else
                <p>You have no Messages yet.</p>
            @endif   
        </div>
    </div>
@endsection