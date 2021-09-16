{!! view_render_event('bagisto.shop.layout.header.category.before') !!}

<?php

$header_contents = app('Webkul\Velocity\Repositories\ContentRepository')->getAllContents();

?>

<ul class="nav fw-light">
    @foreach($header_contents as $header_content)
        <li class="nav-item"><a href="{{$header_content['page_link']}}" class="nav-link">{{$header_content['title']}}</a></li>
    @endforeach
</ul>