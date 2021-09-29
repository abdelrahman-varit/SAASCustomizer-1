{!! view_render_event('bagisto.shop.layout.header.category.before') !!}

<?php

$header_contents = app('Webkul\Velocity\Repositories\ContentRepository')->getAllContents();

?>

    <div class="main-container-wrapper">
        <div class="header-bottom-sidemenu">
            @include('shop::layouts.header.nav-menu.sidemenu')
        </div>
        <div class="header-bottom-nav">
            <nav class="greedy">
                <ul class="nav links">
                    @foreach($header_contents as $header_content)
                        <li><a href="{{$header_content['page_link']}}" target="{{$header_content['link_target']?'_blank':'_self'}}">{{$header_content['title']}}</a></li>
                    @endforeach
                </ul>
                <button class="btn"><i class="fas fa-ellipsis-v"></i></button>
                <ul class='hidden-links hidden'></ul>
            </nav>            
        </div>
        <div class="header-bottom-phone">
            <ul class="nav">
                <li><a href="tel:+123456789">+123456789</a></li>
            </ul>
        </div>
    </div>