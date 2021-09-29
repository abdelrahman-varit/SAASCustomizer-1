@if (app('Webkul\Product\Repositories\ProductRepository')->getNewProducts()->count())
<div class="main-container-wrapper">
    <section class="featured-products">

        <div class="featured-heading">
            <div class="col-3 ftitle">{{ __('shop::app.home.new-products') }}</div>
            <div class="col-9 fline"><hr></div>          
        </div>

        <div class="swiper-container products-grid swipeable">
            <div class="swiper-wrapper">
                @foreach (app('Webkul\Velocity\Repositories\Product\ProductRepository')->getNewProducts(8) as $productFlat)
                    <div class="swiper-slide">
                        @include ('shop::products.list.card', ['product' => $productFlat])
                    </div>
                @endforeach
            </div>
        </div>

    </section>
</div>

@else
<div class="main-container-wrapper">
    <section class="featured-products">

        <div class="featured-heading">
            <div class="col-3 ftitle">{{ __('shop::app.home.new-products') }}</div>
            <div class="col-9 fline"><hr></div>
        </div>

        <div class="swiper-container products-grid swipeable">
            <div class="swiper-wrapper">
                @for($i=1;$i<9;$i++)
                    <div class="swiper-slide">
                        <div class="product-card">
                            <div class="sticker new">{{ __('Demo') }}</div>
                            <div class="product-image">
                                <a href="/" title="Demo product">
                                    <img src="{{ asset('/themes/pattie-labelle/assets/images/product/newproduct-0'.$i.'.jpg') }}" onerror="this.src='{{ asset('/themes/pattie-labelle/assets/images/product/featured-01.jpg') }}'"/>
                                </a>
                            </div>
    
                            <div class="product-information text-center">
                                <div class="product-name">
                                    <a href="/" title="Demo product"><span>Demo Product 0{{$i}}</span></a>
                                </div>
                                <div class="product-price text-danger">$25.00</div>        
                            </div>    
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </section>

</div>

@endif
