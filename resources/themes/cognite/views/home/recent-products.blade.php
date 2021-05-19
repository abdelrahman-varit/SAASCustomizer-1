@if (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts()->count())
<div class="main-container-wrapper">
    <section class="featured-products recently-viewed-products-container">

        <div class="featured-heading">
            <div class="col-5 ftitle">{{ __('velocity::app.products.recently-viewed') }}</div>
            <div class="col-7 fline"><hr></div>
        </div>

        @include ('shop::products.list.recently-viewed', [
            'quantity'          => 5,
            'addClass'          => '',
        ])
    
    </section>
</div>
@endif
