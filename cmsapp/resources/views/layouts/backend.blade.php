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
    <link href="/vendor/itsjavi/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css" rel="stylesheet">
    @include('inc.style-admin')
    @if(!$customizeIsCollapsed)
        @include('inc.'.$theme.'.style') 
    @endif
</head>
<body>
    <div id="app">
        @include('inc.navbar-admin')
        @include('inc.header-admin')
        @include('inc.breadcrumb-admin')

        <div class="section">
            <div class="container">
                @include('inc.general.messages')
            
                <div class="row">
                    <div class="col-md-3">
                        @include('inc.menu-admin')
                    </div>
                    <div class="col-md-9">
                        @yield('content')                  
                    </div>               
                </div>
            </div>
        </div>

        @include('inc.footer-admin')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    @include('inc.general.ckeditor')
    @include('inc.color-admin')
    <script src="/vendor/jquery-ui/jquery-ui.js"></script>      
    <script>
        $("#navbar-tabs a").click(function (e) {
            e.preventDefault();
            $(this).tab("show");
        });
        
        $("#navbar-tabs").sortable({
            axis: "x",
            containment: "parent",
            update: function(event, ui) {
                $("#navbar-tabs li").each(function() {
                    const index = $(this).index();
                    const id = $(this).children()[0].textContent;
                    $(`#${id} #navitem-position`).val(index);
                });
            }
        });
        $("#navbar-tabs").disableSelection();

        /*function onNavbarTitleChange(event) {
            const value = event.target.value;
            
            $("#navbar-tabs .active").text(value);
        }*/

        function onNavbarPositionChange(event) {
            const value = event.target.value;    
            const numNavItems = $("#navbar-tabs").children().length - 1;

            if(value > numNavItems)
                event.target.value = numNavItems;
            else if(value < 0)
                event.target.value = 0;   
        }
        function onNavbarPageChange(event) {
            const value = event.target.value;    
            
            $(".tab-pane.active #navitem-link").val(value);
        }

    </script>

    <script>
        function onHeaderTitleChange(event) {
            const value = $(".header-form #title").val();
            
            $("#header-title").text(value);
        }

        function onHeaderSubTitleChange(event) {
            const value = $(".header-form #subtitle").val();
         
            $("#header-subtitle").text(value);
        }

        function onHeaderImageChange(event, element) {
            const src = element.firstElementChild.src;
            document.getElementById('showcase').style.backgroundImage = `url(${src})`;

            const image = src.replace('http://cmsapp.dev/storage/header_images/', '');
            document.getElementById('header_img').value = image;            
        }
    </script>
</body>
</html>
