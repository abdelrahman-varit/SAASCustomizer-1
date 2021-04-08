<form data-vv-scope="payment-form" class="payment-form">
    <div class="form-container">
        <accordian :title="'{{ __('shop::app.checkout.payment-methods') }}'" :active="true">
            <div class="form-header mb-30" slot="header">
                
                <h3 class="fw6 display-inbl">
                   {{ __('shop::app.checkout.onepage.payment-methods') }}
                </h3>

                <i class="rango-arrow"></i>
            </div>

            <div class="payment-methods bg-light p-4" slot="body">
                <div class="row">
                @foreach ($paymentMethods as $payment)

                    {!! view_render_event('bagisto.shop.checkout.payment-method.before', ['payment' => $payment]) !!}

                    <div class="col-6 mb-4">
                        <div>
                            <label class="radio-container" style="position: absolute;">
                                <input
                                    type="radio"
                                    name="payment[method]"
                                    v-validate="'required'"
                                    v-model="payment.method"
                                    @change="methodSelected()"
                                    id="{{ $payment['method'] }}"
                                    value="{{ $payment['method'] }}"
                                    data-vv-as="&quot;{{ __('shop::app.checkout.onepage.payment-method') }}&quot;" />

                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="pl40">
                            <div class="row">
                                <span class="payment-method method-label">
                                    <b>{{ $payment['method_title'] }}</b>
                                </span>
                            </div>

                            <div class="row">
                                <span class="method-summary">{{ __($payment['description']) }}</span>
                            </div>

                            <?php $additionalDetails = \Webkul\Payment\Payment::getAdditionalDetails($payment['method']); ?>

                            @if (! empty($additionalDetails))
                                <div class="instructions" v-show="payment.method == '{{$payment['method']}}'">
                                    <label>{{ $additionalDetails['title'] }}</label>
                                    <p>{{ $additionalDetails['value'] }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    {!! view_render_event('bagisto.shop.checkout.payment-method.after', ['payment' => $payment]) !!}

                @endforeach
                </div>
                <span class="control-error" v-if="errors.has('payment-form.payment[method]')">
                    @{{ errors.first('payment-form.payment[method]') }}
                </span>
            </div>
        </accordian>
    </div>
</form>