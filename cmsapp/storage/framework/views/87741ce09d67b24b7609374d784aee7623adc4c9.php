<script>
    $( document ).ready(function() {
        $('.affix .navbar').addClass("themeColor-light");
        $('.affix .navbar-brand').addClass("themeColor-light");
        $('.affix .navbar-default .navbar-nav > li > a').addClass("themeColor-light");
    });

    // fixate navbar on top after scrolling down
    $('#nav').affix({
        offset: {
            top: $('#showcase').height() - $('#nav').height()
        }
    });	    
    
    // change dropdown to dropup and vice versa when the navbar's state changes
    $('#nav').on('affixed.bs.affix', function() {
        $('.navbar').addClass("themeColor-light");
        $('.navbar-brand').addClass("themeColor-light");
        $('.navbar-default .navbar-nav > li > a').addClass("themeColor-light");
        
        $('#nav-dropdown').removeClass("dropup").addClass("dropdown");
    });
    $('#nav').on('affixed-top.bs.affix', function() {
        $('.navbar').removeClass("themeColor-light");
        $('.navbar-brand').removeClass("themeColor-light");
        $('.navbar-default .navbar-nav > li > a').removeClass("themeColor-light");
        
        $('#nav-dropdown').removeClass("dropdown").addClass("dropup");
    });

</script>