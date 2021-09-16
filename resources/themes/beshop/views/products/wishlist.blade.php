@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')

@auth('customer')
    {!! view_render_event('bagisto.shop.products.wishlist.before') !!}
    @php
        $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false
    @endphp
    @if ($showWishlist)
        @if ($wishListHelper->getWishlistProduct($product))
            <a href="{{ route('customer.wishlist.add', $product->product_id) }}" id="wishlist-changer" class="btn btn-light btn-sm text-primary add-to-wishlist already" title="{{ __('shop::app.customer.account.wishlist.remove-wishlist-text') }}"><i class="fas fa-heart"></i></a>
        @else
            <a href="{{ route('customer.wishlist.add', $product->product_id) }}" id="wishlist-changer" class="btn btn-light btn-sm text-dark add-to-wishlist" title="{{ __('shop::app.customer.account.wishlist.add-wishlist-text') }}"><i class="far fa-heart"></i></a>
        @endif        
    @endif 
    {!! view_render_event('bagisto.shop.products.wishlist.after') !!}
@endauth
@guest('customer')
    @if ($wishListHelper->getWishlistProduct($product))
        <a href="{{ route('customer.wishlist.add', $product->product_id) }}" class="btn btn-light btn-sm text-primary add-to-wishlist already" id="wishlist-changer" title="{{ __('shop::app.customer.account.wishlist.remove-wishlist-text') }}"><i class="fas fa-heart"></i></a>
    @else
        <a href="{{ route('customer.wishlist.add', $product->product_id) }}" class="btn btn-light btn-sm text-dark add-to-wishlist" id="wishlist-changer" title="{{ __('shop::app.customer.account.wishlist.add-wishlist-text') }}"><i class="far fa-heart"></i></a>
    @endif
@endguest