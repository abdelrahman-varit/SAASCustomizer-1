<?php
    $term = request()->input('term');
    $cat = request()->input('cat');

    if (! is_null($term)) {
        $serachQuery = 'term='.request()->input('term');
    }
?>

<!-- Header Start -->
<div class="header">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="btn-group">

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

                        {!! view_render_event('bagisto.shop.layout.header.locale-item.before') !!}

                        @if (core()->getCurrentChannel()->locales->count() > 0)
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    @if ($localeImage)
                                        <img src="{{ asset('/storage/' . $localeImage) }}" onerror="this.src = '/themes/beshop/img/flags/english.png'" class="me-1"/> English
                                    @elseif (app()->getLocale() == 'en')
                                        <img src="{{ asset('/themes/beshop/img/flags/english.png') }}" alt="English" class="me-1"/> English
                                    @elseif (app()->getLocale() == 'bn')
                                        <img src="{{ asset('/themes/beshop/img/flags/bangla.png') }}" alt="Bangla" class="me-1"/> Bangla
                                    @endif
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach (core()->getCurrentChannel()->locales as $locale)
                                        <li>
                                            @if (isset($serachQuery))
                                                <a href="?{{ $serachQuery }}&locale={{ $locale->code }}" class="dropdown-item"></a>
                                            @else
                                                <a class="dropdown-item" href="?locale={{ $locale->code }}"><img src="{{ asset('themes/beshop/img/flags/'.strtolower($locale->name).'.png') }}" alt="{{ $locale->name }}" class="me-1"> {{ $locale->name }}</a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        
                        @endif

                        {!! view_render_event('bagisto.shop.layout.header.locale-item.after') !!}


                        {!! view_render_event('bagisto.shop.layout.header.currency-item.before') !!}

                        @if (core()->getCurrentChannel()->currencies->count() > 0)
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <svg width="14" height="14" class="me-1" enable-background="new 188.343 188.631 17.968 17.392" version="1.1" viewBox="188.34 188.63 17.968 17.392" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                        <path d="m196.55 199.77c-0.437-0.118-0.828-0.333-1.101-0.606-0.118-0.118-0.275-0.183-0.443-0.183s-0.324 0.065-0.443 0.183l-0.048 0.048c-0.118 0.118-0.185 0.281-0.184 0.448s0.071 0.329 0.191 0.445c0.533 0.517 1.287 0.89 2.067 1.025l0.076 0.013v0.591c0 0.345 0.281 0.626 0.626 0.626h0.071c0.345 0 0.626-0.281 0.626-0.626v-0.605l0.074-0.014c1.295-0.247 2.068-1.056 2.068-2.164 0.011-1.507-1.105-2.057-2.079-2.368l-0.064-0.02v-2.03l0.111 0.024c0.287 0.063 0.543 0.159 0.741 0.278 0.097 0.058 0.209 0.089 0.322 0.089 0.218 0 0.416-0.11 0.532-0.294l0.032-0.051c0.088-0.141 0.117-0.315 0.078-0.477s-0.142-0.304-0.285-0.391c-0.399-0.242-0.915-0.42-1.453-0.502l-0.077-0.012v-0.447c0-0.345-0.281-0.626-0.626-0.626h-0.071c-0.345 0-0.626 0.281-0.626 0.626v0.48l-0.073 0.015c-1.197 0.241-1.911 0.992-1.911 2.008 0 1.088 0.629 1.829 1.922 2.268l0.062 0.021v2.259l-0.115-0.031zm1.438-1.805 0.128 0.056c0.507 0.223 0.695 0.472 0.691 0.923 0 0.375-0.235 0.642-0.699 0.795l-0.12 0.039v-1.813zm-1.458-1.916c-0.379-0.202-0.527-0.426-0.527-0.796 0-0.282 0.181-0.491 0.538-0.623l0.123-0.045v1.536l-0.134-0.072z"/>
                                        <path d="m206.09 191.8c-0.185-0.148-0.44-0.17-0.647-0.056l-1.23 0.678c-1.531-2.352-4.146-3.788-6.983-3.788-4.594 0-8.332 3.738-8.332 8.332 0 0.503 0.408 0.911 0.911 0.911s0.911-0.408 0.911-0.911c0-3.59 2.921-6.51 6.51-6.51 2.171 0 4.177 1.076 5.383 2.847l-1.152 0.635c-0.207 0.114-0.325 0.342-0.299 0.577s0.191 0.431 0.418 0.497l3.088 0.895c0.053 0.015 0.108 0.023 0.163 0.023 0.098 0 0.195-0.024 0.282-0.072 0.136-0.075 0.236-0.2 0.28-0.349l0.895-3.088c0.064-0.229-0.013-0.473-0.198-0.621z"/>
                                        <path d="m204.84 196.78c-0.503 0-0.911 0.408-0.911 0.911 0 3.59-2.921 6.51-6.511 6.51-2.171 0-4.177-1.076-5.383-2.847l1.152-0.635c0.207-0.114 0.325-0.342 0.299-0.577s-0.191-0.431-0.418-0.497l-3.088-0.895c-0.053-0.016-0.108-0.023-0.163-0.023-0.098 0-0.195 0.024-0.282 0.072-0.136 0.075-0.236 0.2-0.279 0.349l-0.895 3.088c-0.066 0.227 0.012 0.471 0.196 0.619 0.185 0.148 0.44 0.17 0.647 0.056l1.23-0.678c1.531 2.352 4.146 3.787 6.983 3.787 4.594 0 8.332-3.738 8.332-8.332 2e-3 -0.501-0.406-0.908-0.909-0.908z"/>
                                    </svg>								
                                    {{ core()->getCurrentCurrencyCode() }}
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach (core()->getCurrentChannel()->currencies as $currency)
                                        <li>
                                            @if (isset($serachQuery))
                                                <a href="?{{ $serachQuery }}&currency={{ $currency->code }}" class="dropdown-item">{{ $currency->code }} ({{ $currency->symbol }})</a>
                                            @else
                                                <a href="?currency={{ $currency->code }}" class="dropdown-item">{{ $currency->code }} ({{ $currency->symbol }})</a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! view_render_event('bagisto.shop.layout.header.currency-item.after') !!}

                    </div>
                </div>
                <div class="col-auto d-none d-lg-block">
                    {!! view_render_event('bagisto.shop.layout.header.account-item.before') !!}

                    <ul class="nav">
                        @guest('customer')
                            <li class="nav-item"><a href="{{ route('customer.session.index') }}" class="nav-link text-black">{{ __('shop::app.header.sign-in') }}</a></li>
                            <li class="nav-item"><a href="{{ route('customer.register.index') }}" class="nav-link text-black">{{ __('shop::app.header.sign-up') }}</a></li>
                        @endguest

                        @auth('customer')
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link text-black dropdown-toggle" data-bs-toggle="dropdown">{{ auth()->guard('customer')->user()->first_name }}</a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('customer.profile.index') }}">{{ __('shop::app.header.profile') }}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('customer.wishlist.index') }}">{{ __('shop::app.header.wishlist') }}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.header.cart') }}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('customer.session.destroy') }}">{{ __('shop::app.header.logout') }}</a></li>
                                </ul>
                            </li>
                        @endauth
                    </ul>

                    {!! view_render_event('bagisto.shop.layout.header.account-item.after') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="header_middle py-3">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('shop.home.index') }}">
                    @if ($logo = core()->getCurrentChannel()->logo_url)
                        <img src="{{ $logo }}" alt="Logo">
                    @else
                        <img class="logo" src="{{asset('/themes/beshop/img/demo/Buynoir-2.png') }}" alt="Buynoir">
                    @endif
                </a>
                <button class="navbar-toggler collapsed text-dark border-0" type="button" data-bs-toggle="collapse" data-bs-target="#search-collapse"><i class="fas fa-search"></i></button>
                <div class="collapse navbar-collapse justify-content-between" id="search-collapse">
                    <form action="{{ route('shop.search.index') }}" method="GET" class="input-group mx-lg-4 mx-xl-5 mt-3 mt-lg-0">
                        @php
                            $categories = [];
                            foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
                                if ($category->slug) {
                                    array_push($categories, $category);
                                }
                            }
                        @endphp

                        <select class="form-select" name="cat">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{$category->slug}}" @if($cat == $category->slug) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        
                        <input type="search" class="form-control" name="term" value="{{ $term }}" placeholder="{{ __('shop::app.header.search-text') }}" required>
                        <button class="btn btn-primary text-white" type="submit"><i class="fas fa-search"></i></button>
                    </form>

                    <ul class="nav nav-wcc d-none d-lg-flex">
                        
                        @php
                            $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false
                        @endphp

                        @if($showWishlist)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.wishlist.index') }}">
                                    <span class="count" style="right: 16px" id="wishlist-items-count">0</span>
                                    <span class="icon">
                                        <svg width="20" height="20" fill="#00acc2" enable-background="new 293.364 356.469 25.271 22.484" version="1.1" viewBox="293.36 356.47 25.271 22.484" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m316.63 358.67c-1.308-1.419-3.103-2.2-5.055-2.2-1.459 0-2.795 0.461-3.971 1.371-0.593 0.459-1.131 1.021-1.605 1.676-0.474-0.655-1.012-1.217-1.605-1.676-1.176-0.909-2.512-1.371-3.971-1.371-1.952 0-3.747 0.781-5.055 2.2-1.293 1.402-2.005 3.318-2.005 5.395 0 2.137 0.796 4.094 2.506 6.157 1.53 1.846 3.728 3.719 6.274 5.889 0.869 0.741 1.855 1.581 2.878 2.475 0.27 0.237 0.617 0.367 0.977 0.367s0.707-0.13 0.977-0.367c1.023-0.895 2.009-1.735 2.879-2.476 2.546-2.169 4.744-4.043 6.274-5.889 1.71-2.063 2.506-4.02 2.506-6.157 1e-3 -2.076-0.711-3.992-2.004-5.394z"/>
                                        </svg>												
                                    </span>
                                    <span class="label">{{ __('shop::app.header.wishlist') }}</span>
                                </a>
                            </li>
                        @endif

                        {!! view_render_event('bagisto.shop.layout.header.comppare-item.before') !!}

                        @php
                            $showCompare = core()->getConfigData('general.content.shop.compare_option') == "1" ? true : false
                        @endphp

                        @if ($showCompare)
                            <li class="nav-item">
                                <a
                                
                                @auth('customer')
                                    href="{{ route('velocity.customer.product.compare') }}"
                                @endauth

                                @guest('customer')
                                    href="{{ route('velocity.product.compare') }}"
                                @endguest

                                class="nav-link">
                                    <span class="count" style="right: 18px" id="compare-items-count">0</span>
                                    <span class="icon">
                                        <svg width="20" height="20" fill="#00acc2" enable-background="new 0 0 21.138 21.138" version="1.1" viewBox="0 0 21.138 21.138" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m21.138 3.42c-1.988 1.166-3.868 2.268-5.84 3.426v-2.135c-1.116-0.236-1.177-0.201-1.543 0.787-1.581 4.269-3.171 8.535-4.732 12.812-0.173 0.474-0.411 0.619-0.89 0.594-0.736-0.038-1.476-0.01-2.259-0.01v2.245c-1.99-1.16-3.879-2.26-5.874-3.421 1.968-1.156 3.856-2.265 5.837-3.428v2.133c1.097 0.236 1.15 0.21 1.505-0.745 1.592-4.286 3.188-8.571 4.764-12.863 0.159-0.432 0.36-0.612 0.839-0.584 0.755 0.046 1.515 0.012 2.317 0.012v-2.243c1.989 1.157 3.878 2.258 5.876 3.42z"/>
                                            <path d="m15.267 21.137v-2.243c-0.836 0-1.632-0.018-2.427 7e-3 -0.373 0.012-0.548-0.111-0.672-0.471-0.374-1.083-0.798-2.149-1.189-3.227-0.062-0.172-0.119-0.392-0.064-0.55 0.376-1.081 0.783-2.151 1.231-3.361 0.21 0.547 0.375 0.966 0.531 1.389 0.366 0.983 0.726 1.969 1.092 2.953 0.356 0.957 0.358 0.957 1.482 0.836v-2.2c1.997 1.169 3.887 2.276 5.883 3.445-1.967 1.147-3.854 2.248-5.867 3.422z"/>
                                            <path d="m5.819 2.243c0.912 0 1.711 0.015 2.509-6e-3 0.342-9e-3 0.522 0.093 0.641 0.433 0.386 1.101 0.814 2.187 1.212 3.284 0.055 0.152 0.087 0.352 0.036 0.498-0.381 1.08-0.786 2.152-1.233 3.361-0.321-0.856-0.598-1.587-0.871-2.32-0.251-0.674-0.497-1.35-0.746-2.025-0.353-0.953-0.353-0.953-1.505-0.779v2.171c-1.99-1.168-3.879-2.275-5.86-3.437 1.971-1.15 3.849-2.247 5.818-3.397-1e-3 0.763-1e-3 1.447-1e-3 2.217z"/>
                                        </svg>											
                                    </span>
                                    <span class="label">{{ __('shop::app.customer.compare.text') }}</span>
                                </a>
                            </li>
                        @endif
                        
                        {!! view_render_event('bagisto.shop.layout.header.compare-item.after') !!}


                        {!! view_render_event('bagisto.shop.layout.header.cart-item.before') !!}

                        <li class="nav-item dropdown">
                            @include('shop::checkout.cart.mini-cart')
                        </li>

                        {!! view_render_event('bagisto.shop.layout.header.cart-item.after') !!}
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="header_bottom bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto">
                    @include('shop::layouts.header.nav-menu.sidemenu')
                </div>
                <div class="col">
                    @include('shop::layouts.header.nav-menu.navmenu')
                </div>
                <div class="col-auto d-none d-lg-block">
                    <ul class="nav fw-light">
                        <li class="nav-item">
                            <a class="nav-link" href="tel:0191000999"><i class="fas fa-phone-alt"></i> 0191000999</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->