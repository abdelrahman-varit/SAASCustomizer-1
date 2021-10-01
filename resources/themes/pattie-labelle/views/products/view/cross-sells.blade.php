@foreach ($cart->items as $item)
    <?php
        $product = $item->product;

        if ($product->cross_sells()->count()) {
            $products[] = $product;
            $products = array_unique($products);
        }
    ?>
@endforeach

@if (isset($products))

    <section class="featured-products">

        <div class="featured-heading">
            <div class="col-3 ftitle">{{ __('shop::app.products.cross-sell-title') }}</div>
            <div class="col-9 fline"><hr></div>
        </div>

        <div class="swiper-container products-grid related-products">
            <div class="swiper-wrapper">
                @foreach($products as $product)
                    @foreach ($product->cross_sells()->paginate(2) as $cross_sell_product)
                        <div class="swiper-slide">
                            @include ('shop::products.list.card', ['product' => $cross_sell_product])
                        </div>
                    @endforeach
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </section>

@endif