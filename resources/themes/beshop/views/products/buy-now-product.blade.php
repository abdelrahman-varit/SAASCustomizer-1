{!! view_render_event('bagisto.shop.products.buy_now.before', ['product' => $product]) !!}

<button type="submit" class="btn btn-dark rounded-0 text-white py-2" style="width: 200px" {{ ! $product->isSaleable(1) ? 'disabled' : '' }}>
    {{ __('shop::app.products.buy-now') }}
</button>

{!! view_render_event('bagisto.shop.products.buy_now.after', ['product' => $product]) !!}