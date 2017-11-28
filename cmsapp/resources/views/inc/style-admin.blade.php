<style>  
    .main-color-bg {
        @if(Auth::user()->theme_color)
            background-color: {{Auth::user()->theme_color}} !important;
        @else 
            background-color: #7a0a0a !important;
        @endif
            
        color: #fff !important;
    }
</style>