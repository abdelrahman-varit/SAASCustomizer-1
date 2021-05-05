<div class="slider-area">
	<div class="main-container-wrapper" style="display: flex;">
		<div class="left-content">
			@include('shop::layouts.header.nav-menu.sidemenu')
		</div>

		<div class="right-content" style="flex: 1; overflow: hidden;">
			{{-- <section class="slider-block">
			    <image-slider :slides='@json($sliderData)' public_path="{{ url()->to('/') }}"></image-slider>
			</section> --}}

			<section class="slider-block">

                <div class="main_slider">

                	@foreach($sliderData as $slider)

                		<div>
	                        <img src="{{ Storage::url($slider['path']) }}">
	                    </div>

                	@endforeach
	                    

                    
                </div>


        </section>


        @push('scripts')


            <script>
                

                $(document).ready(function(){
                    $('.main_slider').slick({
                        dots            : true,
                        arrows          : false,
                        speed           : 300,
                        slidesToShow    : 1,
                        autoplay        : false,
                        autoplaySpeed   : 2000,
                    });
                });


            </script>

        @endpush


        @push('css')


            

            <style>
                /*Main Slider*/

                section.slider-block{
                	margin: 0;
                }
                .main_slider{
                	width: 100%;
                	height: auto;
                }
                .main_slider img{
                	width: auto;
                	height: 400px;
                }

                .slick-slide img {
				    width: 100%;
				}

				.slick-dots li button:before{
					content: '';
					height: 10px;
				    width: 10px;
					border: 1px solid #ccc;
				    border-radius: 10px;
				    margin: 4px 0px 0px 5px;
				}

				.slick-dots li button{
					height: 10px;
				    width: 10px;
					border: 1px solid #ccc;
				    border-radius: 10px;
				    margin: 4px 0px 0px 5px;
				}


				.slick-dots li.slick-active button:before{
					background-color: #FAE3DB;
				}








		        @media only screen and (max-width:768px) {
		      
		            .main_slider img{
	                	/*height: 150px;*/
	                }	

		        }
                    
            </style>
                
        @endpush


				
		</div>
	</div>
</div>


@push('css')
	
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endpush
