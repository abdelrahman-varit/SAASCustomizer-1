<div class="footer-rt-content">
    <div class="payment-option">
        <div class="mb5 col-12 clearfix border-bottom">
            <h2>{{ __('velocity::app.home.payment-methods') }}</h2>
        </div>

        <div class="payment-methods col-12">
            @foreach(\Webkul\Payment\Facades\Payment::getPaymentMethods() as $method)
                <div class="method-sticker">
                    {{ $method['method_title'] }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="shipment-option">
        <div class="mb5 col-12">
            <h4 style="margin-bottom: 5px;">{{ __('velocity::app.home.shipping-methods') }}</h4>
        </div>

        <div class="shipping-methods col-12">
            @foreach(\Webkul\Shipping\Facades\Shipping::getShippingMethods() as $method)
                <div class="method-sticker">
                    {{ $method['method_title'] }}
                </div>
            @endforeach
        </div>
    </div>
</div>