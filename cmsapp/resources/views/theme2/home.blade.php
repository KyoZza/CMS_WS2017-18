@extends('layouts.theme2')

@section('content')
    <h1>{{$page->title}}</h1>

    {!! $page->body !!}
@endsection