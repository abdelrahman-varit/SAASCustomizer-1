@if (app('Webkul\Product\Repositories\ProductRepository')->getAll()->count())

@php
    $slug = $category;
    $category = app('Webkul\Category\Repositories\CategoryRepository')->findBySlugOrFail($slug);
    $products = app('Webkul\Product\Repositories\ProductRepository')->getAll($category->id);
@endphp
<div class="main-container-wrapper" style="margin-top: 10vh;">
    <section class="featured-products">

        <div class="featured-heading">
            <div class="col-3">{{$category->name}}</div>
            <div class="col-9"><hr></div>
        </div>

        <div class="product-grid-4">
            @foreach ($products as $productFlat)
                @include ('shop::products.list.card', ['product' => $productFlat])

            @endforeach

        </div>

    </section>
</div>
@endif
