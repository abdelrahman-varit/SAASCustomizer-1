<div class="form-container">
    <div class="form-header mb-30">
        <span class="checkout-step-heading">{{ __('shop::app.checkout.onepage.summary') }}</span>
    </div>

    <div class="address-summary">
        @if ($billingAddress = $cart->billing_address)
            <div class="billing-address">
                <div class="card-title mb-20">
                    <b>{{ __('shop::app.checkout.onepage.billing-address') }}</b>
                </div>

                <div class="card-content">
                    <ul>
                        <li class="mb-10">
                            {{ $billingAddress->company_name ?? '' }}
                        </li>
                        <li class="mb-10">
                            <b>{{ $billingAddress->first_name }} {{ $billingAddress->last_name }}</b>
                        </li>
                        <li class="mb-10">
                            {{ $billingAddress->address1 }},<br/> {{ $billingAddress->state }}
                        </li>
                        <li class="mb-10">
                            {{ core()->country_name($billingAddress->country) }} {{ $billingAddress->postcode }}
                        </li>

                        <span class="horizontal-rule mb-15 mt-15"></span>

                        <li class="mb-10">
                            {{ __('shop::app.checkout.onepage.contact') }} : {{ $billingAddress->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        @if ($cart->haveStockableItems() && $shippingAddress = $cart->shipping_address)
            <div class="shipping-address">
                <div class="card-title mb-20">
                    <b>{{ __('shop::app.checkout.onepage.shipping-address') }}</b>
                </div>

                <div class="card-content">
                    <ul>
                        <li class="mb-10">
                            {{ $shippingAddress->company_name ?? '' }}
                        </li>
                        <li class="mb-10">
                            <b>{{ $shippingAddress->first_name }} {{ $shippingAddress->last_name }}</b>
                        </li>
                        <li class="mb-10">
                            {{ $shippingAddress->address1 }},<br/> {{ $shippingAddress->state }}
                        </li>
                        <li class="mb-10">
                            {{ core()->country_name($shippingAddress->country) }} {{ $shippingAddress->postcode }}
                        </li>

                        <span class="horizontal-rule mb-15 mt-15"></span>

                        <li class="mb-10">
                            {{ __('shop::app.checkout.onepage.contact') }} : {{ $shippingAddress->phone }}
                        </li>
                    </ul>
                </div>
            </div>
        @endif

    </div>

    @inject ('productImageHelper', 'Webkul\Product\Helpers\ProductImage')

    <div class="order-items-review-table">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left" colspan="2">Items</th>
                    <th>{{ __('shop::app.checkout.onepage.price') }}</th>
                    <th>{{ __('shop::app.checkout.onepage.quantity') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->items as $item)
                    @php
                        $productBaseImage = $item->product->getTypeInstance()->getBaseImage($item);
                    @endphp
    
                    <tr>
                        <td width="100"><img src="{{ $productBaseImage['medium_image_url'] }}"></td>
                        <td>
                            {!! view_render_event('bagisto.shop.checkout.name.before', ['item' => $item]) !!}
    
                            {{ $item->product->name }}
    
                            {!! view_render_event('bagisto.shop.checkout.name.after', ['item' => $item]) !!}
    
                            {!! view_render_event('bagisto.shop.checkout.options.before', ['item' => $item]) !!}
    
                            @if (isset($item->additional['attributes']))
                                <div class="item-options">
                                    @foreach ($item->additional['attributes'] as $attribute)
                                        <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                    @endforeach
                                </div>
                            @endif
    
                            {!! view_render_event('bagisto.shop.checkout.options.after', ['item' => $item]) !!}
                        </td>
                        <td class="text-center">
                            {!! view_render_event('bagisto.shop.checkout.price.before', ['item' => $item]) !!}
    
                            {{ core()->currency($item->base_price) }}
    
                            {!! view_render_event('bagisto.shop.checkout.price.after', ['item' => $item]) !!}
                        </td>
                        <td class="text-center">
                            {!! view_render_event('bagisto.shop.checkout.quantity.before', ['item' => $item]) !!}
    
                            {{ $item->quantity }}
    
                            {!! view_render_event('bagisto.shop.checkout.quantity.after', ['item' => $item]) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="order-description mt-20">
        <div class="pull-left" style="width: 60%; float: left;">
            @if ($cart->haveStockableItems())
                <div class="shipping">
                    <div class="decorator">
                        <i class="icon shipping-icon"></i>
                    </div>

                    <div class="text">
                        {{ core()->currency($cart->selected_shipping_rate->base_price) }}

                        <div class="info">
                            {{ $cart->selected_shipping_rate->method_title }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="payment">
                <div class="decorator">
                    <i class="icon payment-icon"></i>
                </div>

                <div class="text">
                    {{ core()->getConfigData('sales.paymentmethods.' . $cart->payment->method . '.title') }}
                </div>
            </div>

        </div>

        <div class="pull-right" style="width: 40%; float: left;">
            <slot name="summary-section"></slot>
        </div>
    </div>
</div>