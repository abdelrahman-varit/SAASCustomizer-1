{!! view_render_event('bagisto.shop.layout.header.category.before') !!}

<?php

$header_contents = app('Webkul\Velocity\Repositories\ContentRepository')->getAllContents();

?>
@include('shop::layouts.header.nav-menu.sidemenu')
<nav class='greedy'>
    <ul class='links'>
        @foreach($header_contents as $header_content)
            <li><a href="{{$header_content['page_link']}}" target="{{$header_content['link_target']?'_blank':'_self'}}">{{$header_content['title']}}</a></li>
        @endforeach
    </ul>
    <button type="button"><i class="las la-ellipsis-v"></i></button>
    <ul class='hidden hidden-links'></ul>
</nav>