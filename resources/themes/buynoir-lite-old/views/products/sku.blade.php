{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

<div class="product-price">
    <h3>SKU: {{$product->sku}}</h3>
</div>

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}