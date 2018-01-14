<style>  
    /* for backend display of the theme */
    /* header */
    .theme1 #showcase {
        height: 470px !important;;  
    }

    .customize-frontend .container {
        width: 100% !important;
    }

    .theme1 .navbar-default .navbar-nav > li > a, 
    .theme1 .navbar-default .navbar-brand, 
    .theme1 .dropdown-menu, 
    .theme1 .dropdown-menu > li > a {
        color: #fffc;
        text-shadow: 0 0 5px black;
    }

    .theme1 .navbar-default .navbar-nav > .open > a, 
    .theme1 .navbar-default .navbar-nav > .open > a:hover, 
    .theme1 .navbar-default .navbar-nav > .open > a:focus {
        background-color: #0005;
        color: #fffc;
        text-shadow: 0 0 5px black;
    }

    .theme1 .navbar-default, 
    .theme1 .dropdown-menu {
        background-color: #000000b3 !important;
    }

    .theme1  .navbar-default {
        border-color: #050100b3 !important;
    }

    /* navbar */
    .navbar {
        min-height: 38px
    }

    /* header customization */
    @media (min-width: 768px) {
        .header-image-thumbnail {
            height: 213px !important;
        }
    }

    @media (min-width: 992px) {
        .header-image-thumbnail {
            height: 90px !important;
        }
    }

    @media (min-width: 1200px) {
        .header-image-thumbnail {
            height: 115px !important; 
        }
    }


    /* adaptable admin theme color */
    .main-color-bg {
        @if(Auth::user()->theme_color)
            background-color: {{Auth::user()->theme_color}} !important;
        @else 
            background-color: #7a0a0a !important;
        @endif
            
        color: #fff !important;
    }
</style>