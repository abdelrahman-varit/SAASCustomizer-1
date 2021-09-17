<!-- Start Navbar Area -->
<div class="navbar-area">
	<div class="dibiz-responsive-nav">
		<div class="container-fluid">
			<div class="dibiz-responsive-menu">
				<div class="logo">
					<a href="{{ route('buynoir.home.index') }}">
						<svg xmlns="http://www.w3.org/2000/svg" width="130" height="34.126" viewBox="0 3.026 130 34.126" xmlns:v="https://vecta.io/nano"><path d="M9.632 4.091c5.089 0 8.033 2.975 8.033 6.979 0 2.682-1.672 4.886-3.78 5.583 2.326.551 4.58 2.718 4.58 6.098 0 4.261-3.198 7.383-8.069 7.383H0V4.091h9.632zm-.909 10.432c1.999 0 3.308-1.065 3.308-2.828 0-1.69-1.127-2.792-3.38-2.792H5.597v5.62h3.126zm.473 10.874c2.217 0 3.562-1.175 3.562-3.049 0-1.8-1.309-3.049-3.562-3.049H5.597v6.098h3.599zm22.185 2.9c-.945 1.58-3.017 2.241-4.834 2.241-4.398 0-6.869-3.233-6.869-7.126V11.877h5.525v10.359c0 1.763.945 3.159 2.908 3.159 1.854 0 3.017-1.286 3.017-3.122V11.877h5.525v14.987a28.73 28.73 0 0 0 .182 3.269h-5.307c-.074-.33-.147-1.359-.147-1.836zm9.485 8.854l4.107-9.477-7.596-15.795h6.179l4.398 9.771 3.998-9.771h5.852L46.682 37.151h-5.816zm34.214-7.016L64.467 13.017v17.118H58.76V4.091h6.979l9.668 15.832V4.091h5.743v26.044h-6.07zm26.806-9.146c0 5.657-4.18 9.698-9.596 9.698-5.379 0-9.596-4.041-9.596-9.698s4.216-9.661 9.596-9.661c5.416 0 9.596 4.004 9.596 9.661zm-5.524 0c0-3.086-1.963-4.518-4.071-4.518-2.072 0-4.071 1.433-4.071 4.518 0 3.049 1.999 4.555 4.071 4.555 2.108 0 4.071-1.47 4.071-4.555zm9.747-17.963c1.817 0 3.271 1.469 3.271 3.269s-1.454 3.269-3.271 3.269c-1.745 0-3.199-1.469-3.199-3.269s1.454-3.269 3.199-3.269zm-2.726 27.109V11.879h5.525v18.257h-5.525zm19.64-12.746c-.618-.147-1.2-.184-1.745-.184-2.217 0-4.216 1.322-4.216 4.959v7.971h-5.525V11.879h5.343v2.461c.945-2.057 3.235-2.645 4.689-2.645.545 0 1.09.073 1.454.184v5.51z" fill="#0ea1e2"/><path fill="#1964bc" d="M126.992 24.155c1.65 0 3.008 1.357 3.008 3.008s-1.357 2.972-3.008 2.972a2.96 2.96 0 0 1-2.972-2.972c0-1.651 1.321-3.008 2.972-3.008z"/></svg>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="dibiz-nav">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-md navbar-light">
				<a class="navbar-brand" href="{{ route('buynoir.home.index') }}">
					<svg xmlns="http://www.w3.org/2000/svg" width="130" height="34.126" viewBox="0 3.026 130 34.126" xmlns:v="https://vecta.io/nano"><path d="M9.632 4.091c5.089 0 8.033 2.975 8.033 6.979 0 2.682-1.672 4.886-3.78 5.583 2.326.551 4.58 2.718 4.58 6.098 0 4.261-3.198 7.383-8.069 7.383H0V4.091h9.632zm-.909 10.432c1.999 0 3.308-1.065 3.308-2.828 0-1.69-1.127-2.792-3.38-2.792H5.597v5.62h3.126zm.473 10.874c2.217 0 3.562-1.175 3.562-3.049 0-1.8-1.309-3.049-3.562-3.049H5.597v6.098h3.599zm22.185 2.9c-.945 1.58-3.017 2.241-4.834 2.241-4.398 0-6.869-3.233-6.869-7.126V11.877h5.525v10.359c0 1.763.945 3.159 2.908 3.159 1.854 0 3.017-1.286 3.017-3.122V11.877h5.525v14.987a28.73 28.73 0 0 0 .182 3.269h-5.307c-.074-.33-.147-1.359-.147-1.836zm9.485 8.854l4.107-9.477-7.596-15.795h6.179l4.398 9.771 3.998-9.771h5.852L46.682 37.151h-5.816zm34.214-7.016L64.467 13.017v17.118H58.76V4.091h6.979l9.668 15.832V4.091h5.743v26.044h-6.07zm26.806-9.146c0 5.657-4.18 9.698-9.596 9.698-5.379 0-9.596-4.041-9.596-9.698s4.216-9.661 9.596-9.661c5.416 0 9.596 4.004 9.596 9.661zm-5.524 0c0-3.086-1.963-4.518-4.071-4.518-2.072 0-4.071 1.433-4.071 4.518 0 3.049 1.999 4.555 4.071 4.555 2.108 0 4.071-1.47 4.071-4.555zm9.747-17.963c1.817 0 3.271 1.469 3.271 3.269s-1.454 3.269-3.271 3.269c-1.745 0-3.199-1.469-3.199-3.269s1.454-3.269 3.199-3.269zm-2.726 27.109V11.879h5.525v18.257h-5.525zm19.64-12.746c-.618-.147-1.2-.184-1.745-.184-2.217 0-4.216 1.322-4.216 4.959v7.971h-5.525V11.879h5.343v2.461c.945-2.057 3.235-2.645 4.689-2.645.545 0 1.09.073 1.454.184v5.51z" fill="#0ea1e2"/><path fill="#1964bc" d="M126.992 24.155c1.65 0 3.008 1.357 3.008 3.008s-1.357 2.972-3.008 2.972a2.96 2.96 0 0 1-2.972-2.972c0-1.651 1.321-3.008 2.972-3.008z"/></svg>
				</a>

				<div class="collapse navbar-collapse mean-menu">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="https://docs.buynoir.co" class="nav-link" target="_blank">Documentation</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('company.create.index') }}" class="nav-link">Sign Up</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('buynoir.signin.index') }}" class="nav-link">Sign In</a>
						</li>
					</ul>

					<div class="others-option d-flex align-items-center">
						<div class="option-item">
							<div class="search-box">
								<i class="flaticon-search"></i>
							</div>
						</div>

						<div class="option-item">
							<div class="side-menu-btn">
								<i class="flaticon-menu" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</div>

	<div class="others-option-for-responsive">
		<div class="container">
			<div class="dot-menu">
				<div class="inner">
					<div class="circle circle-one"></div>
					<div class="circle circle-two"></div>
					<div class="circle circle-three"></div>
				</div>
			</div>
			
			<div class="container">
				<div class="option-inner">
					<div class="others-option justify-content-center d-flex align-items-center">
						<div class="option-item">
							<div class="cart-btn">
								<a href="cart.html">
									<i class="flaticon-shopping-cart"></i>
									<span>1</span>
								</a>
							</div>
						</div>

						<div class="option-item">
							<div class="search-box">
								<i class="flaticon-search"></i>
							</div>
						</div>

						<div class="option-item">
							<div class="side-menu-btn">
								<i class="flaticon-menu" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Navbar Area -->

