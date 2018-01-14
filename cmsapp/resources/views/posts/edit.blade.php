@extends('layouts.'.$theme)

@section('content')
    <h1>{{$language === 'de' ? 'Post ändern' : 'Edit Post'}}</h1>
    @include('inc.posts.edit-onpage')
@endsection