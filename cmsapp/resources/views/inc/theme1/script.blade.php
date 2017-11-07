<script>
    // fixate navbar on top after scrolling down
    $('#nav').affix({
        offset: {
            top: $('#showcase').height() - $('#nav').height()
        }
    });	    
    
    // change dropdown to dropup and vice versa when the navbar's state changes
    $('#nav').on('affixed.bs.affix', function() {
        $('#nav-dropdown').removeClass("dropup").addClass("dropdown");
    });
    $('#nav').on('affixed-top.bs.affix', function() {
        $('#nav-dropdown').removeClass("dropdown").addClass("dropup");
    });

</script>