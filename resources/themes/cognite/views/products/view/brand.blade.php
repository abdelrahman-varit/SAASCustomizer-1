@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

{!! view_render_event('bagisto.shop.products.view.attributes.before', ['product' => $product]) !!}

@if ($customAttributeValues = $productViewHelper->getAdditionalData($product))
    
       
 
                @foreach ($customAttributeValues as $attribute)
                    <div class="others-information-row" >
                        @if ($attribute['label']=="Brand" && !empty($attribute['value']))
                            <div  class="other-info-title brand" style="padding-bottom:15px">{{ $attribute['admin_name'] }} :</div>
                        @elseif ($attribute['label']=="Color" && !empty($attribute['value']))
                            <div class="other-info-title others" >{{ $attribute['label'] }}:</div>
                        @elseif ($attribute['label']=="Size" && !empty($attribute['value']))
                            <div class="other-info-title others" >{{ $attribute['label'] }}:</div>
                        @elseif ($attribute['label']!="Size")
                            <div class="other-info-title others" >{{ $attribute['label'] }}:</div>
                        @endif
                        @if ($attribute['type'] == 'file' && $attribute['value'])
                            <div class="other-info-value file" >
                                <a  href="{{ route('shop.product.file.download', [$product->product_id, $attribute['id']])}}">
                                    <i class="icon sort-down-icon download"></i>
                                </a>
                            </div>
                        @elseif ($attribute['type'] == 'image' && $attribute['value'])
                            <div class="other-info-value image" >
                                <a href="{{ route('shop.product.file.download', [$product->product_id, $attribute['id']])}}">
                                    <img src="{{ Storage::url($attribute['value']) }}" style="height: 20px; width: 20px;"/>
                                </a>
                            </div>
                      
                        
                        @else
                            <div class="other-info-value others" >{{ $attribute['value'] }}</div>
                        @endif
                  </div>
                @endforeach

        
  
@endif

{!! view_render_event('bagisto.shop.products.view.attributes.after', ['product' => $product]) !!}
