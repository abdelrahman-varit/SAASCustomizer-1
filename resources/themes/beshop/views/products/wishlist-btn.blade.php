@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')

@auth('customer')
    {!! view_render_event('bagisto.shop.products.wishlist.before') !!}
    @php
        $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false
    @endphp

    @if ($showWishlist) 
        <a class="btn p-0 text-start shadow-none border-0 text-dark"
            @if ($wishListHelper->getWishlistProduct($product))
                class="add-to-wishlist already"
                title="{{ __('shop::app.customer.account.wishlist.remove-wishlist-text') }}"
            @else
                class="add-to-wishlist"
                title="{{ __('shop::app.customer.account.wishlist.add-wishlist-text') }}"
            @endif
            id="wishlist-changer"
            style="width: 200px"
            href="{{ route('customer.wishlist.add', $product->product_id) }}">
            <svg width="45" height="45" class="border me-2" style="padding: 12px" enable-background="new 293.364 356.469 25.271 22.484" version="1.1" viewBox="293.36 356.47 25.271 22.484" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m316.63 358.67c-1.308-1.419-3.103-2.2-5.055-2.2-1.459 0-2.795 0.461-3.971 1.371-0.593 0.459-1.131 1.021-1.605 1.676-0.474-0.655-1.012-1.217-1.605-1.676-1.176-0.909-2.512-1.371-3.971-1.371-1.952 0-3.747 0.781-5.055 2.2-1.293 1.402-2.005 3.318-2.005 5.395 0 2.137 0.796 4.094 2.506 6.157 1.53 1.846 3.728 3.719 6.274 5.889 0.869 0.741 1.855 1.581 2.878 2.475 0.27 0.237 0.617 0.367 0.977 0.367s0.707-0.13 0.977-0.367c1.023-0.895 2.009-1.735 2.879-2.476 2.546-2.169 4.744-4.043 6.274-5.889 1.71-2.063 2.506-4.02 2.506-6.157 1e-3 -2.076-0.711-3.992-2.004-5.394z"></path></svg>
            Wishlist
        </a>    
    @endif 
    {!! view_render_event('bagisto.shop.products.wishlist.after') !!}
@endauth
@guest('customer')
    <a class="btn p-0 text-start shadow-none border-0 text-dark"
        @if ($wishListHelper->getWishlistProduct($product))
            class="add-to-wishlist already"
            title="{{ __('shop::app.customer.account.wishlist.remove-wishlist-text') }}"
        @else
            class="add-to-wishlist"
            title="{{ __('shop::app.customer.account.wishlist.add-wishlist-text') }}"
        @endif
        id="wishlist-changer"
        style="width: 200px"
        href="{{ route('customer.wishlist.add', $product->product_id) }}">
        <svg width="45" height="45" class="border me-2" style="padding: 12px" enable-background="new 293.364 356.469 25.271 22.484" version="1.1" viewBox="293.36 356.47 25.271 22.484" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m316.63 358.67c-1.308-1.419-3.103-2.2-5.055-2.2-1.459 0-2.795 0.461-3.971 1.371-0.593 0.459-1.131 1.021-1.605 1.676-0.474-0.655-1.012-1.217-1.605-1.676-1.176-0.909-2.512-1.371-3.971-1.371-1.952 0-3.747 0.781-5.055 2.2-1.293 1.402-2.005 3.318-2.005 5.395 0 2.137 0.796 4.094 2.506 6.157 1.53 1.846 3.728 3.719 6.274 5.889 0.869 0.741 1.855 1.581 2.878 2.475 0.27 0.237 0.617 0.367 0.977 0.367s0.707-0.13 0.977-0.367c1.023-0.895 2.009-1.735 2.879-2.476 2.546-2.169 4.744-4.043 6.274-5.889 1.71-2.063 2.506-4.02 2.506-6.157 1e-3 -2.076-0.711-3.992-2.004-5.394z"></path></svg>
        Wishlist
    </a>
@endguest
