@extends('layouts.theme1-home')

@section('content')
    <h1>{{$page->title}}</h1>

    {!! $page->body !!}
@endsection