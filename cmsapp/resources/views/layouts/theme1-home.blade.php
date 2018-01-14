<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="theme1">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @include('inc.theme1.style')
    </head>
    <body>
        <div id="app">
            @include('inc.theme1.header')
            <div class="main-content container body-fontSize">
                @include('inc.general.messages')
                @yield('content')                  
            </div>
            @include('inc.theme1.footer')

        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        @include('inc.theme1.script')
        @include('inc.general.ckeditor')
        <!--language local storage-->
        <script>

        

        </script>

    </body>
</html>
