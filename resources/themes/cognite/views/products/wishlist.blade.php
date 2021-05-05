@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')

@auth('customer')
    {!! view_render_event('bagisto.shop.products.wishlist.before') !!}
    @php
        $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false
    @endphp

    @if ($showWishlist) 
    <a
        @if ($wishListHelper->getWishlistProduct($product))
            class="add-to-wishlist already"
            title="{{ __('shop::app.customer.account.wishlist.remove-wishlist-text') }}"
        @else
            class="add-to-wishlist"
            title="{{ __('shop::app.customer.account.wishlist.add-wishlist-text') }}"
        @endif
        id="wishlist-changer"
        style="margin-right: 15px;"
        href="{{ route('customer.wishlist.add', $product->product_id) }}">
        <i class="icon wishlist-icons"></i>
    </a>
    @else
    <a
        @if ($wishListHelper->getWishlistProduct($product))
            class="add-to-wishlist already"
            title="{{ __('shop::app.customer.account.wishlist.remove-wishlist-text') }}"
        @else
            class="add-to-wishlist"
            title="{{ __('shop::app.customer.account.wishlist.add-wishlist-text') }}"
        @endif
        id="wishlist-changer"
        style="margin-right: 15px;"
        href="{{ route('customer.wishlist.add', $product->product_id) }}">
        <i class="icon wishlist-icons"></i>
    </a>
    @endif 
    {!! view_render_event('bagisto.shop.products.wishlist.after') !!}
@endauth
