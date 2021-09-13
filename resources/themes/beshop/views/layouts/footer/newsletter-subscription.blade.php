@if (
    $velocityMetaData
    && $velocityMetaData->subscription_bar_content
    || core()->getConfigData('customer.settings.newsletter.subscription')
    )
    
    @if (core()->getConfigData('customer.settings.newsletter.subscription'))
        <div class="newsletter py-4 bg-primary">
            <div class="container">
                <div class="row align-items-center">
					<div class="col-lg-6">
						<h2 class="newsletter_heading text-white mb-3 mb-lg-0 text-center text-lg-start">Sign Up For Newsletters</h2>
					</div>
					<div class="col-lg-6">
						<form action="{{ route('shop.subscribe') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="subscriber_email" class="form-control" placeholder="{{ __('velocity::app.customer.login-form.your-email-address') }}" required>
                                <button type="submit" class="btn btn-dark px-4 py-2">{{ __('shop::app.subscription.subscribe') }}</button>
                            </div>
                        </form>
					</div>
				</div>
            </div>
        </div>
    @endif
@endif
