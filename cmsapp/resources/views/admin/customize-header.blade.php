@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{$breadcrumbs[1]->name}}</h3>
        </div>
        <div class="panel-body">

            <div class="{{$theme}}  customize-frontend">           
                @include('inc.'.$theme.'.header')
            </div>
            
            <br><br>

            {!! Form::open(['action' => ['AdminController@customizeHeaderUpdate'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'header-form']) !!}
                <div class="form-group">
                    {{Form::label('title', 'Title')}}
                    {{Form::text('title', $header->title, ['class' => 'form-control', 'placeholder' => 'Title', 'onkeyup'=> 'onHeaderTitleChange(event);'])}}
                </div>
                <div class="form-group">
                    {{Form::label('subtitle', 'Subtitle')}}
                    {{Form::text('subtitle', $header->subtitle, ['class' => 'form-control', 'placeholder' => 'Subtitle', 'onkeyup'=> 'onHeaderSubTitleChange(event);'])}}
                </div>
                <!--<div class="form-group">
                    {{Form::file('header_img')}}
                </div>-->
                <div class="form-group">
                    {{Form::label('header_image', 'Header Images')}}
                    
                    <div class="row">
                        @foreach($headerImages as $image)
                            <div class="col-xs-6 col-md-3">
                                <a class="thumbnail" onclick="onHeaderImageChange(event, this);">
                                    <img src="/storage/header_images/{{$image->name}}" alt="{{$image->name}}" class="header-image-thumbnail">
                                </a>
                            </div>                
                        @endforeach
                    </div>

                    {{Form::text('header_img', '', ['class' => 'form-control', 'id' => 'header_img', 'style' => 'display: none' ])}}                    
                </div>

                {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}

        </div>
    </div>


    
@endsection