<!-- Start Navbar Area -->
<div class="navbar-area">
	<div class="dibiz-responsive-nav">
		<div class="container-fluid">
			<div class="dibiz-responsive-menu">
				<div class="logo">
					<a href="{{ route('buynoir.home.index') }}">
						<img src="{{ asset('buynoir/superlandpage/assets/img/logo.png') }}" alt="Buynoir.">
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="dibiz-nav">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-md navbar-light">
				<a class="navbar-brand" href="{{ route('buynoir.home.index') }}">
					<img src="{{ asset('buynoir/superlandpage/assets/img/logo.png') }}" alt="Buynoir.">
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