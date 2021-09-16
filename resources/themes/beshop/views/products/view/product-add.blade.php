@php
    $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false;    
    $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false;   
@endphp

{!! view_render_event('bagisto.shop.products.view.product-add.before', ['product' => $product]) !!}

    <div class="row g-2 mb-2 justify-content-start">
        <div class="col-auto">
            @include ('shop::products.add-to-cart-product', ['product' => $product])
        </div>
        <div class="col-auto">
            @include ('shop::products.buy-now-product')
        </div>
    </div>

    <div class="row g-2 mb-4 justify-content-start">
        @if($showWishlist)
            <div class="col-auto">
                @include ('shop::products.wishlist-btn')
            </div>
        @endif
        @if($showCompare)
            <div class="col-auto">
                @include ('shop::products.compare-btn',['productId'=>$product->product_id])
            </div>
        @endif
    </div>


{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}