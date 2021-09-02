<!-- Slider Start -->
<div class="swiper-container home-slider">
	<div class="swiper-wrapper">
		@if( count($sliderData) < 1 )
			<div class="swiper-slide">
				<a href="javascript:void(0)">
					<picture>
						<source media="(min-width:992px)" srcset="{{ asset('/themes/beshop/img/demo/banner_1_992.jpg') }}">
						<source media="(min-width:768px)" srcset="{{ asset('/themes/beshop/img/demo/banner_1_768.jpg') }}">
						<source media="(min-width:576px)" srcset="{{ asset('/themes/beshop/img/demo/banner_1_576.jpg') }}">
						<source media="(min-width:480px)" srcset="{{ asset('/themes/beshop/img/demo/banner_1_480.jpg') }}">
						<img src="{{ asset('/themes/beshop/img/demo/banner_1_992.jpg') }}" alt="banner">
					</picture>
				</a>
			</div>
		@else
			@foreach($sliderData as $slider)
				<div class="swiper-slide">
					<a href="{{ empty($slider['slider_path']) ? 'javascript:void(0)' : $slider['slider_path'] }}">
						<picture>
							<source media="(min-width:992px)" srcset="{{ Storage::url($slider['path']) }}">
							<source media="(min-width:768px)" srcset="{{ Storage::url($slider['path']) }}">
							<source media="(min-width:576px)" srcset="{{ Storage::url($slider['path']) }}">
							<source media="(min-width:480px)" srcset="{{ Storage::url($slider['path']) }}">
							<img src="{{ Storage::url($slider['path']) }}" alt="banner">
						</picture>
					</a>
				</div>
			@endforeach
		@endif
	</div>
	<div class="swiper-pagination"></div>
</div>
<!-- Slider End -->