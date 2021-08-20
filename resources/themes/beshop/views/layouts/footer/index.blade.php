@include('shop::layouts.footer.newsletter-subscription')

<!-- Footer Start -->
<div class="footer fw-light">
	<div class="footer_top bg-dark text-gray py-5">
		<div class="container py-5">
			@include('shop::layouts.footer.footer-links')
			@include('shop::layouts.footer.animated-loader')
		</div>
	</div>

	@if (core()->getConfigData('general.content.footer.footer_toggle'))
		<div class="footer_bottom">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="footer_bottom__copyright text-center text-gray my-3">
							@if (core()->getConfigData('general.content.footer.footer_content'))
								{{ core()->getConfigData('general.content.footer.footer_content') }}
							@else
								{!! trans('admin::app.footer.copy-right') !!}
							@endif
						</p>
					</div>
				</div>
			</div>
		</div>
	@endif

</div>
<!-- Footer End -->