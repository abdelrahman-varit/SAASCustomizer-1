<!-- Start Footer Area -->
<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<a href="index.html" class="logo">
						<img src="{{ asset('buynoir/superlandpage/assets/img/logo-white.png') }}" alt="Buynoir.">
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
					"background": "#f1d600"
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
		 