<?php
    $term = request()->input('term');
    $cat = request()->input('cat');

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
                            <img src="{{ asset('/storage/' . $localeImage) }}" onerror="this.src = '/themes/pattie-labelle/assets/images/icons/en.png'" height="13" />
                        @elseif (app()->getLocale() == 'en')
                            <img src="{{ asset('/themes/pattie-labelle/assets/images/icons/en.png') }}" height="13" />
                        @endif
                    </div>
                    
                    <ul class="left-content-menu">


                        {!! view_render_event('bagisto.shop.layout.header.locale-item.before') !!}

                        @if (core()->getCurrentChannel()->locales->count() > 0)
                            <li class="locale-switcher">
                                <span class="dropdown-toggle">
                                   
                                    {{ core()->getCurrentLocale()->name }} 

                                    {{-- <i class="icon arrow-down-icon"></i> --}}
                                    <i class="las la-angle-down"></i>
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

                        @if (core()->getCurrentChannel()->currencies->count() > 0)
                            <li class="currency-switcher">
                                <span class="dropdown-toggle">
                                    {{ core()->getCurrentCurrencyCode() }}

                                    {{-- <i class="icon arrow-down-icon"></i> --}}

                                    <i class="las la-angle-down"></i>
                                </span>

                                <ul class="dropdown-list currency">
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
                                {{-- <i class="icon account-icons"></i> --}}
                                <i class="las la-user"></i>

                                <span class="name">{{ __('shop::app.header.account') }}</span>

                                {{-- <i class="icon arrow-down-icon"></i> --}}

                                    <i class="las la-angle-down"></i>
                            </span>

                            @guest('customer')
                                <ul class="dropdown-list account guest">
                                    <li>
                                        <div style="text-transform: uppercase; font-weight: bold">{{ __('shop::app.header.title') }}</div>
                                        <div>{{ __('shop::app.header.dropdown-text') }}</div>
                                        <div style="display: flex; justify-content: space-between; margin-top: 1rem">
                                            <a class="btn btn-primary btn-md text-white" href="{{ route('customer.session.index') }}">{{ __('shop::app.header.sign-in') }}</a>
                                            <a class="btn btn-black btn-md text-white" href="{{ route('customer.register.index') }}">{{ __('shop::app.header.sign-up') }}</a>
                                        </div>
                                    </li>
                                </ul>
                            @endguest

                            @auth('customer')
                                <ul class="dropdown-list account customer">
                                    <li>
                                        <div style="text-transform: uppercase; font-weight: bold">{{ auth()->guard('customer')->user()->first_name }}</div>
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
                    <span class="menu-box"><span class="icon icon-menu" id="hammenu"></span></span>
                    <ul class="logo-container">
                        <li>
                            <a href="{{ route('shop.home.index') }}">
                                @if ($logo = core()->getCurrentChannel()->logo_url)
                                    <img class="logo" src="{{ $logo }}" />
                                @else
                                    <img class="logo" src="{{asset('/themes/pattie-labelle/assets/images/logo.svg') }}" />
                                @endif
                            </a>
                        </li>
                    </ul>

                    <ul class="search-container">
                        <li class="search-group">
                            <form role="search" action="{{ route('shop.search.index') }}" method="GET">
                                
                                
                                @php

                                    $categories = [];

                                    foreach (app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category) {
                                        if ($category->slug)
                                            array_push($categories, $category);
                                    }

                                @endphp

               
                        
                                <select name="cat">
                                    <option>All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->slug}}" @if($cat == $category->slug) selected @endif>{{$category->name}}</option>
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
                                        {{-- <i class="icon icon-search"></i> --}}
                                        <i class="las la-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="right-content">

                    <span class="search-box">
                        <span class="icon icon-search" id="search"></span>
                        <span class="search-name">Search</span>
                    </span>

                    <ul class="right-content-menu">

                        {!! view_render_event('bagisto.shop.layout.header.comppare-item.before') !!}

                        @php
                            $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false
                        @endphp

                        @if($showWishlist)
                            <li class="compare-dropdown-container">
                                <a href="{{ route('customer.wishlist.index') }}">
                                    <div>
                                        <i class="las la-heart"></i>
                                        <span class="count">
                                            <span id="wishlist-items-count">0</span>
                                        </span>
                                    </div>
                                    <div><span class="name">{{ __('shop::app.header.wishlist') }}</span></div></a>
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
                                    >

                                    <div>
                                        <i class="las la-sync"></i>
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

                 

                        {!! view_render_event('bagisto.shop.layout.header.cart-item.before') !!}

                        <li class="cart-dropdown-container">

                            @include('shop::checkout.cart.mini-cart')

                        </li>

                        {!! view_render_event('bagisto.shop.layout.header.cart-item.after') !!}

                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="search-responsive mt-10" id="search-responsive">
        <form role="search" action="{{ route('shop.search.index') }}" method="GET">
            <div class="search-content">
                <button>
                    <i class="las la-search"></i>
                </button>

                <image-search-component></image-search-component>

                <input type="search" placeholder="{{ __('shop::app.header.search-text') }}" name="term" class="search">
                <i class="las la-angle-left"></i>
            </div>
        </form>
    </div>

    <div class="header-bottom" id="header-bottom">
        @include('shop::layouts.header.nav-menu.navmenu')
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet"></script>

    <script type="text/x-template" id="image-search-component-template">
        <div style="display:none">
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

                                        localStorage.searched_image_url = self.uploaded_image_url;

                                        queryString = localStorage.searched_terms = analysedResult.join('_');

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
