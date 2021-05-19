@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.cart.title') }}
@stop

@section('content-wrapper')
    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')
<div class="main-container-wrapper">
    <section class="cart">
        @if ($cart)
            <div class="title">
                {{ __('shop::app.checkout.cart.title') }}
            </div>

            <div class="cart-content">
                <div class="left-side">
                    <form action="{{ route('shop.checkout.cart.update') }}" method="POST" @submit.prevent="onSubmit">
                        @csrf

                        <div class="cart-item-list" style="margin-top: 0">
                            @if($cart->items)
                                <div class="single-item">
                                    <div class="item" style="margin-top: 0; padding-top: 0; margin-bottom: 0; padding-bottom: 0; font-weight: bold; color: black; font-size: 18px;">
                                        <div class="item-image" style="border: none">Product</div>
                                        <div class="item-details">
                                            <div class="item-title"></div>
                                            <div class="price">Price</div>
                                            <div class="misc" style="justify-content: center">Qty</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            @foreach ($cart->items as $key => $item)
                                @php
                                    $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);

                                    if (is_null ($item->product->url_key)) {
                                        if (! is_null($item->product->parent)) {
                                            $url_key = $item->product->parent->url_key;
                                        }
                                    } else {
                                        $url_key = $item->product->url_key;
                                    }
                                @endphp

                                <div class="single-item">
                                    <div class="item">
                                        <div class="item-image" style="margin-right: 15px;">
                                            <a href="{{ route('shop.productOrCategory.index', $url_key) }}"><img src="{{ $productBaseImage['medium_image_url'] }}" /></a>
                                        </div>

                                        <div class="item-details">

                                            {!! view_render_event('bagisto.shop.checkout.cart.item.name.before', ['item' => $item]) !!}

                                            <div class="item-title">
                                                <a href="{{ route('shop.productOrCategory.index', $url_key) }}">
                                                    {{ $item->product->name }}
                                                </a>
                                            </div>

                                            {!! view_render_event('bagisto.shop.checkout.cart.item.name.after', ['item' => $item]) !!}


                                            {!! view_render_event('bagisto.shop.checkout.cart.item.price.before', ['item' => $item]) !!}

                                            <div class="price">
                                                {{ core()->currency($item->base_price) }}
                                            </div>

                                            {!! view_render_event('bagisto.shop.checkout.cart.item.price.after', ['item' => $item]) !!}


                                            {!! view_render_event('bagisto.shop.checkout.cart.item.options.before', ['item' => $item]) !!}

                                            @if (isset($item->additional['attributes']))
                                                <div class="item-options">

                                                    @foreach ($item->additional['attributes'] as $attribute)
                                                        <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                                    @endforeach

                                                </div>
                                            @endif

                                            {!! view_render_event('bagisto.shop.checkout.cart.item.options.after', ['item' => $item]) !!}


                                            {!! view_render_event('bagisto.shop.checkout.cart.item.quantity.before', ['item' => $item]) !!}

                                            <div class="misc">
                                                @if ($item->product->getTypeInstance()->showQuantityBox() === true)
                                                    <quantity-changer
                                                        :control-name="'qty[{{$item->id}}]'"
                                                        :productid="'{{$item->id}}'"
                                                        quantity="{{$item->quantity}}">
                                                    </quantity-changer>
                                                @endif
                                            </div>

                                            {!! view_render_event('bagisto.shop.checkout.cart.item.quantity.after', ['item' => $item]) !!}

                                            @if (! cart()->isItemHaveQuantity($item))
                                                <div class="error-message mt-15">
                                                    * {{ __('shop::app.checkout.cart.quantity-error') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="item-footer">
                                        @auth('customer')
                                            <span class="towishlist">
                                                @if ($item->parent_id != 'null' ||$item->parent_id != null)
                                                    <a href="{{ route('shop.movetowishlist', $item->id) }}" onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">{{ __('shop::app.checkout.cart.move-to-wishlist') }}</a>
                                                @else
                                                    <a href="{{ route('shop.movetowishlist', $item->child->id) }}" onclick="removeLink('{{ __('shop::app.checkout.cart.cart-remove-action') }}')">{{ __('shop::app.checkout.cart.move-to-wishlist') }}</a>
                                                @endif
                                            </span>
                                        @endauth
                                        <span class="remove">
                                            <a href="#" onclick="removeCart('{{$item->id}}',this)"><i class="las la-pencil-alt"></i></a>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {!! view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]) !!}

                        <div class="misc-controls">
                            <a href="{{ route('shop.home.index') }}" class="link btn">{{ __('shop::app.checkout.cart.continue-shopping') }}</a>
                            @if ($cart->hasProductsWithQuantityBox())
                                <button type="submit" class="btn btn-lg btn-primary" id="update_cart_button">
                                    {{ __('shop::app.checkout.cart.update-cart') }}
                                </button>
                            @endif
                        </div>

                        <div class="cart-coupon-box">
                            <h3>Apply Discount Code</h3>
                            <coupon-component></coupon-component>
                        </div>

                        {!! view_render_event('bagisto.shop.checkout.cart.controls.after', ['cart' => $cart]) !!}
                    </form>
                </div>

                <div class="right-side">
                    {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}
                    
                    <div class="order-summary-wrapper">
                        @include('shop::checkout.total.summary', ['cart' => $cart])

                        @if (! cart()->hasError())
                            <a href="{{ route('shop.checkout.onepage.index') }}" class="btn btn-lg btn-primary">
                                {{ __('shop::app.checkout.cart.proceed-to-checkout') }}
                            </a>
                        @endif
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.cart.summary.after', ['cart' => $cart]) !!}
                </div>
            </div>

            @include ('shop::products.view.cross-sells')

        @else

            <div class="title">
                {{ __('shop::app.checkout.cart.title') }}
            </div>

            <div class="cart-content">
                <p>
                    {{ __('shop::app.checkout.cart.empty') }}
                </p>

                <p style="display: inline-block;">
                    <a style="display: inline-block;" href="{{ route('shop.home.index') }}" class="btn btn-lg btn-primary">{{ __('shop::app.checkout.cart.continue-shopping') }}</a>
                </p>
            </div>

        @endif
    </section>
