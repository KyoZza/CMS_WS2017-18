<footer>
    <div id="footer-upper"></div>
    <div id="footer-content" class="themeColor-dark">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <strong>{{$language === 'de' ? 'Info' : 'About'}}</strong>
                    <p>{!!$language === 'de' ? $footer->about_de : $footer->about_en!!}</p>
                </div>
                <div class="col-md-5 col-sm-5">
                    <strong>{{$language === 'de' ? 'Adresse' : 'Address'}}</strong>
                    <p>{!!$language === 'de' ? $footer->address_de : $footer->address_en!!}</p>
                </div>
            </div>
            
            <br><br>
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <p>Copyright CMSAPP,   &copy; 2018</p>
                </div>
                <div class="col-md-5 col-sm-5">
                    <a href="{{$footer->facebook}}" class="footer-icon-a">
                        <div class="footer-icon-link">
                            <i class="fa fa-facebook footer-icon" aria-hidden="true"></i>                           
                        </div>
                    </a>
                    <a href="{{$footer->twitter}}" class="footer-icon-a" style="left: 66px">
                        <div class="footer-icon-link">
                            <i class="fa fa-twitter footer-icon" aria-hidden="true"></i>                           
                        </div>
                    </a>
                    <a href="{{$footer->youtube}}" class="footer-icon-a" style="left: 117px">
                        <div class="footer-icon-link">
                            <i class="fa fa-youtube footer-icon" aria-hidden="true"></i>                           
                        </div>
                    </a>
                    <a href="{{$footer->linkedin}}" class="footer-icon-a" style="left: 168px">
                        <div class="footer-icon-link">
                            <i class="fa fa-linkedin footer-icon" aria-hidden="true"></i>                           
                        </div>
                    </a> 
                    <a href="/contact" class="footer-icon-a" style="left: 219px">
                        <div class="footer-icon-link">
                            <i class="fa fa-envelope footer-icon" aria-hidden="true"></i>                           
                        </div>
                    </a>              
                </div>
            </div>
        </div>
    </div>
</footer>