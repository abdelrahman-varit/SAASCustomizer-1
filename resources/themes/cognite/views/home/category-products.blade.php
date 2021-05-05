@if (app('Webkul\Product\Repositories\ProductRepository')->getAll()->count())

@php
    $slug = $category;
    $category = app('Webkul\Category\Repositories\CategoryRepository')->findBySlugOrFail($slug);
    $products = app('Webkul\Product\Repositories\ProductRepository')->getAll($category->id)->take(8);
    // dd($product);
@endphp
<div class="main-container-wrapper" style="margin-top: 10vh;">
    <section class="featured-products">

        <div class="featured-heading">
            <div class="col-3">{{$category->name}}</div>
            <div class="col-7"><hr></div>
            <div class="col-2"><a class="btn-dark" href="/{{$slug}}">Shop More</a></div>
        </div>

        <div class="product-grid-4">
            @foreach ($products as $productFlat)
                @include ('shop::products.list.card', ['product' => $productFlat])

            @endforeach

        </div>

    </section>
</div>
@endif
