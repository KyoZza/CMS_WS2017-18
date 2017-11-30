@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{$breadcrumbs[1]->name}}</h3>
        </div>
        <div class="panel-body">
            
            <div class="{{$theme}}-customize-navbar customize-frontend">           
                @include('inc.'.$theme.'.navbar')
            </div>

            <br><br>

            {!! Form::open(['action' => ['AdminController@customizeHeaderUpdate'], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'header-form']) !!}
                <div class="form-group">
                    {{Form::label('navbar-color', 'Navbar Color')}}
                    {{Form::text('navbar-color', '', ['class' => 'form-control', 'placeholder' => '', 'onkeyup'=> 'onNavbarColorChange(event);'])}}
                </div>
                <div class="form-group">
                    {{Form::label('font-color', 'Font-Color')}}
                    {{Form::text('font-color', '', ['class' => 'form-control', 'placeholder' => '', 'onkeyup'=> 'onNavbarFontColorChange(event);'])}}
                </div>
                <div class="form-group">
                    {{Form::label('hover-color', 'Font-Color')}}
                    {{Form::text('hover-color', '', ['class' => 'form-control', 'placeholder' => '', 'onkeyup'=> 'onNavbarHoverColorChange(event);'])}}
                </div>

                {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection