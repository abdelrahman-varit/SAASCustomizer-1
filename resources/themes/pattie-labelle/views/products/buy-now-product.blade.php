{!! view_render_event('bagisto.shop.products.buy_now.before', ['product' => $product]) !!}
@if($product->type=="booking")
@else
    <button type="submit" class="btn btn-black buynow" {{ ! $product->isSaleable(1) ? 'disabled' : '' }}>
        {{ __('shop::app.products.buy-now') }}
    </button>
@endif
{!! view_render_event('bagisto.shop.products.buy_now.after', ['product' => $product]) !!}