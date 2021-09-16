@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

<?php $cart = cart()->getCart(); ?>
<a class="nav-link" href="{{ route('shop.checkout.cart.index') }}" data-bs-toggle="dropdown" data-bs-auto-close="outside">
    <span class="count" style="right: 5px" id="lbl-cart-count">{{ !empty($cart->items)>0?$cart->items->sum('quantity'):'0' }}</span>
    <span class="icon">
        <svg width="20" height="20" fill="#00acc2" enable-background="new 228.689 272 24.58 21.604" version="1.1" viewBox="228.69 272 24.58 21.604" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <path d="m236.66 286.4h13.01c0.322 0 0.605-0.213 0.692-0.522l2.881-10.082c0.062-0.217 0.02-0.451-0.117-0.631s-0.349-0.286-0.575-0.286h-17.553l-0.515-2.316c-0.073-0.33-0.366-0.564-0.703-0.564h-4.369c-0.398 0-0.72 0.322-0.72 0.72s0.322 0.72 0.72 0.72h3.791l2.6 11.702c-0.765 0.333-1.302 1.094-1.302 1.98 0 1.191 0.969 2.16 2.16 2.16h13.01c0.398 0 0.72-0.322 0.72-0.72s-0.322-0.72-0.72-0.72h-13.01c-0.397 0-0.72-0.323-0.72-0.72s0.324-0.721 0.72-0.721z"/>
            <path d="m235.94 291.44c0 1.191 0.969 2.16 2.161 2.16 1.191 0 2.16-0.969 2.16-2.16s-0.969-2.16-2.16-2.16c-1.192 0-2.161 0.969-2.161 2.16z"/>
            <path d="m246.07 291.44c0 1.191 0.969 2.16 2.16 2.16s2.16-0.969 2.16-2.16-0.969-2.16-2.16-2.16-2.16 0.969-2.16 2.16z"/>
        </svg>											
    </span>
    <span class="wcc-label">{{ __('shop::app.header.cart') }}</span>
</a>

@if ($cart)
    @php
        $items = $cart->items;
    @endphp
    <div class="dropdown-menu dropdown-menu-end" style="width: 400px">
        <div class="mini-cart pt-3">
            @if(!empty($items))
                <div class="mini-cart-item-list" id="bn-mini-carts">
                    @foreach ($items as $item)
                        <div class="cart-item px-3">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#" class="cart-item-thumb">
                                        @php
                                            $images = $item->product->getTypeInstance()->getBaseImage($item);
                                        @endphp
                                        <img src="{{ $images['small_image_url'] }}" alt="Thumbnail">
                                    </a>
                                </div>
                                <div class="col">
                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.name.before', ['item' => $item]) !!}
                                    
                                        {!! view_render_event('bagisto.shop.checkout.cart-mini.item.quantity.before', ['item' => $item]) !!}

                                            <p class="mb-1 fw-light"><a href="#" class="text-reset text-decoration-none">{{ $item->name }} <span class="fw-bold text-primary">x</span> {{ $item->quantity }}</a></p>
                                            
                                        {!! view_render_event('bagisto.shop.checkout.cart-mini.item.quantity.after', ['item' => $item]) !!}
                                    
                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.name.after', ['item' => $item]) !!}


                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.options.before', ['item' => $item]) !!}

                                    @if (isset($item->additional['attributes']))
                                        @foreach ($item->additional['attributes'] as $attribute)
                                            <strong>{{ $attribute['attribute_name'] }} :</strong> : {{ $attribute['option_label'] }}<br>
                                        @endforeach
                                    @endif

                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.options.after', ['item' => $item]) !!}


                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.price.before', ['item' => $item]) !!}
                                    
                                    <p class="text-dark m-0">{{ core()->currency($item->base_total) }}</p>

                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.price.after', ['item' => $item]) !!}
                                </div>
                                <div class="col-auto align-self-center">
                                    <button type="button" class="btn text-gray p-0 shadow-none" onclick="removeCartItem({{$item->id}}, this)"><i class="far fa-times-circle"></i></button>
                                </div>
                            </div>
                        </div>			
                        <hr class="my-2">
                    @endforeach
                </div>
            @else
                <div class="mini-cart-item-list">
                    <div class="cart-item px-3">
                        No Product in Cart
                    </div>			
                    <hr class="my-2">
                </div>
            @endif
        
            <div class="px-3 pt-3">
                <div class="row align-items-center">
                    <div class="col-auto"><h5 class="m-0">{{ __('shop::app.checkout.cart.cart-subtotal') }}:</h5></div>
                    <div class="col"><hr></div>
                    {!! view_render_event('bagisto.shop.checkout.cart-mini.subtotal.before', ['cart' => $cart]) !!}

                        <div class="col-auto">
                            <h5 class="m-0 text-primary" id="bn-mini-cart-grandTotal">{{ core()->currency($cart->base_sub_total) }}</h5>
                        </div>

                    {!! view_render_event('bagisto.shop.checkout.cart-mini.subtotal.after', ['cart' => $cart]) !!}
                    
                </div>
            </div>
            <div class="d-grid gap-2 pt-3 pe-3 ps-3 pb-2">
                <a href="{{ route('shop.checkout.cart.index') }}" class="btn btn-primary py-2 rounded-0 text-white">View Cart</a>
                <a href="{{ route('shop.checkout.onepage.index') }}" class="btn btn-dark py-2 rounded-0 text-white">{{ __('shop::app.minicart.checkout') }}</a>
            </div>
        </div>
    </div>
