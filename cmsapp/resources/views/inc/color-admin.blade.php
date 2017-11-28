<script src="/vendor/itsjavi/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>      
<script>
    $(function () {
        $('#page-color').colorpicker();

        $('#page-color').on('hidePicker', function(event) {
            const color = $('#page-color').colorpicker('getValue');
            
            $('#nav-color-picker-value').val(color);
            
            $('.main-color-bg').each(function() {
                this.style.setProperty( 'background-color', color, 'important' );
            });

            $('#nav-color-picker-submit').click();                
        });
    });
</script>