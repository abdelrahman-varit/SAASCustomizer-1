<?php
    $term = request()->input('term');

    if (! is_null($term)) {
        $serachQuery = 'term='.request()->input('term');
    }
?>

<div class="header" id="header">


    <div class="top-bar">
        <div class="main-container-wrapper">
            <div class="header-top">
                <div class="left-content">

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
        
                    <div class="col-2 locale-img">
                        @if ($localeImage)
                            <img src="{{ asset('/storage/' . $localeImage) }}" onerror="this.src = '/themes/congnite/assets/images/icons/en.png'" height="13" />
                        @elseif (app()->getLocale() == 'en')
                            <img src="{{ asset('/themes/congnite/assets/images/icons/en.png') }}" height="13" />
                        @endif
                    </div>
                    
                    <ul class="left-content-menu">


                        {!! view_render_event('bagisto.shop.layout.header.locale-item.before') !!}

                        @if (core()->getCurrentChannel()->locales->count() > 1)
                            <li class="locale-switcher">
                                <span class="dropdown-toggle">
                                   
                                    {{ core()->getCurrentLocale()->name }} 

                                    <i class="icon arrow-down-icon"></i>
                                </span>

                                <ul class="dropdown-list locale">
                                    @foreach (core()->getCurrentChannel()->locales as $locale)
                                        <li>
                                            @if (isset($serachQuery))
                                                <a href="?{{ $serachQuery }}&locale={{ $locale->code }}" class="dropdown-item">
                                                   
                                                </a>
                                            @else
                                                <a href="?locale={{ $locale->code }}" class="dropdown-item">
                                                   
                                                    {{ $locale->name }}
                                                </a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        {!! view_render_event('bagisto.shop.layout.header.currency-item.after') !!}



                        {!! view_render_event('bagisto.shop.layout.header.currency-item.before') !!}

                        @if (core()->getCurrentChannel()->currencies->count() > 1)
                            <li class="currency-switcher">
                                <span class="dropdown-toggle">
                                    {{ core()->getCurrentCurrencyCode() }}

                                    <i class="icon arrow-down-icon"></i>
                                </span>

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


                    </ul>
                </div>

                <div class="right-content">


                    <ul class="right-content-menu">

                        


                        {!! view_render_event('bagisto.shop.layout.header.account-item.before') !!}

                        <li>
                            <span class="dropdown-toggle">
                                <i class="icon account-icons"></i>

                                <span class="name">{{ __('shop::app.header.account') }}</span>

                                <i class="icon arrow-down-icon"></i>
                            </span>

                            @guest('customer')
                                <ul class="dropdown-list account guest">
                                    <li>
                                        <div>
                                            <label style="color: #9e9e9e; font-weight: 700; text-transform: uppercase; font-size: 15px;">
                                                {{ __('shop::app.header.title') }}
                                            </label>
                                        </div>

                                        <div style="margin-top: 5px;">
                                            <span style="font-size: 12px;">{{ __('shop::app.header.dropdown-text') }}</span>
                                        </div>

                                        <div style="margin-top: 15px;">
                                            <a class="btn btn-dark btn-md" href="{{ route('customer.session.index') }}" style="color: #ffffff">
                                                {{ __('shop::app.header.sign-in') }}
                                            </a>

                                            <a class="btn btn-dark btn-md" href="{{ route('customer.register.index') }}" style="float: right; color: #ffffff">
                                                {{ __('shop::app.header.sign-up') }}
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            @endguest

                            @auth('customer')
                                <ul class="dropdown-list account customer">
                                    <li>
                                        <div>
                                            <label style="color: #9e9e9e; font-weight: 700; text-transform: uppercase; font-size: 15px;">
                                                {{ auth()->guard('customer')->user()->first_name }}
                                            </label>
                                        </div>

                                        <ul>
                                            <li>
                                                <a href="{{ route('customer.profile.index') }}">{{ __('shop::app.header.profile') }}</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('customer.wishlist.index') }}">{{ __('shop::app.header.wishlist') }}</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.header.cart') }}</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('customer.session.destroy') }}">{{ __('shop::app.header.logout') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @endauth
                        </li>

                        {!! view_render_event('bagisto.shop.layout.header.account-item.after') !!}


                    </ul>

                </div>
            </div>
        </div>
    </div>


    <div class="middle-bar">
        <div class="main-container-wrapper">
            <div class="header-top">

                <div class="left-content">
                    <ul class="logo-container">
                        <li>
                            <a href="{{ route('shop.home.index') }}">
                                @if ($logo = core()->getCurrentChannel()->logo_url)
                                    <img class="logo" src="{{ $logo }}" />
                                @else
                                    <img class="logo" src="{{ bagisto_asset('images/logo.svg') }}" />
                                @endif
                            </a>
                        </li>
                    </ul>

                    <ul class="search-container">
                        <li class="search-group">
                            <form role="search" action="{{ route('shop.search.index') }}" method="GET" style="display: inherit;">
                                
                                
                                @php

                                    $categories = [];

                                    foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
                                        if ($category->slug)
                                            array_push($categories, $category);
                                    }

                                @endphp

               
                        
                                <select>
                                    <option>All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->slug}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <input
                                    required
                                    name="term"
                                    type="search"
                                    value="{{ $term }}"
                                    class="search-field"
                                    placeholder="{{ __('shop::app.header.search-text') }}"
                                >

                                {{-- @php
                                    $showImageSearch = core()->getConfigData('general.content.shop.image_search') == "1" ? true : false
                                @endphp
                                @if($showImageSearch)
                                <image-search-component></image-search-component>
                                @endif --}}

                                <div class="search-icon-wrapper">

                                    <button class="" class="background: none;">
                                        <i class="icon icon-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="right-content">

                    <span class="search-box"><span class="icon icon-search" id="search"></span></span>

                    <ul class="right-content-menu">

                        {!! view_render_event('bagisto.shop.layout.header.comppare-item.before') !!}

                        @php
                            $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false
                        @endphp

                        @if ($showWishlist)
                            <li class="compare-dropdown-container">
                                <a href="{{ route('customer.wishlist.index') }}" style="color: rgb(36, 36, 36);">
                                    <div>
                                        <i class="icon wishlist-icons"></i>
                                        <span class="count">
                                            <span id="wishlist-items-count">0</span>
                                        </span>
                                    </div>
                                    <div>{{ __('shop::app.header.wishlist') }}</div></a>
                            </li>
                        @endif
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
                                    style="color: #242424;"
                                    >

                                    <div>
                                        <i class="icon compare-icons"></i>
                                        <span class="count">
                                            <span id="compare-items-count">0</span>
                                        </span>
                                    </div>
                                    <div><span class="name">
                                        {{ __('shop::app.customer.compare.text') }}
                                    </span></div>
                                </a>
                            </li>
                        @endif

                        {!! view_render_event('bagisto.shop.layout.header.compare-item.after') !!}

                        {{-- {!! view_render_event('bagisto.shop.layout.header.currency-item.before') !!}

                        @if (core()->getCurrentChannel()->currencies->count() > 1)
                            <li class="currency-switcher">
                                <span class="dropdown-toggle">
                                    {{ core()->getCurrentCurrencyCode() }}

                                    <i class="icon arrow-down-icon"></i>
                                </span>

                                <ul class="dropdown-list currency">
                                    @foreach (core()->getCurrentChannel()->currencies as $currency)
                                        <li>
                                            @if (isset($serachQuery))
                                                <a href="?{{ $serachQuery }}&currency={{ $currency->code }}">{{ $currency->code }}</a>
                                            @else
                                                <a href="?currency={{ $currency->code }}">{{ $currency->code }}</a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif

                        {!! view_render_event('bagisto.shop.layout.header.currency-item.after') !!} --}}


                        {{-- {!! view_render_event('bagisto.shop.layout.header.account-item.before') !!}

                        <li>
                            <span class="dropdown-toggle">
                                <i class="icon account-icon"></i>

                                <span class="name">{{ __('shop::app.header.account') }}</span>

                                <i class="icon arrow-down-icon"></i>
                            </span>

                            @guest('customer')
                                <ul class="dropdown-list account guest">
                                    <li>
                                        <div>
                                            <label style="color: #9e9e9e; font-weight: 700; text-transform: uppercase; font-size: 15px;">
                                                {{ __('shop::app.header.title') }}
                                            </label>
                                        </div>

                                        <div style="margin-top: 5px;">
                                            <span style="font-size: 12px;">{{ __('shop::app.header.dropdown-text') }}</span>
                                        </div>

                                        <div style="margin-top: 15px;">
                                            <a class="btn btn-primary btn-md" href="{{ route('customer.session.index') }}" style="color: #ffffff">
                                                {{ __('shop::app.header.sign-in') }}
                                            </a>

                                            <a class="btn btn-primary btn-md" href="{{ route('customer.register.index') }}" style="float: right; color: #ffffff">
                                                {{ __('shop::app.header.sign-up') }}
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            @endguest

                            @auth('customer')
                                <ul class="dropdown-list account customer">
                                    <li>
                                        <div>
                                            <label style="color: #9e9e9e; font-weight: 700; text-transform: uppercase; font-size: 15px;">
                                                {{ auth()->guard('customer')->user()->first_name }}
                                            </label>
                                        </div>

                                        <ul>
                                            <li>
                                                <a href="{{ route('customer.profile.index') }}">{{ __('shop::app.header.profile') }}</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('customer.wishlist.index') }}">{{ __('shop::app.header.wishlist') }}</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.header.cart') }}</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('customer.session.destroy') }}">{{ __('shop::app.header.logout') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @endauth
                        </li>

                        {!! view_render_event('bagisto.shop.layout.header.account-item.after') !!} --}}


                        {!! view_render_event('bagisto.shop.layout.header.cart-item.before') !!}

                        <li class="cart-dropdown-container">

                            @include('shop::checkout.cart.mini-cart')

                        </li>

                        {!! view_render_event('bagisto.shop.layout.header.cart-item.after') !!}

                    </ul>

                    <span class="menu-box" ><span class="icon icon-menu" id="hammenu"></span>
                </div>

            </div>
        </div>
    </div>

    <div class="header-bottom" id="header-bottom">
        @include('shop::layouts.header.nav-menu.navmenu')
    </div>

    <div class="search-responsive mt-10" id="search-responsive">
        <form role="search" action="{{ route('shop.search.index') }}" method="GET" style="display: inherit;">
            <div class="search-content">
                <button style="background: none; border: none; padding: 0px;">
                    <i class="icon icon-search"></i>
                </button>

                <image-search-component></image-search-component>

                <input type="search" name="term" class="search">
                <i class="icon icon-menu-back right"></i>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet"></script>

    <script type="text/x-template" id="image-search-component-template">
        <div>
            <label class="image-search-container" for="image-search-container">
                <i class="icon camera-icon"></i>

                <input type="file" id="image-search-container" ref="image_search_input" v-on:change="uploadImage()"/>

                <img id="uploaded-image-url" :src="uploaded_image_url"/>
            </label>
        </div>
    </script>

    <script>

        Vue.component('image-search-component', {

            template: '#image-search-component-template',

            data: function() {
                return {
                    uploaded_image_url: ''
                }
            },

            methods: {
                uploadImage: function() {
                    var imageInput = this.$refs.image_search_input;

                    if (imageInput.files && imageInput.files[0]) {
                        if (imageInput.files[0].type.includes('image/')) {
                            var self = this;

                            self.$root.showLoader();

                            var formData = new FormData();

                            formData.append('image', imageInput.files[0]);

                            axios.post("{{ route('shop.image.search.upload') }}", formData, {headers: {'Content-Type': 'multipart/form-data'}})
                                .then(function(response) {
                                    self.uploaded_image_url = response.data;

                                    var net;

                                    async function app() {
                                        var analysedResult = [];

                                        var queryString = '';

                                        net = await mobilenet.load();

                                        const imgElement = document.getElementById('uploaded-image-url');

                                        try {
                                            const result = await net.classify(imgElement);

                                            result.forEach(function(value) {
                                                queryString = value.className.split(',');

                                                if (queryString.length > 1) {
                                                    analysedResult = analysedResult.concat(queryString)
                                                } else {
                                                    analysedResult.push(queryString[0])
                                                }
                                            });
                                        } catch (error) {
                                            self.$root.hideLoader();

                                            window.flashMessages = [
                                                {
                                                    'type': 'alert-error',
                                                    'message': "{{ __('shop::app.common.error') }}"
                                                }
                                            ];

                                            self.$root.addFlashMessages();
                                        };

                                        local/Storage.searched_image_url = self.uploaded_image_url;

                                        queryString = local/Storage.searched_terms = analysedResult.join('_');

                                        self.$root.hideLoader();

                                        window.location.href = "{{ route('shop.search.index') }}" + '?term=' + queryString + '&image-search=1';
                                    }

                                    app();
                                })
                                .catch(function(error) {
                                    self.$root.hideLoader();

                                    window.flashMessages = [
                                        {
                                            'type': 'alert-error',
                                            'message': "{{ __('shop::app.common.error') }}"
                                        }
                                    ];

                                    self.$root.addFlashMessages();
                                });
                        } else {
                            imageInput.value = '';

                            alert('Only images (.jpeg, .jpg, .png, ..) are allowed.');
                        }
                    }
                }
            }
        });

    </script>

    <script>
        $(document).ready(function() {

            $('body').delegate('#search, .icon-menu-close, .icon.icon-menu', 'click', function(e) {
                toggleDropdown(e);
            });

            @auth('customer')
                @php
                    $compareCount = app('Webkul\Velocity\Repositories\VelocityCustomerCompareProductRepository')
                        ->count([
                            'customer_id' => auth()->guard('customer')->user()->id,
                        ]);
                @endphp

                let comparedItems = JSON.parse(local/Storage.getItem('compared_product'));
                $('#compare-items-count').html({{ $compareCount }});
            @endauth

            @guest('customer')
                let comparedItems = JSON.parse(local/Storage.getItem('compared_product'));
                $('#compare-items-count').html(comparedItems ? comparedItems.length : 0);
            @endguest

            function toggleDropdown(e) {
                var currentElement = $(e.currentTarget);

                if (currentElement.hasClass('icon-search')) {
                    currentElement.removeClass('icon-search');
                    currentElement.addClass('icon-menu-close');
                    $('#hammenu').removeClass('icon-menu-close');
                    $('#hammenu').addClass('icon-menu');
                    $("#search-responsive").css("display", "block");
                    $("#header-bottom").css("display", "none");
                } else if (currentElement.hasClass('icon-menu')) {
                    currentElement.removeClass('icon-menu');
                    currentElement.addClass('icon-menu-close');
                    $('#search').removeClass('icon-menu-close');
                    $('#search').addClass('icon-search');
                    $("#search-responsive").css("display", "none");
                    $("#header-bottom").css("display", "block");
                } else {
                    currentElement.removeClass('icon-menu-close');
                    $("#search-responsive").css("display", "none");
                    $("#header-bottom").css("display", "none");
                    if (currentElement.attr("id") == 'search') {
                        currentElement.addClass('icon-search');
                    } else {
                        currentElement.addClass('icon-menu');
                    }
                }
            }
        });
    </script>
@endpush
