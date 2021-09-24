<!-- Start Navbar Area -->
<div class="navbar-area">
	<div class="dibiz-responsive-nav">
		<div class="container-fluid">
			<div class="dibiz-responsive-menu">
				<div class="logo">
					<a href="{{ route('buynoir.home.index') }}">
						<img src="{{ asset('buynoir/superlandpage/assets/img/Buynoir.gif') }}" alt="Buynoir.">
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="dibiz-nav">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-md navbar-light">
				<a class="navbar-brand invisible" href="{{ route('buynoir.home.index') }}">
					<img src="{{ asset('buynoir/superlandpage/assets/img/Buynoir.gif') }}" alt="Buynoir.">
				</a>

				<div class="collapse navbar-collapse mean-menu">
					<a class="navbar-brand d-none d-xl-inline-block ms-auto me-0" href="{{ route('buynoir.home.index') }}">
						<img src="{{ asset('buynoir/superlandpage/assets/img/Buynoir.gif') }}" alt="Buynoir.">
					</a>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="{{ route('company.create.index') }}" class="nav-link">Sign Up</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('buynoir.signin.index') }}" class="nav-link">Sign In</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
<!-- End Navbar Area -->