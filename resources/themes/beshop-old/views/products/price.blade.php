{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

<div class="product-price text-danger">
    {!! $product->getTypeInstance()->getPriceHtml() !!}
</div>

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}