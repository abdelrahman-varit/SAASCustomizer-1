{!! view_render_event('bagisto.shop.products.price.before', ['product' => $product]) !!}

<div class="text-primary">
    {!! $product->getTypeInstance()->getPriceHtml() !!}
</div>

{!! view_render_event('bagisto.shop.products.price.after', ['product' => $product]) !!}