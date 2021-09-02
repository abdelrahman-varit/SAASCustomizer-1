<div class="col-lg-4">
    <div class="footer_top_widget text-lg-center">
        
        @if ($logo = core()->getCurrentChannel()->logo_url)
            <img src="{{ $logo }}" alt="BuyNoir." class="footer_top_widget__logo">
        @else
            <img src="{{ asset('themes/beshop/img/demo/Buynoir.png') }}" alt="BuyNoir." class="footer_top_widget__logo">
        @endif

        @if ($velocityMetaData)
            <p class="my-3">{!! $velocityMetaData->footer_left_content !!}</p>
        @else
            <p class="my-3">{!! __('velocity::app.admin.meta-data.footer-left-raw-content') !!}</p>
        @endif
        
        <ul class="social_media list-unstyled m-0 d-flex flex-wrap justify-content-lg-center">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>
</div>