<!-- Newsletter Start -->
    @if ($velocityMetaData && $velocityMetaData->subscription_bar_content || core()->getConfigData('customer.settings.newsletter.subscription'))
        <div class="newsletter py-4 bg-primary">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="newsletter_heading text-white mb-3 mb-lg-0 text-center text-lg-start">Sign Up For Newsletters</h2>
                    </div>
                    <div class="col-lg-6">
                        @if (core()->getConfigData('customer.settings.newsletter.subscription'))
                            <form action="{{ route('shop.subscribe') }}">
                                <div class="input-group">
                                    <input type="email" class="form-control" name="subscriber_email" placeholder="{{ __('velocity::app.customer.login-form.your-email-address') }}" required>
                                    <button class="btn btn-dark px-4 py-2" type="submit">{{ __('shop::app.subscription.subscribe') }}</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
<!-- Newsletter End -->