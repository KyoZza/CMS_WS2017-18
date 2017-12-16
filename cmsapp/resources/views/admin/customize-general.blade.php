@extends('layouts.backend')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">{{$breadcrumbs[1]->name}}</h3>
        </div>
        <div class="panel-body">
            

            {!! Form::open(['action' => ['AdminController@customizeGeneralUpdate'], 'method' => 'POST', 'class' => 'general-form']) !!}

                <div class="form-group">
                    {{Form::label('themecolor', 'Theme Color')}}
                    
                    <div class="row">
                        @foreach($themeColors as $themeColor)
                            <div class="col-xs-2 col-md-1">
                                <a class="thumbnail" onclick="onThemeColorChange(event, {{$themeColor->id}});">
                                    <img    src="/storage/general_images/transparent.png" alt="{{$themeColor->standard}}"
                                            class="general-color-thumbnail" style="background-color: {{$themeColor->standard}}">
                                </a>
                            </div>                
                        @endforeach
                    </div>

                    {{Form::text('theme_color', '', ['class' => 'form-control', 'id' => 'theme_color', 'style' => 'display: none' ])}}                    
                </div>

                <!-- Gogo Nils!
                     eventuell mit vorgebenen fonts aus der DB füllen -->
                <div class="form-group">                
                    {{Form::label('font_family', 'Font')}}
                    <select class="form-control" name="font_family">
                    @foreach($fonts as $font)
                        <option value="{{$font->id}}">{{$font->name}}</option>   
                    @endforeach
                    </select>
                </div>

                <!-- Font Size eventuell auch als select feld -->
                <div class="form-group">
                    {{Form::label('font_size', 'Font Size')}}
                    {{Form::text('title', ''/*später wert aus db*/, ['class' => 'form-control', 'placeholder' => '12', 'onkeyup'=> 'onHeaderTitleChange(event);'])}}
                </div>

                <!-- Eventuell noch mehr allgemeine Optionen 
                     alle Optionen außer ThemeColor in eine müssen in einer DB-Tabelle
                     vorhanden sein. DB-Name zB "GeneralOptions". Für die Tabelle eine 
                     migration Datei anlegen (php artisan make:model GeneralOption -m)
                     und dort die Spalten definieren. (database/migration/...) -->


                {{Form::hidden('_method', 'PUT')}} <!-- To spoof a PUT request instead of POST -->
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}

        </div>
    </div>
@endsection