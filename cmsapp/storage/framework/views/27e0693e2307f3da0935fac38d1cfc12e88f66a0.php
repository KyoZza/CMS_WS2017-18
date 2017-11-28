<style>
    body {
        margin-bottom: 0;
    }

    /* Styles for fullpage header */
    #showcase {
        /* 220067 235721 253905 318238 589840 */
        background-image: url('/storage/header_images/pexels-photo-589840.jpeg');
        height: 100vh;  /* vh = viewport height */ 
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    #showcase .well {
        background-color: #fffefe33;
        border: none !important;
        border-radius: 0 !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        color: #ffffffe6;
        text-shadow: 0 0 3px black;
        margin-bottom: 46px;
    }
    
    .showcase-slim {
        height: fit-content !important;
        height: -moz-fit-content !important;
    }

    #nav.affix {
        position: fixed;
        top: 0;
        width: 100%;
        z-index:10;
    }

    #nav.affix-top .navbar-default {
        border-color: #050100b3;
    }

    #nav.affix-top .navbar-default,
    #nav.affix-top .dropdown-menu {
        background-color: #000000b3;
    }

    #nav.affix-top .navbar-default .navbar-nav > .open > a, 
    #nav.affix-top .navbar-default .navbar-nav > .open > a:hover, 
    #nav.affix-top .navbar-default .navbar-nav > .open > a:focus {
        background-color: #0005;
    }

    #nav.affix-top .navbar-default .navbar-nav > li > a, 
    #nav.affix-top .navbar-default .navbar-brand,
    #nav.affix-top .dropdown-menu, 
    #nav.affix-top .dropdown-menu > li > a {
        color: #fffc;
        text-shadow: 0 0 5px black;
    }
    #nav.affix-top .navbar-default .navbar-nav > li > a:hover,
    #nav.affix-top .navbar-default .navbar-brand:hover, 
    #nav.affix-top .dropdown-menu > li > a:hover { 
        color: #fff;
        text-shadow: 0 0 6px black;
    }
    
    #nav.affix-top .dropdown-menu > li > a:hover { 
        background-color: #fff0;
    }

    /* Styles for content area */
    .main-content {
        margin-top: 60px;
        margin-bottom: 60px;
    }

    .main-content h1 {
        margin-bottom: 26px;
    }

    .main-content a:hover {
        text-decoration: none;
    }

    
    #footer-content {
        background-color: #333;
        color: #fff;
        width: 100%;
    }

    #footer-upper {
        border-bottom: 100px solid #333; 
        border-left: 97vw solid transparent;
    }

    .footer-icon-a {
        position: absolute;
    }
    .footer-icon-link {
        width: 0;
        height: 0;
        border: 20px solid transparent;
        border-bottom: 20px solid #fff;
        position: relative;
        top: -40px;
    }
    .footer-icon-link:after {
        content: '';
        position: absolute;
        left: -20px;
        top: 20px;
        width: 0;
        height: 0;
        border: 20px solid transparent;
        border-top: 20px solid #fff;
    }

    .footer-icon {
        position: absolute;
        top: 12px;
        left: -9px;
        z-index: 10;
        font-size: 18px;
    }

</style>
