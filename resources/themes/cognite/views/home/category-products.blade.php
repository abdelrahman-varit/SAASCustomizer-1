@if (app('Webkul\Product\Repositories\ProductRepository')->getAll(10)->count())
<div class="main-container-wrapper" style="margin-top: 10vh;">
    <section class="featured-products">

        <div class="featured-heading">
            <div class="col-3"></div>
            <div class="col-9"><hr></div>
            {{-- <div class="col-2"><a class="btn-dark" href="/">More -></a></div> --}}
        </div>

        <div class="product-grid-4">
            @foreach (app('Webkul\Product\Repositories\ProductRepository')->getAll(10) as $productFlat)
                @include ('shop::products.list.card', ['product' => $productFlat])

            @endforeach

        </div>

    </section>
</div>
@endif
