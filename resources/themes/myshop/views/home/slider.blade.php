<!-- Slider Start -->
<div class="swiper-container home-slider">
	<div class="swiper-wrapper">
		@if(count($sliderData)<1)
			<div class="swiper-slide">
				<a href="#">
					<img src="{{ asset('/themes/myshop/assets/images/banner/banner-01.jpg')  }}">
				</a>
			</div>
		@else
			@foreach($sliderData as $slider)
				<div class="swiper-slide">
					@if(empty($slider['slider_path']))
						<img src="{{ Storage::url($slider['path']) }}">
					@else
						<a href="{{$slider['slider_path']}}">
							<img src="{{ Storage::url($slider['path']) }}">
						</a>
					@endif
				</div>
			@endforeach
		@endif
	</div>
	<div class="swiper-pagination"></div>
</div>
<!-- Slider End -->