@if (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts()->count())
<div class="main-container-wrapper" style="margin-top: 0px;">
    <section class="featured-products" style="padding:0px 0px;margin-top:-40px;overflow:hidden">

        <div class="featured-heading">
            <div class="col-5">{{ __('velocity::app.products.recently-viewed') }}</div>
            <div class="col-7" style="flex:0 0 75%"><hr></div>
        </div>

        <div class="product-grid-4">
            @include ('shop::products.list.recently-viewed', [
                'quantity'          => 4,
                'addClass'          => '',
            ])
        </div>
    
    </section>
</div>
@endif
