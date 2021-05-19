{!! view_render_event('bagisto.shop.products.add_to_cart.before', ['product' => $product]) !!}

<button class="btn btn-bn" type="button" onclick="addTocart()" {{ ! $product->isSaleable() ? 'disabled' : '' }}>
    <i class="las la-shopping-cart"></i> &nbsp; {{ ($product->type == 'booking') ?  __('shop::app.products.book-now') :  __('shop::app.products.add-to-cart') }}
</button>
 

<script>
    function addTocart(){
        var animated = document.getElementById('animated-loader');
        animated.style.display="block";
        var data = {
            _token : "{{csrf_token()}}",
            is_buy_now : "0",  
            product_id : "{{$product->product_id}}",
            quantity : document.getElementsByName("quantity")[0].value,
            is_ajax:"1"
        };
        fetch("{{ route('cart.add', $product->product_id) }}", {
                                    method:'POST',
                                    body:JSON.stringify(data), 
                                    headers: {"Content-type": "application/json; charset=UTF-8"}
                                }).then(response=>response.json()).then(data=>{
                                    console.log('response line: 22 - ',data.data.items);
                                    var cartCount = 0;
                                    if(data.data){
                                        var carts = data.data.items;
                                        var content = "";
                                        
                                        if(carts.length>0){
                                            
                                            carts.forEach(item => {
                                                content+=`<div class="item">
                                                                <div class="item-image">
                                                                    <img src="http://storebd.sellnoir.devs/cache/small/product/95/ntviGp7larfpr3Njhb35yIOT4VunggQ41n388iGw.jpeg">
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
                                    if(animated){
                                        animated.style.display="none";
                                    }

                                }).catch(error=>{
                                    if(animated){
                                        animated.style.display="none";
                                    }
                                    console.log(error);
                                });
    }
</script>

{!! view_render_event('bagisto.shop.products.add_to_cart.after', ['product' => $product]) !!}