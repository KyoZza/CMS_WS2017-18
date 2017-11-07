@extends('layouts.theme1-main')

@section('content')
    <h1>{{$page->title}}</h1>

    {!! $page->body !!}
@endsection