@php
    $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false;    
    $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false;   
@endphp

{!! view_render_event('bagisto.shop.products.view.product-add.before', ['product' => $product]) !!}

    @include ('shop::products.add-to-cart-product', ['product' => $product])
    @include ('shop::products.buy-now-product')
    @if($showWishlist)
        @include ('shop::products.wishlist-btn')
    @endif
    @if($showCompare)
        @include ('shop::products.compare-btn',['productId'=>$product->product_id])
    @endif


{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}