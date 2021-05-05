
@if (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts()->count())
<div class="main-container-wrapper" style="margin-top: 10vh;">
    <section class="featured-products">

        <div class="featured-heading">
            <div class="col-3">{{ __('shop::app.home.featured-products') }}</div>
            <div class="col-9"><hr></div>
            {{-- <div class="col-2"><a class="btn-dark" href="/">More -></a></div> --}}
        </div>


        <div class="featured-grid product-grid-4">

            @foreach (app('Webkul\Product\Repositories\ProductRepository')->getFeaturedProducts() as $productFlat)

                @include ('shop::products.list.card', ['product' => $productFlat])

            @endforeach

        </div>

    </section>

</div>
@endif