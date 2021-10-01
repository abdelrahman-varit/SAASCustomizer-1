<?php
    $relatedProducts = $product->related_products()->get();
?>

@if ($relatedProducts->count())

    <section class="featured-products">

        <div class="featured-heading">
            <div class="col-3 ftitle">{{ __('shop::app.products.related-product-title') }}</div>
            <div class="col-9 fline"><hr></div>
        </div>

        <div class="swiper-container products-grid related-products">
            <div class="swiper-wrapper">
                @foreach ($relatedProducts as $related_product)
                    <div class="swiper-slide">
                        @include ('shop::products.list.card', ['product' => $related_product])
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </section>

@endif