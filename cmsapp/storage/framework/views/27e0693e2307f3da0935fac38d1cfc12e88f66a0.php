<style>
    .theme1 body {
        margin-bottom: 0;
    }

    /* Styles for fullpage header */
    .theme1 #showcase {
        /* 220067 235721 253905 318238 589840 */
        background-image: url('/storage/header_images/<?php echo e($header->background_image); ?>');
        height: 100vh;  /* vh = viewport height */ 
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .theme1 #showcase .well {
        background-color: #fffefe33;
        border: none !important;
        border-radius: 0 !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        color: #ffffffe6;
        text-shadow: 0 0 3px black;
        margin-bottom: 46px;
    }
    
    .theme1 .showcase-slim {
        height: fit-content !important;
        height: -moz-fit-content !important;
    }

    .theme1 #nav.affix {
        position: fixed;
        top: 0;
        width: 100%;
        z-index:10;
    }

    .theme1 #nav.affix-top .navbar-default {
        border-color: #050100b3;
    }

    .theme1 #nav.affix-top .navbar-default,
    .theme1 #nav.affix-top .dropdown-menu {
        background-color: #000000b3;
    }

    .theme1 #nav.affix-top .navbar-default .navbar-nav > .open > a, 
    .theme1 #nav.affix-top .navbar-default .navbar-nav > .open > a:hover, 
    .theme1 #nav.affix-top .navbar-default .navbar-nav > .open > a:focus {
        background-color: #0005;
    }

    .theme1 #nav.affix-top .navbar-default .navbar-nav > li > a, 
    .theme1 #nav.affix-top .navbar-default .navbar-brand,
    .theme1 #nav.affix-top .dropdown-menu, 
    .theme1 #nav.affix-top .dropdown-menu > li > a {
        color: #fffc;
        text-shadow: 0 0 5px black;
    }
    .theme1 #nav.affix-top .navbar-default .navbar-nav > li > a:hover,
    .theme1 #nav.affix-top .navbar-default .navbar-brand:hover, 
    .theme1 #nav.affix-top .dropdown-menu > li > a:hover { 
        color: #fff;
        text-shadow: 0 0 6px black;
    }
    
    .theme1 #nav.affix-top .dropdown-menu > li > a:hover { 
        background-color: #fff0;
    }

    /* Styles for content area */
    .theme1 .main-content {
        margin-top: 60px;
        margin-bottom: 60px;
    }

    .theme1 .main-content h1 {
        margin-bottom: 26px;
    }

    .theme1 .main-content a:hover {
        text-decoration: none;
    }

    
    .theme1 #footer-content {
        background-color: #333;
        color: #fff;
        width: 100%;
    }

    .theme1 #footer-upper {
        border-bottom: 100px solid #333; 
        border-left: 97vw solid transparent;
    }

    .theme1 .footer-icon-a {
        position: absolute;
    }
    .theme1 .footer-icon-link {
        width: 0;
        height: 0;
        border: 20px solid transparent;
        border-bottom: 20px solid #fff;
        position: relative;
        top: -40px;
    }
    .theme1 .footer-icon-link:after {
        content: '';
        position: absolute;
        left: -20px;
        top: 20px;
        width: 0;
        height: 0;
        border: 20px solid transparent;
        border-top: 20px solid #fff;
    }

    .theme1 .footer-icon {
        position: absolute;
        top: 12px;
        left: -9px;
        z-index: 10;
        font-size: 18px;
    }

</style>
