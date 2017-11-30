<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @include('inc.theme2.style')
    </head>
    <body>
        <div id="app">
            @include('inc.theme2.header')
            <div class="main-content container">
                @yield('content')                  
            </div>

        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @include('inc.theme2.script')
        @include('inc.general.ckeditor')

    </body>
</html>
