{!! view_render_event('bagisto.shop.layout.header.category.before') !!}

<?php

$header_contents = app('Webkul\Velocity\Repositories\ContentRepository')->getAllContents();

?>

<nav class='greedy'>
    <ul class="nav fw-light justify-content-lg-center links">
        @foreach($header_contents as $header_content)
            <li class="nav-item"><a class="nav-link" href="{{$header_content['page_link']}}">{{$header_content['title']}}</a></li>
        @endforeach
    </ul>
    <button class="btn text-white"><i class="fas fa-ellipsis-v"></i></button>
    <ul class='hidden-links hidden'></ul>
</nav>