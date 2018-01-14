@extends('layouts.'.$theme)

@section('content')
    <h1>{{$language === 'de' ? 'Post erstellen' : 'Create Post'}}</h1>    
    @include('inc.posts.create-onpage')
@endsection



<!-- work on bootstrap file button
<label class="btn btn-default btn-file">
    Browse... {{Form::file('cover_img', ['style' => 'display: none'])}}
</label>
-->