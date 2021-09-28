@inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

<?php $cart = cart()->getCart(); ?>

<div class="dropdown-toggle">
    <div>
        <a class="cart-link" href="{{ route('shop.checkout.cart.index') }}">
            <span class="las la-shopping-cart"></span>
        </a>
        <span>
            <span class="count" id="lbl-cart-count"> 
                {{ !empty($cart->items)>0?$cart->items->sum('quantity'):'0' }}
            </span>
        </span>
    </div>
    <div>
        <span class="name">{{ __('shop::app.header.cart') }}</span>
    </div>

    {{-- <i class="icon arrow-down-icon"></i> --}}
</div>

@if ($cart)
    <?php $items = $cart->items; ?>
    <div class="dropdown-list" style="display: none; top: 70px; right: 0px;">
        <div class="dropdown-container">
            <div class="dropdown-cart">
                <div class="dropdown-content" id="bn-mini-carts">
                    @if(!empty($items))
                        @foreach ($items as $item)

                            <div class="item">
                                <div class="item-image" >
                                    @php
                                        $images = $item->product->getTypeInstance()->getBaseImage($item);
                                    @endphp
                                    <img src="{{ $images['small_image_url'] }}" />
                                </div>

                                <div class="item-details">
                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.name.before', ['item' => $item]) !!}

                                    <div class="item-name">{{ $item->name }}</div>

                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.name.after', ['item' => $item]) !!}


                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.options.before', ['item' => $item]) !!}

                                    @if (isset($item->additional['attributes']))
                                        <div class="item-options">

                                            @foreach ($item->additional['attributes'] as $attribute)
                                                <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                            @endforeach

                                        </div>
                                    @endif

                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.options.after', ['item' => $item]) !!}


                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.price.before', ['item' => $item]) !!}

                                    <div class="item-price"><b>{{ core()->currency($item->base_total) }}</b></div>

                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.price.after', ['item' => $item]) !!}


                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.quantity.before', ['item' => $item]) !!}

                                    <div class="item-qty">Quantity - {{ $item->quantity }}</div>

                                    {!! view_render_event('bagisto.shop.checkout.cart-mini.item.quantity.after', ['item' => $item]) !!}
                                </div>

                                <div class="item-remove">
                                    <button type="button" onclick="removeCartItem({{$item->id}}, this)"><i class="las la-times"></i></button>
                                </div>

                            </div>

                        @endforeach
                    @else
                        <div class="item">
                            <div class="item-details">
                                <div class="item-name">No Product on Cart List</div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="dropdown-footer">
                    <p class="heading">
                        <span id="gr-heading">{{ __('shop::app.checkout.cart.cart-subtotal') }}</span> -

                        {!! view_render_event('bagisto.shop.checkout.cart-mini.subtotal.before', ['cart' => $cart]) !!}

                        <b id="bn-mini-cart-grandTotal">{{ core()->currency($cart->base_sub_total) }}</b>

                        {!! view_render_event('bagisto.shop.checkout.cart-mini.subtotal.after', ['cart' => $cart]) !!}
                    </p>                
                </div>

                <div class="dropdown-footer">
                    <a class="btn btn-primary btn-md" href="{{ route('shop.checkout.onepage.index') }}"><i class="las la-check-circle"></i> &nbsp; {{ __('shop::app.minicart.checkout') }}</a>
                    <a class="btn btn-black btn-md" href="{{ route('shop.checkout.cart.index') }}"><i class="las la-shopping-cart"></i> &nbsp; {{ __('shop::app.minicart.view-cart') }}</a>                    
                </div>
            </div>
        </div>
    </div>

@else

    {{-- <div class="dropdown-toggle" >
        <div style="display: inline-block; cursor: pointer;">
            <div>
                <span class="icon cart-icon"></span>
                <span class="count"> {{ __('shop::app.minicart.zero') }} </span>
            </div>
            <div><span class="name">{{ __('shop::app.minicart.cart') }}</span></div>
            
        </div>
    </div> --}}

    <div class="dropdown-list" style="display: none; top: 70px; right: 0px;">
        <div class="dropdown-container">
            <div class="dropdown-cart">
                <div class="dropdown-content" id="bn-mini-carts">
                    <div class="item">
                        <div class="item-details">
                            <div class="item-name">No Product on Cart List</div>
                        </div>
                    </div>

                </div>

                <div class="dropdown-footer">
                    <p class="heading">
                        <span id="gr-heading">{{ __('shop::app.checkout.cart.cart-subtotal') }}</span> -
                        <b id="bn-mini-cart-grandTotal">0.00</b>
                    </p>                
                </div>

                <div class="dropdown-footer">
                    <a class="btn btn-primary btn-md" href="{{ route('shop.checkout.onepage.index') }}"><i class="las la-check-circle"></i> &nbsp; {{ __('shop::app.minicart.checkout') }}</a>
                    <a class="btn btn-black btn-md" href="{{ route('shop.checkout.cart.index') }}"><i class="las la-shopping-cart"></i> &nbsp; {{ __('shop::app.minicart.view-cart') }}</a>                    
                </div>
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
                                    if(data.status=="success"){
                                        currentCart.parentElement.parentElement.remove();
                                        if(!data.data){
                                            document.getElementById('bn-mini-cart-grandTotal').innerHTML = "$0.00";
                                            document.getElementById("lbl-cart-count").innerHTML = cartCount;
                                            document.getElementById("bn-mini-carts").innerHTML = `<div class="item">
                                                    <div class="item-details">
                                                        <div class="item-name">No Product on Cart List</div>
                                                    </div>
                                                </div>`;
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
                                                content+=`<div class="item">
                                                                <div class="item-image">
                                                                    <img src="${item.product.images[0]?item.product.images[0].url:''}" alt="product image">
                                                                </div> 
                                                                <div class="item-details">
                                                                    <div class="item-name">${item.name}</div> 
                                                                    <div class="item-price"><b>$ ${parseFloat(item.total).toFixed(2)}</b></div> 
                                                                    <div class="item-qty">Quantity - ${item.quantity}</div>
                                                                </div>
                                                                <div class="item-remove">
                                                                    <button type="button" class="" onclick="removeCartItem(${item.id}, this)">x</button>
                                                                </div>
                                                            </div>`;
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
                                            document.getElementById("bn-mini-carts").innerHTML = `<div class="item">
                                                <div class="item-details">
                                                    <div class="item-name">No Product on Cart List</div>
                                                </div>
                                            </div>`;
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
                                    if(animated){
                                        animated.style.display="none";
                                    }

                                    showAlertMsg('alert-warning', 'Product removed problem, try again!');

                                });
    }
</script>
 