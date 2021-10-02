@extends('shop::layouts.master')

@section('page_title')
    {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
@stop

@section('seo')
    <meta name="description" content="{{ trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}"/>

    <meta name="keywords" content="{{ $product->meta_keywords }}"/>

    @if (core()->getConfigData('catalog.rich_snippets.products.enable'))
        <script type="application/ld+json">
            {!! app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product) !!}
        </script>
    @endif

    <?php $productBaseImage = app('Webkul\Product\Helpers\ProductImage')->getProductBaseImage($product); ?>

    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:title" content="{{ $product->name }}" />

    <meta name="twitter:description" content="{{ $product->description }}" />

    <meta name="twitter:image:alt" content="" />

    <meta name="twitter:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:type" content="og:product" />

    <meta property="og:title" content="{{ $product->name }}" />

    <meta property="og:image" content="{{ $productBaseImage['medium_image_url'] }}" />

    <meta property="og:description" content="{{ $product->description }}" />

    <meta property="og:url" content="{{ route('shop.productOrCategory.index', $product->url_key) }}" />
@stop
 
@section('content-wrapper')

    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}

    <div class="main-container-wrapper bn-product-details">
        <section class="product-detail">

            <div class="layouter">
                <product-view>
                    <div class="form-container">
                        @csrf()

                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">

                        @include ('shop::products.view.gallery')

                        <div class="details">

                            <div class="product-heading">
                                <span>{{ $product->name }}</span>
                            </div>

                            <div class="product-ratings">
                                @inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
                                @if ($total = $reviewHelper->getTotalReviews($product))
                                <div class="review-info">

                                    <span class="number">
                                        {{ $reviewHelper->getAverageRating($product) }}
                                    </span>
                    
                                    <span class="stars">
                                        @for ($i = 1; $i <= 5; $i++)
                    
                                          @if($i <= round($reviewHelper->getAverageRating($product)))
                                            <span class="icon star-icon"></span>
                                          @else
                                            <span class="icon star-icon-blank"></span>
                                          @endif
                    
                                        @endfor
                                    </span>
                    
                                    <div class="total-reviews">
                                        {{ __('shop::app.products.total-reviews', ['total' => $total]) }}
                                    </div>
                    
                                </div>
                                @else
                                    <img src="{{asset('/themes/aretha-franklin/assets/images/icons/rating-black.png')}}" style="height:13px;width:13px"/>
                                    <img src="{{asset('/themes/aretha-franklin/assets/images/icons/rating-black.png')}}" style="height:13px;width:13px"/>
                                    <img src="{{asset('/themes/aretha-franklin/assets/images/icons/rating-black.png')}}" style="height:13px;width:13px"/>
                                    <img src="{{asset('/themes/aretha-franklin/assets/images/icons/rating-black.png')}}" style="height:13px;width:13px"/>
                                    <img src="{{asset('/themes/aretha-franklin/assets/images/icons/rating-black.png')}}" style="height:13px;width:13px"/>
                                    <div class="total-reviews">
                                        {{ __('shop::app.products.total-reviews', ['total' => $total]) }}
                                    </div>
                                @endif
                            
                            </div>


                            <div class="short-description">
                                {!! $product->short_description !!}
                            </div>

                            <div class="others-information" style="margin-top:30px">

                              
                                    @include ('shop::products.view.brand')                                     
                             


                                <div class="others-information-row" >
                                    <div class="other-info-title" >Availability :</div>
                                    <div  class="other-info-value" >
                                        @include ('shop::products.view.stock', ['product' => $product])
                                    </div>
                                </div>  
                                
                                <div class="others-information-row" >
                                    <div class="other-info-title" >Effective Price :</div>
                                    <div  class="other-info-value" >
                                        @include ('shop::products.price', ['product' => $product])
                                    </div>
                                </div>

                                <!-- <div class="others-information-row" >
                                    <div class="other-info-title" >Material :</div>
                                    <div  class="other-info-value" >Wood</div>
                                </div> -->

                                <div class="others-information-row">
                                    <div class="other-info-title" >{{ __('shop::app.products.quantity') }} :</div>
                                    <div  class="other-info-value" >
                                        @if ($product->getTypeInstance()->showQuantityBox())
                                            <quantity-changer></quantity-changer>
                                        @else
                                            <input type="hidden" name="quantity" value="1">
                                        @endif
                                    </div>
                                </div> 
                                
                                {!! view_render_event('bagisto.shop.products.view.short_description.before', ['product' => $product]) !!}


                                {!! view_render_event('bagisto.shop.products.view.short_description.after', ['product' => $product]) !!}


                                {!! view_render_event('bagisto.shop.products.view.quantity.before', ['product' => $product]) !!}

                            

                                {!! view_render_event('bagisto.shop.products.view.quantity.after', ['product' => $product]) !!}


                                @include ('shop::products.view.configurable-options')

                                @include ('shop::products.view.downloadable')
    
                                @include ('shop::products.view.grouped-products')
    
                                @include ('shop::products.view.bundle-options')
    
                                
                               
                                
                                <div class="others-information-row" style="display:none" >
                                    <div class="other-info-title" >Subtotal :</div>
                                    <div  class="other-info-value" id="subtotal-value" > 
                                        
                                    </div>
                                </div>

                                <div class="bn-product-details-btn-container add-to-buttons">
                                   
                                    @include ('shop::products.view.product-add')

                                </div>

                                {!! view_render_event('bagisto.shop.products.view.description.before', ['product' => $product]) !!}
    
                                {!! view_render_event('bagisto.shop.products.view.description.after', ['product' => $product]) !!}

                                

                                {{-- <div class="" style="align-items:center;display:flex;flex-direction:row;gap:30px;margin-top:25px;">
                                    <div class="other-info-title" >Share with us :</div>
                                    <div  class="other-info-value"  style="flex:0 0 70%;gap:30px;">
                                    <a href="#"><img src="{{asset('/themes/aretha-franklin/assets/images/facebook-round.png')}}" style="height:32px;width:32px;vertical-align:middle"/></a> &nbsp; 
                                    <a href="#"><img src="{{asset('/themes/aretha-franklin/assets/images/linkedin-round.png')}}" style="height:32px;width:32px;vertical-align:middle"/></a> &nbsp; 
                                    <a href="#"><img src="{{asset('/themes/aretha-franklin/assets/images/twitter-round.png')}}" style="height:32px;width:32px;vertical-align:middle"/></a> &nbsp; 
                                    <a href="#"><img src="{{asset('/themes/aretha-franklin/assets/images/pinterest-round.png')}}" style="height:32px;width:32px;vertical-align:middle"/></a> &nbsp; 
                                    </div>
                                </div> --}}

                            </div>

                        </div>
                    </div>
                </product-view>

                <div class="bn-tab-panel">
                    <div class="tab">
                        <button class="tablinks active" onclick="openCity(event, 'description')" type="button">Description</button>
                        <button class="tablinks" onclick="openCity(event, 'more_info')"  type="button">More Info</button>
                        {{-- <button class="tablinks" onclick="openCity(event, 'tags')"  type="button">Tags</button> --}}
                        <button class="tablinks" onclick="openCity(event, 'reviews')"  type="button">Reviews</button>
                    </div>

                    <div id="description" class="tabcontent" style="display: block;">
                        {!! $product->description !!}
                    </div>

                    <div id="more_info" class="tabcontent">
                        <p>{!! $product->short_description !!}</p> 
                    </div>

                    {{-- <div id="tags" class="tabcontent">
                        <p>Tags list</p>
                    </div> --}}

                    <div id="reviews" class="tabcontent">
                        @include ('shop::products.view.reviews')

                        @include ('shop::products.review', ['product' => $product])

                            
                    </div>
                </div><!-- end bn-tab-panel -->


            </div>

            @include ('shop::products.view.related-products')

            @include ('shop::products.view.up-sells')

        </section>
    </div>

    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}
