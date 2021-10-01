{!! view_render_event('bagisto.shop.products.view.up-sells.after', ['product' => $product]) !!}

<?php
    $productUpSells = $product->up_sells()->get();
?>

@if ($productUpSells->count())
    <section class="featured-products">

        <div class="featured-heading">
            <div class="col-3 ftitle">{{ __('shop::app.products.up-sell-title') }}</div>
            <div class="col-9 fline"><hr></div>
        </div>

        <div class="swiper-container products-grid related-products">
            <div class="swiper-wrapper">
                @foreach ($productUpSells as $up_sell_product)
                    <div class="swiper-slide">
                        @include ('shop::products.list.card', ['product' => $up_sell_product])
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </section>
@endif

{!! view_render_event('bagisto.shop.products.view.up-sells.after', ['product' => $product]) !!}