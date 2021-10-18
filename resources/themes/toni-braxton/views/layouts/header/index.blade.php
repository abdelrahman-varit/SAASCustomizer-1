<?php
    $term = request()->input('term');
    $cat = request()->input('cat');

    if (! is_null($term)) {
        $serachQuery = 'term='.request()->input('term');
    }
?>

<div class="header-area">
    <div class="main-container-wrapper">
        <div class="bn-header">
            <div class="bn-header-left">
                @include('shop::layouts.header.nav-menu.navmenu')
            </div>
            <div class="bn-header-middle">
                <a href="{{ route('shop.home.index') }}">
                    @if ($logo = core()->getCurrentChannel()->logo_url)
                        <img class="logo" src="{{ $logo }}" />
                    @else
                        <img class="logo" src="{{asset('/themes/toni-braxton/assets/images/logo.svg') }}" />
                    @endif
                </a>
            </div>
            <div class="bn-header-right">
                <ul class="nav">
                    {!! view_render_event('bagisto.shop.layout.header.cart-item.before') !!}
                        <li class="cart-dropdown-container">
                            @include('shop::checkout.cart.mini-cart')
                        </li>
                    {!! view_render_event('bagisto.shop.layout.header.cart-item.after') !!}
    
                    {!! view_render_event('bagisto.shop.layout.header.comppare-item.before') !!}
                        @php
                            $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false
                        @endphp
                        @if ($showCompare)
                            <li class="compare-dropdown-container">
                                <a
                                    @auth('customer')
                                        href="{{ route('velocity.customer.product.compare') }}"
                                    @endauth
                                    @guest('customer')
                                        href="{{ route('velocity.product.compare') }}"
                                    @endguest
                                    title="{{ __('shop::app.customer.compare.text') }}"
                                >
                                    <i class="las la-exchange-alt"></i>
                                    <span id="compare-items-count" class="counter">0</span>
                                </a>
                            </li>
                        @endif
    
                        @php
                            $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false
                        @endphp
                        @if($showWishlist)
                            <li class="compare-dropdown-container">
                                <a href="{{ route('customer.wishlist.index') }}" title="{{ __('shop::app.header.wishlist') }}">
                                    <i class="las la-heart"></i>
                                    <span id="wishlist-items-count" class="counter">0</span>
                                </a>
                            </li>
                        @endif
                    {!! view_render_event('bagisto.shop.layout.header.compare-item.after') !!}
                    
                    {!! view_render_event('bagisto.shop.layout.header.account-item.before') !!}
                        <li>
                            <span class="dropdown-toggle"><i class="las la-user"></i></span>
    
                            @guest('customer')
                                <ul class="dropdown-list account guest">
                                    <li><a href="{{ route('customer.session.index') }}">{{ __('shop::app.header.sign-in') }}</a></li>
                                    <li><a href="{{ route('customer.register.index') }}">{{ __('shop::app.header.sign-up') }}</a></li>
                                </ul>
                            @endguest
    
                            @auth('customer')
                                <ul class="dropdown-list account customer">
                                    <li>
                                        <label>{{ auth()->guard('customer')->user()->first_name }}</label>
                                        <ul>
                                            <li><a href="{{ route('customer.profile.index') }}">{{ __('shop::app.header.profile') }}</a></li>
                                            <li><a href="{{ route('customer.wishlist.index') }}">{{ __('shop::app.header.wishlist') }}</a></li>
                                            <li><a href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.header.cart') }}</a></li>
                                            <li><a href="{{ route('customer.session.destroy') }}">{{ __('shop::app.header.logout') }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @endauth
                        </li>
                    {!! view_render_event('bagisto.shop.layout.header.account-item.after') !!}
    
                    {!! view_render_event('bagisto.shop.layout.header.currency-item.before') !!}
                        @if (core()->getCurrentChannel()->currencies->count() > 0)
                            <li class="currency-switcher">
                                <span class="dropdown-toggle">{{ core()->getCurrentCurrencyCode() }} <i class="las la-angle-down"></i></span>
                                <ul class="dropdown-list currency">
                                    @foreach (core()->getCurrentChannel()->currencies as $currency)
                                        <li>
                                            @if (isset($serachQuery))
                                                <a href="?{{ $serachQuery }}&currency={{ $currency->code }}">{{ $currency->code }} ({{ $currency->symbol }})</a>
                                            @else
                                                <a href="?currency={{ $currency->code }}">{{ $currency->code }} ({{ $currency->symbol }})</a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    {!! view_render_event('bagisto.shop.layout.header.currency-item.after') !!}
    
                    {!! view_render_event('bagisto.shop.layout.header.locale-item.before') !!}
                        @if (core()->getCurrentChannel()->locales->count() > 0)
                            <li class="locale-switcher">
                                <span class="dropdown-toggle">
                                    
                                    @php
                                        $localeImage = null;
                                    @endphp
                        
                                    @foreach (core()->getCurrentChannel()->locales as $locale)
                                        @if ($locale->code == app()->getLocale())
                                            @php
                                                $localeImage = $locale->locale_image;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if ($localeImage)
                                        <img src="{{ asset('/storage/' . $localeImage) }}" onerror="this.src = '/themes/toni-braxton/assets/images/icons/en.png'" width="20">
                                    @elseif (app()->getLocale() == 'en')
                                        <img src="{{ asset('/themes/toni-braxton/assets/images/icons/en.png') }}" width="20">
                                    @endif
                                    
                                    {{ strtoupper(core()->getCurrentLocale()->code) }}<i class="las la-angle-down"></i>
                                </span>
                                <ul class="dropdown-list locale">
                                    @foreach (core()->getCurrentChannel()->locales as $locale)
                                        <li>
                                            @if (isset($serachQuery))
                                                <a href="?{{ $serachQuery }}&locale={{ $locale->code }}" class="dropdown-item"></a>
                                            @else
                                                <a href="?locale={{ $locale->code }}" class="dropdown-item"><img src="{{ asset('/themes/toni-braxton/assets/images/icons/en.png') }}" width="20"> {{ $locale->name }}</a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    {!! view_render_event('bagisto.shop.layout.header.currency-item.after') !!}
                    
                    <li>
                        <span class="dropdown-toggle"><i class="las la-search"></i></span>
                        <div class="dropdown-list">
                            <form class="search-form" role="search" action="{{ route('shop.search.index') }}" method="GET">
                                @php
                                    $categories = [];
                                    foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
                                        if ($category->slug)
                                            array_push($categories, $category);
                                    }
                                @endphp
    
                                <div class="control-group">
                                    <select name="cat" class="control">
                                        <option>All Categories</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->slug}}" @if($cat == $category->slug) selected @endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="control-group">
                                    <input
                                    required
                                    name="term"
                                    type="search"
                                    value="{{ $term }}"
                                    class="control"
                                    placeholder="{{ __('shop::app.header.search-text') }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')

    <script>
        $(document).ready(function() {

            @auth('customer')
                @php
                    $compareCount = app('Webkul\Velocity\Repositories\VelocityCustomerCompareProductRepository')->count([
                        'customer_id' => auth()->guard('customer')->user()->id,
                    ]);
                @endphp

                let comparedItems = JSON.parse(localStorage.getItem('compared_product'));
                $('#compare-items-count').html(comparedItems?comparedItems.length:0);
                // console.log('count of compare layout/header/index: ',comparedItems );

                fetch("{{route('customer.wishlist.count')}}").then(response=>response.json()).then(data=>{
                   
                    if(data.status=="success"){
                        $('#wishlist-items-count').html(data.wishlistCount);
                    }
                }).catch(error=>{
                    console.log('Errors on wishlist fetch: ',error);
                })
            @endauth

            @guest('customer')
                let comparedItems = JSON.parse(localStorage.getItem('compared_product'));
                 
                $('#compare-items-count').html(comparedItems ? comparedItems.length : 0);
                console.log('count of compare layout/header/index: ',comparedItems );

            @endguest
        });
    </script>
@endpush