</div>
@endsection

@push('scripts')
    @include('shop::checkout.cart.coupon')

    <script type="text/x-template" id="quantity-changer-template">
        <div class="quantity control-group" :class="[errors.has(controlName) ? 'has-error' : '']">
            <div class="wrap">
                <label>{{ __('shop::app.products.quantity') }}</label>

                <button type="button" class="decrease" @click="decreaseQty(productid)">-</button>

                <input :name="controlName" id="qty-box" :data-product-id="productid" class="control" :value="qty" v-validate="'required|numeric|min_value:1'" data-vv-as="&quot;{{ __('shop::app.products.quantity') }}&quot;" readonly>

                <button type="button" class="increase" @click="increaseQty(productid)">+</button>

                <span class="control-error" v-if="errors.has(controlName)">@{{ errors.first(controlName) }}</span>
            </div>
        </div>
    </script>

    <script>
        Vue.component('quantity-changer', {
            template: '#quantity-changer-template',

            inject: ['$validator'],

            props: {
                controlName: {
                    type: String,
                    default: 'quantity'
                },
                productid:"",
                quantity: {
                    type: [Number, String],
                    default: 1
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
                decreaseQty: function(productIDs) {
                    if (this.qty > 1)
                        this.qty = parseInt(this.qty) - 1;
                    var loader = document.getElementById('animated-loader');
                    loader.style.display = "block";
                    this.$emit('onQtyUpdated', this.qty)
                    var qtyBox = document.getElementById('qty-box');
                    var productID = qtyBox.getAttribute('data-product-id');
                    
                    var data = {
                        _token: "{{csrf_token()}}",
                        is_ajax:1,
                        qty:this.qty,
                        product:productIDs
                    };
               
                    this.$http.post('{{route("shop.checkout.cart.update")}}',data).then(response=>{
                        console.log(response.data);
                        if(response.data.status=="success"){
                            var cart = response.data.data;
                            document.getElementById('summary-item-qty').innerHTML =  parseInt(cart.items_qty);
                            document.getElementById('summary-sub-total').innerHTML = "$" + parseFloat(cart.base_sub_total).toFixed(2);
                            document.getElementById('grand-total-amount-detail').innerHTML = "$" + parseFloat(cart.base_grand_total).toFixed(2);
                        }
                        loader.style.display = "none";
                    });
                },

                increaseQty: function(productIDs) {
                    this.qty = parseInt(this.qty) + 1;

                    this.$emit('onQtyUpdated', this.qty)
                    var qtyBox = document.getElementById('qty-box');
                    var productID = qtyBox.getAttribute('data-product-id');
                    var loader = document.getElementById('animated-loader');
                    loader.style.display = "block";
                    var data = {
                        _token: "{{csrf_token()}}",
                        is_ajax:1,
                        qty:this.qty,
                        product:productIDs
                    };
               
                    this.$http.post('{{route("shop.checkout.cart.update")}}',data).then(response=>{
                        console.log(response.data);
                        if(response.data.status=="success"){
                            var cart = response.data.data;
                            document.getElementById('summary-item-qty').innerHTML = parseInt(cart.items_qty);
                            document.getElementById('summary-sub-total').innerHTML = "$" + parseFloat(cart.base_sub_total).toFixed(2);
                            document.getElementById('grand-total-amount-detail').innerHTML = "$" + parseFloat(cart.base_grand_total).toFixed(2);
                        }
                        loader.style.display = "none";

                    }).catch(error=>{
                        console.log(error);
                        loader.style.display = "none";
                    });
                }
            }
        });

        function removeLink(message) {
            if (!confirm(message))
            event.preventDefault();
        }

        function removeCart(itemid, currentElement) {
            if (!confirm('Do you want to remove from cart')){
                event.preventDefault();
                return false;
            }else{
                var loader = document.getElementById('animated-loader');
                loader.style.display = "block";
                fetch("/checkout/cart/remove/"+itemid+"?is_ajax=1").then(response=>response.json()).then(data=>{
                    console.log(data);
                    if(data.status=="success"){
                        var cart = data.data;
                        if(cart){
                            document.getElementById('summary-item-qty').innerHTML = parseInt(cart.items_qty);
                            document.getElementById('summary-sub-total').innerHTML = "$" + parseFloat(cart.base_sub_total).toFixed(2);
                            document.getElementById('grand-total-amount-detail').innerHTML = "$" + parseFloat(cart.base_grand_total).toFixed(2);
                            var curEl = currentElement.parentElement.parentElement.parentElement;
                            if(curEl){
                                curEl.remove();
                            }
                        }else{
                            location.reload();
                        }
                    }
                    loader.style.display = "none";
                }).catch(error=>{
                    console.log(error);
                    loader.style.display = "none";
                });
            }
        }

        function updateCartQunatity(operation, index) {
            var quantity = document.getElementById('cart-quantity'+index).value;

            if (operation == 'add') {
                quantity = parseInt(quantity) + 1;
            } else if (operation == 'remove') {
                if (quantity > 1) {
                    quantity = parseInt(quantity) - 1;
                } else {
                    alert('{{ __('shop::app.products.less-quantity') }}');
                }
            }
            document.getElementById('cart-quantity'+index).value = quantity;
            event.preventDefault();
        }
    </script>
@endpush






@push('css')
    <style type="text/css">
        .cart{
            padding: 15px;
        }
    </style>
@endpush