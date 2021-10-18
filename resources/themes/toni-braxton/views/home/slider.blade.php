<div class="slider-area">
	<section class="slider-block">
		<div class="main_slider">
			@if(count($sliderData)<1)
				<div class="slide">
					<img src="{{ asset('/themes/toni-braxton/assets/images/banner/banner-01.jpg')  }}">
				</div>
			@else
				@foreach($sliderData as $slider) 
					<div class="slide">
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
	</section>


	@push('scripts')
		<script>
			$(document).ready(function(){
				$('.main_slider').slick({
					dots            : false,
					arrows          : true,
					speed           : 400,
					slidesToShow    : 1,
					autoplay        : true,
					autoplaySpeed   : 3000,
				});
			});
		</script>
	@endpush
</div>