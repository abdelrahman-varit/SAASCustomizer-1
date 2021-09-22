@if (
    $velocityMetaData
    && $velocityMetaData->subscription_bar_content
    || core()->getConfigData('customer.settings.newsletter.subscription')
    )
    
    @if (core()->getConfigData('customer.settings.newsletter.subscription'))
        <div class="newsletter-subscription">
            <div class="main-container-wrapper">
                <form action="{{ route('shop.subscribe') }}">
                    <div class="control-group">
                        <input type="email" name="subscriber_email" class="control" placeholder="{{ __('velocity::app.customer.login-form.your-email-address') }}" required>
                        <button type="submit">{{ __('shop::app.subscription.subscribe') }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endif
