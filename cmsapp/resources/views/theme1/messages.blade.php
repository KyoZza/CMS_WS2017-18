@extends('layouts.theme1-main')

@section('content')
<h1>Messages</h1>


@if(count(Messages)> 0)

    @foreach($messages as $messages)
        <ul class = "list-group">
            <li class = "list-group-item">Name: {{$message->name}}</li>
            <li class = "list-group-item">Email: {{$message->email}}</li>
            <li class = "list-group-item">Message: {{$message->message}}</li>
        </ul>
    @endforeach

@endif




@endsection