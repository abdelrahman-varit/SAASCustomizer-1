{!! view_render_event('bagisto.shop.products.add_to_cart.before', ['product' => $product]) !!}

<button class="btn btn-bn" type="button" onclick="addTocartAjax()" {{ ! $product->isSaleable() ? 'disabled' : '' }}>
<i class="las la-shopping-cart"></i> &nbsp; {{ ($product->type == 'booking') ?  __('shop::app.products.book-now') :  __('shop::app.products.add-to-cart') }}
</button>
 

<!-- <button type="submit" class="btn btn-lg btn-primary addtocart" {{ ! $product->isSaleable() ? 'disabled' : '' }}>
    {{ ($product->type == 'booking') ?  __('shop::app.products.book-now') :  __('shop::app.products.add-to-cart') }}
</button>  -->

@if ($product->type == 'booking')

    @if ($bookingProduct = app('\Webkul\BookingProduct\Repositories\BookingProductRepository')->findOneByField('product_id', $product->product_id))
        
    @endif
@endif

<script>
    function addTocartAjax(){
        var animated = document.getElementById('animated-loader');
        var product_type = "{{$product->type}}";
        var bookingData = {date:'', slot:''};
        var data = {};
        var booking_type = "";
        if(product_type=="booking"){
            booking_type = "{{$bookingProduct->type}}";
            if(booking_type=="default" || booking_type=="appointment"){
                bookingData.date = document.getElementsByName('booking[date]')[0].value;
                bookingData.slot = document.getElementsByName('booking[slot]')[0].value;
                data = {
                '_token' : "{{csrf_token()}}",
                'is_buy_now' : "0",  
                'product_id' : "{{$product->product_id}}",
                'quantity' : document.getElementsByName("quantity")[0].value,
                'booking':{
                    'date':bookingData.date,
                    'slot':bookingData.slot
                },
                'is_ajax':"1"
                };

                if(!bookingData.date || !bookingData.slot){
                    alert("please select date & time slot for booking");
                    return false;
                }
            }else if(booking_type=="event"){
                var qty = {};

                var allQty = document.querySelectorAll("[name^='booking[qty]']");
                
                var qtyName = allQty[0].name.split('[')[2].split(']')[0];
                var qtyValue = allQty[0].value;
                qty[qtyName]=qtyValue;
                

                data = {
                '_token' : "{{csrf_token()}}",
                'is_buy_now' : "0",  
                'product_id' : "{{$product->product_id}}",
                'quantity' : document.getElementsByName("quantity")[0].value,
                'booking':{
                    'qty':qty
                },
                'is_ajax':"1"
                };

                if(!qty){
                    alert("please select data for booking");
                    return false;
                }
            }else if(booking_type=="table"){
                bookingData.date = document.getElementsByName('booking[date]')[0].value;
                bookingData.slot = document.getElementsByName('booking[slot]')[0].value;
                bookingData.note = document.getElementsByName('booking[note]')[0].value;
                data = {
                '_token' : "{{csrf_token()}}",
                'is_buy_now' : "0",  
                'product_id' : "{{$product->product_id}}",
                'quantity' : document.getElementsByName("quantity")[0].value,
                'booking':{
                    'date':bookingData.date,
                    'slot':bookingData.slot,
                    'note':bookingData.note,
                },
                'is_ajax':"1"
                };

                if(!bookingData.date || !bookingData.slot){
                    alert("please select date & time slot for booking");
                    return false;
                }
            }else if(booking_type=="rental"){
                var bookingDataTmp = {};
                if(document.getElementsByName('booking[renting_type]')[0].checked){
                    bookingDataTmp.renting_type = document.getElementsByName('booking[renting_type]')[0].value;
                }else if(document.getElementsByName('booking[renting_type]')[1].checked){
                    bookingDataTmp.renting_type = document.getElementsByName('booking[renting_type]')[1].value;
                }
                
                 if(bookingDataTmp.renting_type=="daily"){
                    bookingDataTmp.date_from = document.getElementsByName('booking[date_from]')[0].value;
                    bookingDataTmp.date_to = document.getElementsByName('booking[date_to]')[0].value;
                    if(!bookingDataTmp.date_from || !bookingDataTmp.date_to){
                    alert("please select date & time slot for booking");
                        return false;
                    }
                      
                    data = {
                    '_token' : "{{csrf_token()}}",
                    'is_buy_now' : "0",  
                    'product_id' : "{{$product->product_id}}",
                    'quantity' : document.getElementsByName("quantity")[0].value,
                    'booking':bookingDataTmp,
                    'is_ajax':"1"
                    };

                 }else if(bookingDataTmp.renting_type=="hourly"){
                    bookingDataTmp.date = document.getElementsByName('booking[date]')[0].value;
                    bookingDataTmp.slot = {    
                        from:document.getElementsByName('booking[slot][from]')[0].value,
                        to:document.getElementsByName('booking[slot][to]')[0].value
                        };
                    if(!bookingDataTmp.slot){
                        alert("please select date & time slot for booking");
                        return false;
                    }

                            
                        data = {
                        '_token' : "{{csrf_token()}}",
                        'is_buy_now' : "0",  
                        'product_id' : "{{$product->product_id}}",
                        'quantity' : document.getElementsByName("quantity")[0].value,
                        'booking':bookingDataTmp,
                        'is_ajax':"1"
                        };

                 }

               
             
                
            }
            

        }
        
        
        if(product_type=="grouped"){
            var qty = {};

            var allQty = document.querySelectorAll("[name^='qty']");
            var qntCount = allQty.length;
            for(var i=0;i<qntCount;i++){
                var qtyName = allQty[i].name.split('[')[1].split(']')[0];
                var qtyValue = allQty[i].value;
                qty[qtyName]=qtyValue;
            }
            data = {
            '_token'        : "{{csrf_token()}}",
            'is_buy_now'    : "0",  
            'product_id'    : "{{$product->product_id}}",
            'quantity'      : document.getElementsByName("quantity")[0].value,
            'qty'           : qty,
            'is_ajax'       :"1"
            };

        }
   
        if(product_type=="simple"){
            data = {
            '_token' : "{{csrf_token()}}",
            'is_buy_now' : "0",  
            'product_id' : "{{$product->product_id}}",
            'quantity' : document.getElementsByName("quantity")[0].value,
            'is_ajax':"1"
            };
        }

        if(product_type=="virtual"){
            data = {
            '_token' : "{{csrf_token()}}",
            'is_buy_now' : "0",  
            'product_id' : "{{$product->product_id}}",
            'quantity' : document.getElementsByName("quantity")[0].value,
            'is_ajax':"1"
            };
        }
   
        if(product_type=="downloadable"){
            var links = [document.getElementsByName("links[]")[0].value];
            data = {
            '_token' : "{{csrf_token()}}",
            'is_buy_now' : "0",  
            'product_id' : "{{$product->product_id}}",
            'quantity' : document.getElementsByName("quantity")[0].value,
            'links' : links,
            'is_ajax':"1"
            };

            if(!links){
                alert("please select download links");
                return false;
            }
        }
   
        if(product_type=="configurable"){

            var super_attribute = {};
            var allSuperAttr = document.querySelectorAll("[name^='super_attribute']");
            var superAttrCount = allSuperAttr.length;
            for(var i=0;i<superAttrCount;i++){
                var superName = allSuperAttr[i].name.split('[')[1].split(']')[0];
                var superValue = allSuperAttr[i].value;
                super_attribute[superName]=superValue;
            }

            data = {
            '_token' : "{{csrf_token()}}",
            'is_buy_now' : "0",  
            'product_id' : "{{$product->product_id}}",
            'quantity' : document.getElementsByName("quantity")[0].value,
            'selected_configurable_option' : document.getElementsByName("selected_configurable_option")[0].value,
            'super_attribute': super_attribute,
            'is_ajax':"1"
            };

            if(!super_attribute){
                alert("please select configuration product");
                return false;
            }

        }

        if(product_type=="bundle"){
            var bundle_options = {};
            var allBundleOpt = document.querySelectorAll("[name^='bundle_options']");
            var bundleOptCount = allBundleOpt.length;
            for(var i=0;i<bundleOptCount;i++){
                var bundleName = allBundleOpt[i].name.split('[')[1].split(']')[0];
                var bundleValue = allBundleOpt[i].value;
                bundle_options[bundleName]=[bundleValue];
            }
          
            data = {
            '_token' : "{{csrf_token()}}",
            'is_buy_now' : "0",  
            'product_id' : "{{$product->product_id}}",
            'quantity' : document.getElementsByName("quantity")[0].value,
            'bundle_options':bundle_options,
            'is_ajax':"1"
            };
            if(!bundle_options){
                alert("please select bundle product");
                return false;
            }
        }
   
       
        animated.style.display="block";
       
        fetch("{{ route('cart.add', $product->product_id) }}", {
                                    method:'POST',
                                    body:JSON.stringify(data), 
                                    headers: {"Content-type": "application/json"}
                                }).then(response=>response.json())
                                .then(data=>{
                                    console.log('response line: 22 - ',data);
                                    var cartCount = 0;
                                    if(data && data.data){
                                        var carts = data.data.items;
                                        var content = "";
                                        
                                        if(carts.length>0){
                                            
                                            carts.forEach(item => {
                                                content+=`<div class="item">
                                                                <div class="item-image">
                                                                    <img src="${item.product.images[0].url}" alt="product image">
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

                                    window.flashMessages = [{'type': 'alert-success', 'message': "Product is added to cart successfully!" }];

                                    if(animated){
                                        animated.style.display="none";
                                    }

                                })
                                .catch(error=>{
                                    if(animated){
                                        animated.style.display="none";
                                    }
                                    console.log(error);
                                });
    }
</script>

{!! view_render_event('bagisto.shop.products.add_to_cart.after', ['product' => $product]) !!}