<div class="slider-area">
	<div class="main-container-wrapper" style="display: flex;">
		<div class="left-content" style="flex: 0 0 25%;">
			@include('shop::layouts.header.nav-menu.sidemenu')
		</div>

		<div class="right-content" style="flex: 1;">
			<section class="slider-block">
			    <image-slider :slides='@json($sliderData)' public_path="{{ url()->to('/') }}"></image-slider>
			</section>
		</div>
	</div>
</div>