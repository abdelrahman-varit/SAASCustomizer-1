@php
    $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false;    
    $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false;    
@endphp

 
    {{-- <form action="{{ route('cart.add', $product->product_id) }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
        <input type="hidden" name="quantity" value="1">
        <button class="btn btn-lg btn-primary addtocart" {{ $product->isSaleable() ? '' : 'disabled' }}>{{ ($product->type == 'booking') ?  __('shop::app.products.book-now') :  __('shop::app.products.add-to-cart') }}</button>
    </form> --}}

    @if ($showWishlist)
        @include('shop::products.wishlist')
    @endif

    @if ($showCompare)
        @php
            if($product->product_id>0){
                $product_id=$product->product_id;
            }else{
                $product_id=$product->id;
            }
        @endphp
        @include('shop::products.compare', ['productId' => $product_id])
    @endif