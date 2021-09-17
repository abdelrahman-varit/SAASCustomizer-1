<!-- Start Footer Area -->
<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<a href="index.html" class="logo">
						<svg xmlns="http://www.w3.org/2000/svg" width="130" height="34.126" viewBox="0 3.026 130 34.126" fill="#fff" xmlns:v="https://vecta.io/nano"><path d="M9.632 4.091c5.089 0 8.033 2.975 8.033 6.979 0 2.682-1.672 4.886-3.78 5.583 2.326.551 4.58 2.718 4.58 6.098 0 4.261-3.198 7.383-8.069 7.383H0V4.091h9.632zm-.909 10.432c1.999 0 3.308-1.065 3.308-2.828 0-1.69-1.127-2.792-3.38-2.792H5.597v5.62h3.126zm.473 10.874c2.217 0 3.562-1.175 3.562-3.049 0-1.8-1.309-3.049-3.562-3.049H5.597v6.098h3.599zm22.185 2.9c-.945 1.58-3.017 2.241-4.834 2.241-4.398 0-6.869-3.233-6.869-7.126V11.877h5.525v10.359c0 1.763.945 3.159 2.908 3.159 1.854 0 3.017-1.286 3.017-3.122V11.877h5.525v14.987a28.73 28.73 0 0 0 .182 3.269h-5.307c-.074-.33-.147-1.359-.147-1.836zm9.485 8.854l4.107-9.477-7.596-15.795h6.179l4.398 9.771 3.998-9.771h5.852L46.682 37.151h-5.816zm34.214-7.016L64.467 13.017v17.118H58.76V4.091h6.979l9.668 15.832V4.091h5.743v26.044h-6.07zm26.806-9.146c0 5.657-4.18 9.698-9.596 9.698-5.379 0-9.596-4.041-9.596-9.698s4.216-9.661 9.596-9.661c5.416 0 9.596 4.004 9.596 9.661zm-5.524 0c0-3.086-1.963-4.518-4.071-4.518-2.072 0-4.071 1.433-4.071 4.518 0 3.049 1.999 4.555 4.071 4.555 2.108 0 4.071-1.47 4.071-4.555zm9.747-17.963c1.817 0 3.271 1.469 3.271 3.269s-1.454 3.269-3.271 3.269c-1.745 0-3.199-1.469-3.199-3.269s1.454-3.269 3.199-3.269zm-2.726 27.109V11.879h5.525v18.257h-5.525zm19.64-12.746c-.618-.147-1.2-.184-1.745-.184-2.217 0-4.216 1.322-4.216 4.959v7.971h-5.525V11.879h5.343v2.461c.945-2.057 3.235-2.645 4.689-2.645.545 0 1.09.073 1.454.184v5.51zm3.969 6.766c1.65 0 3.008 1.357 3.008 3.008s-1.357 2.972-3.008 2.972a2.96 2.96 0 0 1-2.972-2.972c0-1.651 1.321-3.008 2.972-3.008z"/></svg>
					</a>
					<p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>

					<ul class="social-link">
						<li><a href="https://www.facebook.com/BuyNoirApp/" class="d-block" target="_blank"><i class='bx bxl-facebook'></i></a></li>
						<li><a href="https://twitter.com/NoirBuy" class="d-block" target="_blank"><i class='bx bxl-twitter'></i></a></li>
						<li><a href="https://www.instagram.com/buynoir_official/" class="d-block" target="_blank"><i class='bx bxl-instagram'></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget pl-5">
					<h3>Explore</h3>

					<ul class="footer-links-list">
						<li><a href="/">Home</a></li>
						<li><a href="/">About</a></li>
						<li><a href="/">Pricing</a></li>
						<li><a href="/">Portfolio</a></li>
						<li><a href="/">Contact</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget pl-2">
					<h3>Resources</h3>

					<ul class="footer-links-list">
						<li><a href="/">Team</a></li>
						<li><a href="/">Contact</a></li>
						<li><a href="/">Services</a></li>
						<li><a href="/">FAQ</a></li>
						<li><a href="/">Blog</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h3>Address</h3>

					<ul class="footer-contact-info">
						<li><i class='bx bx-map'></i>175 5th Ave Premium Area, New York, NY 10010, United States</li>
						<li><i class='bx bx-phone-call'></i><a href="tel:+16782233761‬">+1 678-223-3761‬</a></li>
						<li><i class='bx bx-envelope'></i><a href="mailto:team@buynoir.co">team@buynoir.co</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="footer-bottom-area">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6">
					@if (company()->getSuperConfigData('general.content.footer.footer_toggle'))
						@if (company()->getSuperConfigData('general.content.footer.footer_content'))
							<p>{{ company()->getSuperConfigData('general.content.footer.footer_content') }}</p>
						@else
							<p><i class='bx bx-copyright'></i>{!! trans('admin::app.footer.copy-right') !!}</p>
						@endif
					@endif
				</div>
				<div class="col-lg-6 col-md-6">
					<ul>
						<li><a href="{{ route("buynoir.home.contactus") }}">Support</a></li>
						<li><a href="{{ route("buynoir.home.privacypolicy") }}">Privacy Policy</a></li>
						<li><a href="{{ route('buynoir.home.cookiesmore') }}">Cookie Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="shape16"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape16.png')}}" alt="image"></div>
</footer>
<!-- End Footer Area -->





<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>	 
	window.addEventListener("load", function(){
		window.cookieconsent.initialise({
			"palette": {
				"popup": {
					"background": "#000"
				},
				"button": {
					"background": "#0ea1e2"
				},
			},
			content: {
				header: 'Cookiessss used on the website!',
				message: 'We use cookies throughout this site to make your experience better.',
				dismiss: 'Got it!',
				allow: 'Allow cookies',
				deny: 'Decline',
				link: 'Learn more',
				href: "{{route('buynoir.home.cookiesmore')}}",
				close: '&#x274c;',
			}
		})
	});
</script>
		 