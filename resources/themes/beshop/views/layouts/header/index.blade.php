<?php
    $term = request()->input('term');
    $cat = request()->input('cat');

    if (! is_null($term)) {
        $serachQuery = 'term='.request()->input('term');
    }
?>



<div class="header m-0" id="header">

    <div class="header_top py-2">
        <div class="container">
            <div class="row">
                <div class="col">

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
        
                    <div class="d-flex gap-3">
                        {!! view_render_event('bagisto.shop.layout.header.locale-item.before') !!}
                        @if (core()->getCurrentChannel()->locales->count() > 0)
                            <div class="dropdown">
                                <a href="#" class="text-black dropdown-toggle" data-bs-toggle="dropdown">
                                    @if (app()->getLocale() == 'en')
                                        <img src="{{ asset('/themes/beshop/assets/img/flags/english.png') }}" alt="English" class="me-1">
                                    @endif
                                    {{ core()->getCurrentLocale()->name }}
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach (core()->getCurrentChannel()->locales as $locale)
                                        <li>
                                            @if (isset($serachQuery))
                                                <a href="?{{ $serachQuery }}&locale={{ $locale->code }}" class="dropdown-item"></a>
                                            @else
                                                <a href="?locale={{ $locale->code }}" class="dropdown-item">{{ $locale->name }}</a>
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
                                <a href="#" class="text-black dropdown-toggle" data-bs-toggle="dropdown">
                                    <svg width="14" height="14" class="me-1" enable-background="new 188.343 188.631 17.968 17.392" version="1.1" viewBox="188.34 188.63 17.968 17.392" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m196.55 199.77c-0.437-0.118-0.828-0.333-1.101-0.606-0.118-0.118-0.275-0.183-0.443-0.183s-0.324 0.065-0.443 0.183l-0.048 0.048c-0.118 0.118-0.185 0.281-0.184 0.448s0.071 0.329 0.191 0.445c0.533 0.517 1.287 0.89 2.067 1.025l0.076 0.013v0.591c0 0.345 0.281 0.626 0.626 0.626h0.071c0.345 0 0.626-0.281 0.626-0.626v-0.605l0.074-0.014c1.295-0.247 2.068-1.056 2.068-2.164 0.011-1.507-1.105-2.057-2.079-2.368l-0.064-0.02v-2.03l0.111 0.024c0.287 0.063 0.543 0.159 0.741 0.278 0.097 0.058 0.209 0.089 0.322 0.089 0.218 0 0.416-0.11 0.532-0.294l0.032-0.051c0.088-0.141 0.117-0.315 0.078-0.477s-0.142-0.304-0.285-0.391c-0.399-0.242-0.915-0.42-1.453-0.502l-0.077-0.012v-0.447c0-0.345-0.281-0.626-0.626-0.626h-0.071c-0.345 0-0.626 0.281-0.626 0.626v0.48l-0.073 0.015c-1.197 0.241-1.911 0.992-1.911 2.008 0 1.088 0.629 1.829 1.922 2.268l0.062 0.021v2.259l-0.115-0.031zm1.438-1.805 0.128 0.056c0.507 0.223 0.695 0.472 0.691 0.923 0 0.375-0.235 0.642-0.699 0.795l-0.12 0.039v-1.813zm-1.458-1.916c-0.379-0.202-0.527-0.426-0.527-0.796 0-0.282 0.181-0.491 0.538-0.623l0.123-0.045v1.536l-0.134-0.072z"></path><path d="m206.09 191.8c-0.185-0.148-0.44-0.17-0.647-0.056l-1.23 0.678c-1.531-2.352-4.146-3.788-6.983-3.788-4.594 0-8.332 3.738-8.332 8.332 0 0.503 0.408 0.911 0.911 0.911s0.911-0.408 0.911-0.911c0-3.59 2.921-6.51 6.51-6.51 2.171 0 4.177 1.076 5.383 2.847l-1.152 0.635c-0.207 0.114-0.325 0.342-0.299 0.577s0.191 0.431 0.418 0.497l3.088 0.895c0.053 0.015 0.108 0.023 0.163 0.023 0.098 0 0.195-0.024 0.282-0.072 0.136-0.075 0.236-0.2 0.28-0.349l0.895-3.088c0.064-0.229-0.013-0.473-0.198-0.621z"></path><path d="m204.84 196.78c-0.503 0-0.911 0.408-0.911 0.911 0 3.59-2.921 6.51-6.511 6.51-2.171 0-4.177-1.076-5.383-2.847l1.152-0.635c0.207-0.114 0.325-0.342 0.299-0.577s-0.191-0.431-0.418-0.497l-3.088-0.895c-0.053-0.016-0.108-0.023-0.163-0.023-0.098 0-0.195 0.024-0.282 0.072-0.136 0.075-0.236 0.2-0.279 0.349l-0.895 3.088c-0.066 0.227 0.012 0.471 0.196 0.619 0.185 0.148 0.44 0.17 0.647 0.056l1.23-0.678c1.531 2.352 4.146 3.787 6.983 3.787 4.594 0 8.332-3.738 8.332-8.332 2e-3 -0.501-0.406-0.908-0.909-0.908z"></path></svg> {{ core()->getCurrentCurrencyCode() }}
                                </a>
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


                    <ul class="nav">

                        {!! view_render_event('bagisto.shop.layout.header.account-item.before') !!}

                        <li class="nav-item dropdown">
                            
                            <a href="#" data-bs-toggle="dropdown" class="dropdown-toggle text-black">
                                <i class="las la-user"></i>
                                <span class="name">{{ __('shop::app.header.account') }}</span>
                            </a>

                            @guest('customer')
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><h6 class="dropdown-header">{{ __('shop::app.header.title') }}</h6></li>
                                    <li><p class="dropdown-header">{{ __('shop::app.header.dropdown-text') }}</p></li>
                                    <li class="px-3 py-2 d-flex justify-content-between">
                                        <a class="btn btn-black btn-sm border-0" href="{{ route('customer.session.index') }}">{{ __('shop::app.header.sign-in') }}</a>
                                        <a class="btn btn-primary btn-sm border-0" href="{{ route('customer.register.index') }}">{{ __('shop::app.header.sign-up') }}</a>
                                    </li>
                                </ul>
                            @endguest

                            @auth('customer')
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><h6 class="dropdown-header">{{ auth()->guard('customer')->user()->first_name }}</h6></li>
                                    <li><a class="dropdown-item" href="{{ route('customer.profile.index') }}">{{ __('shop::app.header.profile') }}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('customer.wishlist.index') }}">{{ __('shop::app.header.wishlist') }}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('shop.checkout.cart.index') }}">{{ __('shop::app.header.cart') }}</a></li>
                                    <li><a class="dropdown-item" href="{{ route('customer.session.destroy') }}">{{ __('shop::app.header.logout') }}</a></li>
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
                                    <img class="logo" src="{{asset('/themes/cognite/assets/images/logo.svg') }}" />
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

                    <span class="search-box"><span class="icon icon-search" id="search"></span></span>

                    <ul class="right-content-menu">

                        {!! view_render_event('bagisto.shop.layout.header.comppare-item.before') !!}

                        @php
                            $showWishlist = core()->getConfigData('general.content.shop.wishlist_option') == "1" ? true : false
                        @endphp

                        @if($showWishlist)
                            <li class="compare-dropdown-container">
                                <a href="{{ route('customer.wishlist.index') }}" style="color: rgb(36, 36, 36);">
                                    <div>
                                        <i class="icon wishlist-icons"></i>
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
