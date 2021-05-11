{!! view_render_event('bagisto.shop.products.add_to_cart.before', ['product' => $product]) !!}

<button type="submit" class="btn btn-bn addtocart" {{ ! $product->isSaleable() ? 'disabled' : '' }}>
<i class="las la-shopping-cart"></i> &nbsp; {{ ($product->type == 'booking') ?  __('shop::app.products.book-now') :  __('shop::app.products.add-to-cart') }}
</button>

{!! view_render_event('bagisto.shop.products.add_to_cart.after', ['product' => $product]) !!}