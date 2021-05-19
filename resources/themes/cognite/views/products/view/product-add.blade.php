{!! view_render_event('bagisto.shop.products.view.product-add.before', ['product' => $product]) !!}

    @include ('shop::products.add-to-cart-product', ['product' => $product])
    @include ('shop::products.buy-now-product')
    @include ('shop::products.wishlist-btn')


{!! view_render_event('bagisto.shop.products.view.product-add.after', ['product' => $product]) !!}