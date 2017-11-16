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
</head>
<body>
    <div id="app">
        @include('inc.admin.navbar-admin')
        @include('inc.admin.header-admin')
        @include('inc.admin.breadcrumb-admin')

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        @include('inc.admin.menu-admin')
                    </div>
                    <div class="col-md-9">
                        @yield('content')                  
                    </div>               
                </div>
            </div>
        </div>

        @include('inc.admin.footer-admin')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @include('inc.general.ckeditor')

</body>
</html>
