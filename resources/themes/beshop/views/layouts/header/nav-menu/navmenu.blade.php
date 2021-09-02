{!! view_render_event('bagisto.shop.layout.header.category.before') !!}

<?php

$header_contents = app('Webkul\Velocity\Repositories\ContentRepository')->getAllContents();

?>

    <div class="main-container-wrapper">
        <ul class="nav">
            @foreach($header_contents as $header_content)
                <li><a href="{{$header_content['page_link']}}">{{$header_content['title']}}</a></li>
            @endforeach
        </ul>
    </div>