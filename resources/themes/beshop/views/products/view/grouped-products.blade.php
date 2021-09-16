@if ($product->type == 'grouped')
    {!! view_render_event('bagisto.shop.products.view.grouped_products.before', ['product' => $product]) !!}

    
    @if ($product->grouped_products->count())
        @foreach ($product->grouped_products as $groupedProduct)
            @if($groupedProduct->associated_product->getTypeInstance()->isSaleable())
                <div class="row align-items-center mb-3">
                    <div class="col-6 fw-bold">
                        {{ $groupedProduct->associated_product->name }}
                        @include ('shop::products.price', ['product' => $groupedProduct->associated_product])
                    </div>
                    <div class="col-6">
                        <quantity-changer
                            :control-name="'qty[{{$groupedProduct->associated_product_id}}]'"
                            :validations="'required|numeric|min_value:0'"
                            quantity="{{ $groupedProduct->qty }}"
                            min-quantity="0">
                        </quantity-changer>
                    </div>
                </div>
            @endif
        @endforeach
    @endif

    {!! view_render_event('bagisto.shop.products.view.grouped_products.before', ['product' => $product]) !!}
@endif