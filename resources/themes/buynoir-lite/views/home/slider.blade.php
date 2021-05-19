<?php

$categories = [];

foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
    if ($category->slug)
        array_push($categories, $category);
}

?>

<section class="slider-block">
    <div class="container">
        <div class="left-sidebar-slider">
            <div class="div-left-sidebar">
                <div class="left-menu-header">SHOP BY CATEGORIES</div>
                <div class="left-menu-body">
                    <ul class="left-menu">
                    @foreach($categories as $category)
                        <li class="left-menu-item dropdown-toggle">
                            <a href="{{url()->to('/')}}/{{$category['translations'][0]->url_path}}">
                                {{$category->name}}
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="div-slider">
                <image-slider :slides='@json($sliderData)' public_path="{{ url()->to('/') }}"></image-slider>
            </div>
        </div>
    </div>
</section>