@endsection

@push('scripts')


    <script>
        function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }
    </script>


    <script type="text/x-template" id="product-view-template">
        <form method="POST" id="product-form" action="{{ route('cart.add', $product->product_id) }}" @click="onSubmit($event)">

            <input type="hidden" name="is_buy_now" v-model="is_buy_now">

            <slot></slot>

        </form>
    </script>

    <script type="text/x-template" id="quantity-changer-template">
        <div class="quantity control-group" :class="[errors.has(controlName) ? 'has-error' : '']">

            <button type="button" class="decrease" @click="decreaseQty()">-</button>

            <input :name="controlName" class="control" :value="qty" :v-validate="validations" data-vv-as="&quot;{{ __('shop::app.products.quantity') }}&quot;" readonly>

            <button type="button" class="increase" @click="increaseQty()">+</button>

            <span class="control-error" v-if="errors.has(controlName)">@{{ errors.first(controlName) }}</span>
        </div>
    </script>

    <script>

        Vue.component('product-view', {

            template: '#product-view-template',

            inject: ['$validator'],

            data: function() {
                return {
                    is_buy_now: 0,
                }
            },

            methods: {
                onSubmit: function(e) {
                    if (e.target.getAttribute('type') != 'submit')
                        return;

                    e.preventDefault();

                    var this_this = this;

                    this.$validator.validateAll().then(function (result) {
                        if (result) {
                            this_this.is_buy_now = e.target.classList.contains('buynow') ? 1 : 0;

                            setTimeout(function() {
                                document.getElementById('product-form').submit();
                            }, 0);
                        }
                    });
                }
            }
        });

        Vue.component('quantity-changer', {
            template: '#quantity-changer-template',

            inject: ['$validator'],

            props: {
                controlName: {
                    type: String,
                    default: 'quantity'
                },

                quantity: {
                    type: [Number, String],
                    default: 1
                },

                minQuantity: {
                    type: [Number, String],
                    default: 1
                },

                validations: {
                    type: String,
                    default: 'required|numeric|min_value:1'
                }
            },

            data: function() {
                return {
                    qty: this.quantity
                }
            },

            watch: {
                quantity: function (val) {
                    this.qty = val;

                    this.$emit('onQtyUpdated', this.qty)
                }
            },

            methods: {
                decreaseQty: function() {
                    if (this.qty > this.minQuantity)
                        this.qty = parseInt(this.qty) - 1;

                    this.$emit('onQtyUpdated', this.qty)
                    var product_type = "{{$product->type}}";
                    if(product_type=="simple"){
                        var productPrice = document.getElementById('product-price').innerHTML ;
                        productPrice = productPrice.substr(1,productPrice.length) ;
                        var totalPrice = this.qty * productPrice; 
                        document.getElementById('subtotal-value').innerHTML = '$'+totalPrice.toFixed(2);
                    }

                    if(product_type=="bundle"){
                        var priceDiv = document.getElementsByClassName('bundle-price')[0];
                        console.log(priceDiv);
                        var productPrice = priceDiv.innerHTML.substr(1,priceDiv.innerHTML.length) ;
                        productPrice = productPrice.substr(1,productPrice.length) ;
                        var totalPrice = this.qty * productPrice; 
                        document.getElementById('subtotal-value').innerHTML = '$'+totalPrice.toFixed(2);
                    }
                     
                },

                increaseQty: function() {
                    this.qty = parseInt(this.qty) + 1;

                    this.$emit('onQtyUpdated', this.qty)
                    var product_type = "{{$product->type}}";
                    if(product_type=="simple"){
                        var productPrice = document.getElementById('product-price').innerHTML ;
                        productPrice = productPrice.substr(1,productPrice.length) ;
                        var totalPrice = this.qty * productPrice; 
                        document.getElementById('subtotal-value').innerHTML = '$'+totalPrice.toFixed(2);
                    }

                    if(product_type=="bundle"){
                        var priceDiv = document.getElementsByClassName('bundle-price')[0];
                        console.log(priceDiv);
                        var productPrice = priceDiv.innerHTML.substr(1,priceDiv.innerHTML.length) ;
                        productPrice = productPrice.substr(1,productPrice.length) ;
                        var totalPrice = this.qty * productPrice; 
                        document.getElementById('subtotal-value').innerHTML = '$'+totalPrice.toFixed(2);
                    }
                     
                }
            }
        });

        $(document).ready(function() {
            var addTOButton = document.getElementsByClassName('add-to-buttons')[0];
            document.getElementById('loader').style.display="none";
            addTOButton.style.display="flex";
        });

        window.onload = function() {
            var thumbList = document.getElementsByClassName('thumb-list')[0];
            var thumbFrame = document.getElementsByClassName('thumb-frame');
            var productHeroImage = document.getElementsByClassName('product-hero-image')[0];

            if (thumbList && productHeroImage) {

                for(let i=0; i < thumbFrame.length ; i++) {
                    thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                    thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                }

                if (screen.width > 720) {
                    thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                    thumbList.style.height = productHeroImage.offsetHeight + "px";
                }
            }

            window.onresize = function() {
                if (thumbList && productHeroImage) {

                    for(let i=0; i < thumbFrame.length; i++) {
                        thumbFrame[i].style.height = (productHeroImage.offsetHeight/4) + "px";
                        thumbFrame[i].style.width = (productHeroImage.offsetHeight/4)+ "px";
                    }

                    if (screen.width > 720) {
                        thumbList.style.width = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.minWidth = (productHeroImage.offsetHeight/4) + "px";
                        thumbList.style.height = productHeroImage.offsetHeight + "px";
                    }
                }
            }

            //recentlyViewed
            let currentProductId = '{{ $product->url_key }}';
                let existingViewed = window.localStorage.getItem('recentlyViewed');

                if (! existingViewed) {
                    existingViewed = [];
                } else {
                    existingViewed = JSON.parse(existingViewed);
                }
 
                if (existingViewed.indexOf(currentProductId) == -1) {
                    existingViewed.push(currentProductId);

                    if (existingViewed.length > 4)
                        existingViewed = existingViewed.slice(Math.max(existingViewed.length - 4, 1));

                    window.localStorage.setItem('recentlyViewed', JSON.stringify(existingViewed));
                } else {
                    var uniqueNames = [];

                    $.each(existingViewed, function(i, el){
                        if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
                    });

                    uniqueNames.push(currentProductId);

                    uniqueNames.splice(uniqueNames.indexOf(currentProductId), 1);

                    window.localStorage.setItem('recentlyViewed', JSON.stringify(uniqueNames));
                }

                var product_type = "{{$product->type}}";
                if(product_type=="simple"){
                    var productPriceDiv = document.getElementById('product-price') ;
                    var productPrice = productPriceDiv.innerHTML ;
                    productPrice = productPrice.substr(1,productPrice.length) ;
                    var totalPrice = 1 * productPrice; 
                    document.getElementById('subtotal-value').innerHTML = "$"+productPrice;
                
                }
                
              
        };
    </script>
@endpush
