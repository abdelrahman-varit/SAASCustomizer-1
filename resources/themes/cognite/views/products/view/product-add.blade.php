{!! view_render_event('bagisto.shop.products.view.product-add.before', ['product' => $product]) !!}

    @include ('shop::products.add-to-cart-product', ['product' => $product])
    @include ('shop::products.buy-now-product')
    @include ('shop::products.wishlist-btn')
    @include ('shop::products.compare-btn',['productId'=>$product->id])


{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}