<!-- Sidebar Modal -->
<div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<button type="button" class="close" data-bs-dismiss="modal"><i class='bx bx-x'></i></button>

			<div class="modal-body">
				<div class="logo">
					<a href="index.html" class="d-inline-block"><img src="{{ asset('buynoir/superlandpage/assets/img/logo.png') }}" alt="image"></a>
				</div>

				<div class="instagram-list">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-6">
							<div class="box">
								<img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img1.jpg') }}" alt="image">
								<i class='bx bxl-instagram'></i>
								<a href="#" target="_blank" class="link-btn"></a>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-6">
							<div class="box">
								<img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img2.jpg') }}" alt="image">
								<i class='bx bxl-instagram'></i>
								<a href="#" target="_blank" class="link-btn"></a>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-6">
							<div class="box">
								<img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img3.jpg') }}" alt="image">
								<i class='bx bxl-instagram'></i>
								<a href="#" target="_blank" class="link-btn"></a>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-6">
							<div class="box">
								<img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img4.jpg') }}" alt="image">
								<i class='bx bxl-instagram'></i>
								<a href="#" target="_blank" class="link-btn"></a>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-6">
							<div class="box">
								<img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img5.jpg') }}" alt="image">
								<i class='bx bxl-instagram'></i>
								<a href="#" target="_blank" class="link-btn"></a>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-6">
							<div class="box">
								<img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img6.jpg') }}" alt="image">
								<i class='bx bxl-instagram'></i>
								<a href="#" target="_blank" class="link-btn"></a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="sidebar-contact-info">
					<h2>
						<a href="tel:+11234567890">+1 (123) 456 7890</a>
						<span>OR</span>
						<a href="mailto:hello@dibiz.com">hello@dibiz.com</a>
					</h2>
				</div>

				<ul class="social-list">
					<li><span>Follow Us On:</span></li>
					<li><a href="https://www.facebook.com/BuyNoirApp/" target="_blank"><i class='bx bxl-facebook'></i></a></li>
					<li><a href="https://twitter.com/NoirBuy" target="_blank"><i class='bx bxl-twitter'></i></a></li>
					<li><a href="https://www.instagram.com/buynoir_official/" target="_blank"><i class='bx bxl-instagram'></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Sidebar Modal -->

<!-- Search Overlay -->
<div class="search-overlay">
	<div class="d-table">
		<div class="d-table-cell">
			<div class="search-overlay-layer"></div>
			<div class="search-overlay-layer"></div>
			<div class="search-overlay-layer"></div>
			
			<div class="search-overlay-close">
				<span class="search-overlay-close-line"></span>
				<span class="search-overlay-close-line"></span>
			</div>

			<div class="search-overlay-form">
				<form>
					<input type="text" class="input-search" placeholder="Search here...">
					<button type="submit"><i class="flaticon-search"></i></button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Search Overlay -->