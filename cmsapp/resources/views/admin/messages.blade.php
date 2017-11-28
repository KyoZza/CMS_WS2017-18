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
                    <ul class = "list-group">
                        <li class = "list-group-item">Name: {{$message->name}}</li>
                        <li class = "list-group-item">Email: {{$message->email}}</li>
                        <li class = "list-group-item">Message: {{$message->message}}</li>
                    </ul>
                @endforeach
            @else
                <p>You have no Messages yet.</p>
            @endif   
        </div>
    </div>
@endsection