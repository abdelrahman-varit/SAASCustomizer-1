<div class="col-lg-4">
    <div class="footer_top_widget">
        <h4 class="footer_top_widget__heading">{{ __('velocity::app.home.payment-methods') }}</h4>
        <div class="row">
            <div class="col small">
                @foreach(\Webkul\Payment\Facades\Payment::getPaymentMethods() as $method)
                    <span class="d-inline-block border py-1 px-3 mt-1">{{ $method['method_title'] }}</span>
                @endforeach
            </div>
        </div>
        <br>
        <h4 class="footer_top_widget__heading">{{ __('velocity::app.home.shipping-methods') }}</h4>
        <div class="row">
            <div class="col small">
                @foreach(\Webkul\Shipping\Facades\Shipping::getShippingMethods() as $method)
                    <span class="d-inline-block border py-1 px-3 mt-1">{{ $method['method_title'] }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>