@else
    <div class="dropdown-menu dropdown-menu-end" style="width: 400px">
        <div class="mini-cart pt-3">
            <div class="mini-cart-item-list" id="bn-mini-carts">
                <div class="cart-item px-3">
                    No Product in Cart
                </div>			
                <hr class="my-2">
            </div>
            <div class="d-grid gap-2 pt-3 pe-3 ps-3 pb-2">
                <a href="{{ route('shop.checkout.cart.index') }}" class="btn btn-primary py-2 rounded-0 text-white">View Cart</a>
                <a href="{{ route('shop.checkout.onepage.index') }}" class="btn btn-dark py-2 rounded-0 text-white">{{ __('shop::app.minicart.checkout') }}</a>
            </div>
        </div>
    </div>
@endif

    
<script>
    function removeCartItem(cartItemID, currentCart){
        var animated = document.getElementById('animated-loader');
        var cartCount = 0;
        animated.style.display="block";
        var data = {
            _token : "{{csrf_token()}}",
            is_ajax:"1"
        };
        fetch("/checkout/cart/remove/"+cartItemID+"?is_ajax=1").then(response=>response.json()).then(data=>{
            console.log('response line: 22 - ',data);
            if(data.status=="success") {
                currentCart.parentElement.parentElement.remove();
                if(!data.data) {
                    document.getElementById('bn-mini-cart-grandTotal').innerHTML = "$0.00";
                    document.getElementById("lbl-cart-count").innerHTML = cartCount;
                    document.getElementById("bn-mini-carts").innerHTML = `<div class="cart-item px-3">No Product in Cart</div><hr class="my-2">`;
                }
            }
            
            if(data.data){
                var carts = data.data.items;
                
                var content = "";
                currentCart.parentElement.parentElement.remove();
                
                if(data.data && carts.length>0){
                    document.getElementById("lbl-cart-count").innerHTML = carts.length;
                    console.log('cart count: ', carts.length)
                    carts.forEach(item => {
                        content+=`
                        <div class="cart-item px-3">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#" class="cart-item-thumb">
                                        <img src="${item.product.images[0]?item.product.images[0].url:''}" alt="Product Thumbnail">
                                    </a>
                                </div>
                                <div class="col">
                                    <p class="mb-1 fw-light"><a href="#" class="text-reset text-decoration-none">${item.name} <span class="fw-bold text-primary">x</span> ${item.quantity}</a></p>
                                    <p class="text-dark fw-bold m-0">$${parseFloat(item.total).toFixed(2)}</p>
                                </div>
                                <div class="col-auto align-self-center">
                                    <button type="button" class="btn text-gray p-0" onclick="removeCartItem(${item.id}, this)"><i class="far fa-times-circle"></i></button>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2">`;
                        cartCount+=item.quantity;
                    });
                    console.log(content);
                    var lbl_count = document.getElementById("lbl-cart-count");
                    if(lbl_count){
                        lbl_count.innerHTML = cartCount;
                    }
                    document.getElementById("bn-mini-carts").innerHTML = content;
                    if(data.data.grand_total){
                        document.getElementById("bn-mini-cart-grandTotal").innerHTML = "$"+parseFloat(data.data.grand_total).toFixed(2);
                    }
                }else{
                    document.getElementById("bn-mini-carts").innerHTML = `<div class="cart-item px-3">No Product in Cart</div><hr class="my-2">`;
                    document.getElementById('bn-mini-cart-grandTotal').innerHTML = "$0.00";
                    document.getElementById("lbl-cart-count").innerHTML = cartCount;
                }  
            }
            
            showAlertMsg('alert-success', 'Product removed successfully!');
            if(animated){
                animated.style.display="none";
            }
        }).catch(error=>{
            console.log(error);
            if(animated) {
                animated.style.display="none";
            }
            showAlertMsg('alert-warning', 'Product removed problem, try again!');
        });
    }
</script>