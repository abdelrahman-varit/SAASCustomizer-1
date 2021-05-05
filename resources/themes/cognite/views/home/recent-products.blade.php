@if (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts()->count())
<div class="main-container-wrapper" style="margin-top: 10vh;">
    <section class="featured-products">

            @include ('shop::products.list.recently-viewed', [
                'quantity'          => 4,
                'addClass'          => 'col-lg-3 col-md-12',
            ])

    
    </section>
</div>
@endif
