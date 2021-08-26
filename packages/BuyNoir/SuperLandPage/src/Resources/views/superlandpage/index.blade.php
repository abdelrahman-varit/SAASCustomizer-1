@extends('superlandpage_view::superlandpage.layouts.master')

@php
		$channel = company()->getCurrentChannel();
		
		if ( $channel ) {
				$homeSEO = $channel->home_seo;

				if (isset($homeSEO)) {
						$homeSEO = json_decode($channel->home_seo);

						$metaTitle = $homeSEO->meta_title;

						$metaDescription = $homeSEO->meta_description;

						$metaKeywords = $homeSEO->meta_keywords;
				}
		}
@endphp

@section('page_title')
		{{ isset($metaTitle) ? $metaTitle : "" }}
@endsection

@section('head')

		@if (isset($homeSEO))
				@isset($metaTitle)
						<meta name="title" content="{{ $metaTitle }}" />
				@endisset

				@isset($metaDescription)
						<meta name="description" content="{{ $metaDescription }}" />
				@endisset

				@isset($metaKeywords)
						<meta name="keywords" content="{{ $metaKeywords }}" />
				@endisset
		@endif
@endsection



@section('content-wrapper')

		{!! view_render_event('bagisto.saas.companies.home.content.before') !!}

		<div id="wrapper">
				<div id="content" id="buynoir-homepage">
			 
		
					<!-- Stat main -->
					<main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
						<!-- Start Banner Section -->
						<section class="demo_1 demo__charity demo__software" id="About">
							<div class="container">
								<div class="row">
									<div class="col-md-8 col-lg-5">
										<div class="banner_title">
											<div class="offer">
												<span></span>
												<span></span>
											</div>
											<h1 class="c-white">
												Made to help
												Black and Brown 
												online Businesses
												Sell and Grow
											</h1>
											<p>

											</p>
											<a href="{{route('company.create.index')}}" class="btn btn_lg_primary bg-green2 c-white sweep_top sweep_letter rounded-12">
												<div class="inside_item">
													<span data-hover="Yes, Free!">Start Free!</span>
												</div>
											</a>
		
									 
		
										</div>
									</div>
		
									<div class="col-lg-6">
										<div class="element_ui">
										</div>
									</div>
								</div>
							</div>
		
		
		
						</section>
						<!-- End Banner -->
		
						<!-- Start serv_soft -->
						<section class="services_section save__nature serv_soft padding-t-12" id="Features">
							<div class="container">
								<div class="text-center row justify-content-center">
									<div class="col-md-8 col-lg-5">
										<div class="title_sections">
											<div class="before_title">
												<span>Made for your </span>
												<span class="c-green2">Black Business</span>
											</div>
											<h2>BuyNoir was built to help your online business grow.</h2>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-lg-3 item__nature">
										<div class="mb-4 items_serv sevice_block mb-lg-0" data-aos="fade-up" data-aos-delay="0">
											<div class="icon--top">
												<svg xmlns="http://www.w3.org/2000/svg" width="26.824" height="23.192" viewBox="0 0 26.824 23.192">
													<g id="Group_6272" data-name="Group 6272" transform="translate(-0.118 -3.632)">
														<path id="Rectangle-154"
															d="M2.343,2.343V4.686H8.2V2.343ZM1.171,0H24.6a1.171,1.171,0,0,1,1.171,1.171V5.857A1.171,1.171,0,0,1,24.6,7.028H1.171A1.171,1.171,0,0,1,0,5.857V1.171A1.171,1.171,0,0,1,1.171,0Z"
															transform="translate(23.31 8.602) rotate(135)" fill="#31d1ab" />
														<path id="Combined-Shape"
															d="M17.586,12.514h1.171a.586.586,0,0,1,.586.586v1.171a.586.586,0,0,1-.586.586H17.586A.586.586,0,0,1,17,14.271V13.1A.586.586,0,0,1,17.586,12.514ZM21.1,9h1.171a.586.586,0,0,1,.586.586v1.171a.586.586,0,0,1-.586.586H21.1a.586.586,0,0,1-.586-.586V9.586A.586.586,0,0,1,21.1,9Zm1.171,4.686h1.171a.586.586,0,0,1,.586.586v1.171a.586.586,0,0,1-.586.586H22.271a.586.586,0,0,1-.586-.586V14.271A.586.586,0,0,1,22.271,13.686Z"
															transform="translate(2.914 1.543)" fill="#31d1ab" fill-rule="evenodd" opacity="0.3" />
													</g>
												</svg>
		
											</div>
											<div class="txt">
												<h3>    Built black for your black business</h3>
												<p>
														BuyNoir was <b>built by black entrepreneures</b> for black entrepreneures and makers.
												</p>
											</div>
		
										</div>
									</div>
									<div class="col-md-6 col-lg-3 item__nature mx-lg-auto">
										<div class="mb-4 items_serv sevice_block mb-lg-0" data-aos="fade-up" data-aos-delay="100">
											<div class="icon--top">
												<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
													<g id="Group_6273" data-name="Group 6273" transform="translate(-4.896 -4.896)">
														<rect id="Rectangle-7" width="4" height="4" rx="2" transform="translate(4.896 4.896)"
															fill="#d6c0b7" opacity="0.3" />
														<rect id="Rectangle-7-Copy-3" width="4" height="4" rx="2" transform="translate(4.896 11.896)"
															fill="#d6c0b7" />
														<rect id="Rectangle-7-Copy" width="4" height="4" rx="2" transform="translate(11.896 4.896)"
															fill="#d6c0b7" />
														<rect id="Rectangle-7-Copy-4" width="4" height="4" rx="2" transform="translate(11.896 11.896)"
															fill="#d6c0b7" />
														<rect id="Rectangle-7-Copy-2" width="4" height="4" rx="2" transform="translate(18.896 4.896)"
															fill="#d6c0b7" />
														<rect id="Rectangle-7-Copy-5" width="4" height="4" rx="2" transform="translate(18.896 11.896)"
															fill="#d6c0b7" />
														<rect id="Rectangle-7-Copy-8" width="4" height="4" rx="2" transform="translate(4.896 18.896)"
															fill="#d6c0b7" />
														<rect id="Rectangle-7-Copy-7" width="4" height="4" rx="2" transform="translate(11.896 18.896)"
															fill="#d6c0b7" />
														<rect id="Rectangle-7-Copy-6" width="4" height="4" rx="2" transform="translate(18.896 18.896)"
															fill="#d6c0b7" />
													</g>
												</svg>
											</div>
											<div class="txt">
												<h3>Everything you'll need</h3>
												<p>
													We listened to <b>hundreds of black owned small businesses</b> like yours and built the tools you'll need to sell more.
												</p>
											</div>
		
										</div>
									</div>
									<div class="col-md-6 col-lg-3 item__nature">
										<div class="mb-4 items_serv sevice_block mb-lg-0" data-aos="fade-up" data-aos-delay="200">
											<div class="icon--top">
												<svg xmlns="http://www.w3.org/2000/svg" width="21.085" height="21.085" viewBox="0 0 21.085 21.085">
													<g id="Group_6274" data-name="Group 6274" transform="translate(-3.514 -3.514)">
														<rect id="Rectangle-62-Copy" width="3.514" height="15.228" rx="1.5"
															transform="translate(14.057 4.686)" fill="#d6c0b7" opacity="0.3" />
														<rect id="Rectangle-62-Copy-2" width="3.514" height="9.371" rx="1.5"
															transform="translate(8.2 10.543)" fill="#d6c0b7" opacity="0.3" />
														<path id="Path-95"
															d="M5.343,21.742H22.914a1.171,1.171,0,0,1,0,2.343H4.171A1.171,1.171,0,0,1,3,22.914V4.171a1.171,1.171,0,0,1,2.343,0Z"
															transform="translate(0.514 0.514)" fill="#31d1ab" />
														<rect id="Rectangle-62-Copy-4" width="3.514" height="7.028" rx="1.5"
															transform="translate(19.914 12.885)" fill="#d6c0b7" opacity="0.3" />
													</g>
												</svg>
											</div>
											<div class="txt">
												<h3>Leverage our culture to grow more</h3>
												<p>
													We've built tools to help you keep a pulse on our culture and speak directly to what's relevant. 
												</p>
											</div>
		
										</div>
									</div>
		
								</div>
							</div>
						</section>
						<!-- End. serv_soft -->
	 
		
 
						<!-- Start price plan -->
						<section class="services_section save__nature serv_soft padding-t-12" id="Features">
							<div class="container">
								<div class="text-center row justify-content-center">
									<div class="col-md-8 col-lg-5">
										<div class="title_sections">
											<div class="before_title">
												<span>OUR </span>
												<span class="c-green2">PACKAGES</span>
											</div>
											<h2>PRICE PLAN </h2>
										</div>
									</div>
								</div>
								<div class="row justify-content-center align-items-stretch">
									<div class="col-lg-4 mb-5 mb-lg-0">
										<div class="package" data-aos="fade-up" data-aos-delay="200">
											<h3 class="package_name text-center font-weight-bold">TRIAL PLAN</h3>
											<div class="text-center">
												<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="10 10 60 60" xmlns:v="https://vecta.io/nano"><path fill="#284058" d="M17.5 10h45a7.5 7.5 0 0 1 7.5 7.5v45a7.5 7.5 0 0 1-7.5 7.5h-45a7.5 7.5 0 0 1-7.5-7.5v-45a7.5 7.5 0 0 1 7.5-7.5z"/><path d="M43.653 40.898l-1.21 1.207.416.559c.367.499.353.875-.097 1.284l-3.826 3.442c-.295.263-.62.266-.899-.023l-2.13-2.293-6.085-6.655c-.424-.463-.427-.899.032-1.319l3.868-3.481c.427-.379.959-.296 1.304.158l.416.542 6.266-5.677-.533-.701c-.347-.45-.323-.887.096-1.266l3.679-3.304c.37-.329.844-.332 1.186.02l2.363 2.509 5.798 6.216c.266.284.485.584.328.992a1.14 1.14 0 0 1-.283.419l-3.653 3.289c-.413.37-.677.361-1.07-.025-.115-.113-.208-.25-.308-.376l-.289-.37-1.733 1.37.413.451 9.403 10.081c.721.767.686 1.211-.083 1.868l-2.162 1.98c-.395.361-.666.373-1.042-.017l-2.575-2.742-7.321-7.86-.269-.278zm-.547-11.225l-6.443 5.852 4.726 5.192 6.395-6.079-4.678-4.965zm-11.495 8.093l7.141 7.573 2.483-2.282-7.025-7.688-2.599 2.397zm21.247-5.165l-7.141-7.574-2.489 2.111 7.069 7.655 2.561-2.192zm-7.643 7.079l9.34 10.086 1.223-1.201-9.337-10.081-1.226 1.196zM25.863 51.712v-.361l.002-2.084c.008-.71.287-.983 1-1.002l.203-.001h14.999l.203.001c.719.016.997.284 1.006.992l.002 2.113v.343h.338l2.197.002c.625.006.941.29.95.901l.001 3.342c-.008.604-.301.877-.913.916-.096.006-.193.002-.289.002H23.568c-.125 0-.251.004-.376-.013-.554-.074-.804-.334-.809-.889l.001-3.371c.007-.592.319-.88.931-.887l2.196-.002.352-.002zm-1.745 1.734v1.303c0 .401 0 .401.401.401h20.114c.077 0 .162.019.229-.007s.155-.095.155-.146l.007-1.55-20.906-.001zm3.509-1.753h13.879v-1.687H27.627v1.687z" fill="#fff"/></svg>
											</div>
											<p class="package_price text-center">$0 FREE</p>
											<p>BuyNoir was built by black entrepreneurs for black entrepreneurs and makers.</p>
											<ul>
												<li>500 Product(s)</li>
												<li>50 Category(s)</li>
												<li>100 Attribute(s)</li>
												<li>100 Attribute Family(s)</li>
												<li>2 Channel(s)</li>
												<li>1000 Order(s)</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-4 mb-5 mb-lg-0">
										<div class="package featured" data-aos="fade-up" data-aos-delay="200">
											<h3 class="package_name text-center font-weight-bold">STANDARD</h3>
											<div class="text-center">
												<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="10 10 60 60" xmlns:v="https://vecta.io/nano"><path fill="#fff" d="M17.5 10h45a7.5 7.5 0 0 1 7.5 7.5v45a7.5 7.5 0 0 1-7.5 7.5h-45a7.5 7.5 0 0 1-7.5-7.5v-45a7.5 7.5 0 0 1 7.5-7.5z"/><path d="M40.173 50.768h-5.327c-1.721 0-3.442.007-5.161-.001-2.365-.011-3.93-1.577-3.931-3.929l-.002-19.819c0-2.258 1.616-3.882 3.899-3.889l11.236.007a.87.87 0 0 1 .578.245l6.404 7.057c.222.244.305.487.304.806l-.013 11.242c-.001.366.065.532.49.617 3.29.661 5.683 3.644 5.597 6.922-.089 3.382-2.584 6.227-5.924 6.761-3.791.606-7.364-1.906-8.057-5.659-.019-.102-.051-.203-.093-.36zm1.303-5.171H30.017v-1.895h.396l13.157-.001c.151 0 .314.025.452-.022l2.167-.767v-10.81h-6.356v-6.977c-.086-.025-.128-.047-.17-.047-3.412-.001-6.822-.008-10.234.016-.326.002-.686.15-.97.328-.577.362-.748.944-.748 1.602l-.001 19.87c.001 1.241.748 1.96 1.997 1.958h7.127 3.227l1.415-3.255zm10.802 4.275c-.037-2.842-2.311-5.028-5.195-4.996-2.753.03-5.018 2.342-4.98 5.083.04 2.819 2.35 5.015 5.227 4.969 2.743-.043 4.984-2.333 4.948-5.056zM41.824 30.13h3.142l-3.142-3.467v3.467zm-11.821 6.241v-1.858h13.903v1.858H30.003zm.002 4.617v-1.864h13.903v1.864H30.005zm16.29 9.184l3.281-3.092 1.349 1.378-4.609 4.276-2.875-2.738 1.438-1.484 1.416 1.66z" fill="#284058"/></svg>
											</div>
											<p class="package_price text-center">START WITH US - $19.99</p>
											<p>We're just getting started powering your online businesses. Use all of our features for one low price. As we grow, grow with us. The first 10 days are on us.<br>Don't forget, we won't be taking any of your sales income.</p>
											<ul>
												<li>Unlimited Products</li>
												<li>Unlimited Categories</li>
												<li>Unlimited Attributes</li>
												<li>Unlimited Attribute Families</li>
												<li>Unlimited Channels</li>
												<li>Unlimited Orders</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-4 mb-5 mb-lg-0">
										<div class="package featured" data-aos="fade-up" data-aos-delay="200">
											<h3 class="package_name text-center font-weight-bold">PROMO CODE</h3>
											<div class="text-center">
												<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="10 10 60 60" xmlns:v="https://vecta.io/nano"><path fill="#fff" d="M17.5 10h45a7.5 7.5 0 0 1 7.5 7.5v45a7.5 7.5 0 0 1-7.5 7.5h-45a7.5 7.5 0 0 1-7.5-7.5v-45a7.5 7.5 0 0 1 7.5-7.5z"/><path d="M40.173 50.768h-5.327c-1.721 0-3.442.007-5.161-.001-2.365-.011-3.93-1.577-3.931-3.929l-.002-19.819c0-2.258 1.616-3.882 3.899-3.889l11.236.007a.87.87 0 0 1 .578.245l6.404 7.057c.222.244.305.487.304.806l-.013 11.242c-.001.366.065.532.49.617 3.29.661 5.683 3.644 5.597 6.922-.089 3.382-2.584 6.227-5.924 6.761-3.791.606-7.364-1.906-8.057-5.659-.019-.102-.051-.203-.093-.36zm1.303-5.171H30.017v-1.895h.396l13.157-.001c.151 0 .314.025.452-.022l2.167-.767v-10.81h-6.356v-6.977c-.086-.025-.128-.047-.17-.047-3.412-.001-6.822-.008-10.234.016-.326.002-.686.15-.97.328-.577.362-.748.944-.748 1.602l-.001 19.87c.001 1.241.748 1.96 1.997 1.958h7.127 3.227l1.415-3.255zm10.802 4.275c-.037-2.842-2.311-5.028-5.195-4.996-2.753.03-5.018 2.342-4.98 5.083.04 2.819 2.35 5.015 5.227 4.969 2.743-.043 4.984-2.333 4.948-5.056zM41.824 30.13h3.142l-3.142-3.467v3.467zm-11.821 6.241v-1.858h13.903v1.858H30.003zm.002 4.617v-1.864h13.903v1.864H30.005zm16.29 9.184l3.281-3.092 1.349 1.378-4.609 4.276-2.875-2.738 1.438-1.484 1.416 1.66z" fill="#284058"/></svg>
											</div>
											<p class="package_price text-center">Get 10% discount</p>
											<p>Using promo code user will get 10% discount on purchase of subscription plan. User will get unlimited access for products, categories, orders & sales</p>
											<ul>
												<li style="font-size:20px;text-align:center;text-transform: uppercase;">"{{ company()->getSuperConfigData('general.design.promo-code.promo-code')}}"</li>
												 
											</ul>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- End. price plan -->
 
		
    
    
						<!-- Start Easy Templates -->
						<section class="software_web margin-t-12" id="Products">
							<div class="container">
								<div class="row">
									<div class="order-1 my-auto col-lg-5 order-lg-0">
										<div class="mb-4 item__section mb-lg-0">
											<div class="media">
												<div class="icon_sec">

													<svg xmlns="http://www.w3.org/2000/svg" width="11.711" height="24.599"
														viewBox="0 0 11.711 24.599">
														<g id="Group_6275" data-name="Group 6275" transform="translate(-8.202 -2.343)">
															<path id="Path-17"
																d="M14.614,6.686q-.286,4.016-1.959,5.271S13.442,4.343,11.186,2a19.579,19.579,0,0,1-2.092,8.367C8.113,12.132,7,13.88,7,16.224c0,3.347,4.062,4.518,5.86,4.518,2.106,0,5.851-1.171,5.851-5.271Q18.714,12.942,14.614,6.686Z"
																transform="translate(1.2 0.343)" fill="#fff" fill-rule="evenodd" />
															<path id="Rectangle-49"
																d="M10.016,20h5.34a1.171,1.171,0,0,1,1.111.8l.9,2.713H8L8.9,20.8A1.171,1.171,0,0,1,10.016,20Z"
																transform="translate(1.371 3.428)" fill="#fff" fill-rule="evenodd" opacity="0.3" />
														</g>
													</svg>
		
												</div>
												<div class="media-body">
													<div class="mb-0 title_sections">
														<div class="before_title">
															<span>Easy to use </span>
															<span class="c-green2">Templates</span>
														</div>
														<h2>Get your business online fast with customizable templates</h2>
														<p>
															No coding required. Simply choose the template that matches your style, add your branding and products and start selling your stuff. 
														</p>
														<a href="{{route('company.create.index')}}" class="btn btn_lg_primary margin-t-2 sweep_top sweep_letter rounded-12 border-1">
															<div class="inside_item">
																<span data-hover="Yes, Free!">Start Free!</span>
															</div>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="mb-4 col-lg-7 order-0 order-lg-1 mb-lg-0">
										<div class="screen__ipad">
											<img class="ipad_img" src="{{ asset('buynoir/superlandpage/assets/img/software/woman.jpeg')}}" alt="" data-aos="fade-up" data-aos-delay="0">
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- End Easy Templates -->
							
						<!-- Start Easy Transfer Data -->
						<section class="software_web margin-t-12" id="Products">
							<div class="container">
								<div class="row">
									<div class="order-1 my-auto col-lg-5 order-lg-0">
										<div class="mb-4 item__section mb-lg-0">
											<div class="media">
												<div class="icon_sec">
													<svg xmlns="http://www.w3.org/2000/svg" width="11.711" height="24.599"
														viewBox="0 0 11.711 24.599">
														<g id="Group_6275" data-name="Group 6275" transform="translate(-8.202 -2.343)">
															<path id="Path-17"
																d="M14.614,6.686q-.286,4.016-1.959,5.271S13.442,4.343,11.186,2a19.579,19.579,0,0,1-2.092,8.367C8.113,12.132,7,13.88,7,16.224c0,3.347,4.062,4.518,5.86,4.518,2.106,0,5.851-1.171,5.851-5.271Q18.714,12.942,14.614,6.686Z"
																transform="translate(1.2 0.343)" fill="#fff" fill-rule="evenodd" />
															<path id="Rectangle-49"
																d="M10.016,20h5.34a1.171,1.171,0,0,1,1.111.8l.9,2.713H8L8.9,20.8A1.171,1.171,0,0,1,10.016,20Z"
																transform="translate(1.371 3.428)" fill="#fff" fill-rule="evenodd" opacity="0.3" />
														</g>
													</svg>
		
												</div>
												<div class="media-body">
													<div class="mb-0 title_sections">
														<div class="before_title">
															<span>Easily transfer </span>
															<span class="c-green2">your Data</span>
														</div>
														<h2>We make it easy for you to transition from one of those other Ecommerce Platforms</h2>
														<p>
															Take the leap and move to a platform made by black entrepenures for black entrepreneurs. We've made the features you need to grow your business with you in mind. We've also made it easy to move your stuff over from those other guys to BuyNoir.
														</p>
														<a href="{{route("company.create.index")}}" class="btn btn_lg_primary margin-t-2 sweep_top sweep_letter rounded-12 border-1">
															<div class="inside_item">
																<span data-hover="Yes, Free!">Start Free!</span>
															</div>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="mb-4 col-lg-7 order-0 order-lg-1 mb-lg-0">
										<div class="screen__ipad">
											<img class="ipad_img" src="{{ asset('buynoir/superlandpage/assets/img/shop.jpeg')}}" alt="" data-aos="fade-up" data-aos-delay="0">
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- End.Easy Templates -->
						
						<!-- Start software_web -->
						<section class="software_web margin-t-12" id="Products">
							<div class="container">
								<div class="row">
									<div class="order-1 my-auto col-lg-5 order-lg-0">
										<div class="mb-4 item__section mb-lg-0">
											<div class="media">
												<div class="icon_sec">
													<svg xmlns="http://www.w3.org/2000/svg" width="11.711" height="24.599"
														viewBox="0 0 11.711 24.599">
														<g id="Group_6275" data-name="Group 6275" transform="translate(-8.202 -2.343)">
															<path id="Path-17"
																d="M14.614,6.686q-.286,4.016-1.959,5.271S13.442,4.343,11.186,2a19.579,19.579,0,0,1-2.092,8.367C8.113,12.132,7,13.88,7,16.224c0,3.347,4.062,4.518,5.86,4.518,2.106,0,5.851-1.171,5.851-5.271Q18.714,12.942,14.614,6.686Z"
																transform="translate(1.2 0.343)" fill="#fff" fill-rule="evenodd" />
															<path id="Rectangle-49"
																d="M10.016,20h5.34a1.171,1.171,0,0,1,1.111.8l.9,2.713H8L8.9,20.8A1.171,1.171,0,0,1,10.016,20Z"
																transform="translate(1.371 3.428)" fill="#fff" fill-rule="evenodd" opacity="0.3" />
														</g>
													</svg>
		
												</div>
												<div class="media-body">
													<div class="mb-0 title_sections">
														<div class="before_title">
															<span>You make it... </span>
															<span class="c-green2">You keep it! $$$</span>
														</div>
														<h2>Keep 100% of the money you earn!</h2>
														<p>
															ok, maybe we should have led with this. That's right! You earn it, you keep it! BuyNoir takes none of your sales earnings. Simply pay a monthly fee to keep your shop running and you keep 100% of the money you earned. 
														</p>
														<a href="{{route("company.create.index")}}" class="btn btn_lg_primary margin-t-2 sweep_top sweep_letter rounded-12 border-1">
															<div class="inside_item">
																<span data-hover="Yes, Free!">Start Free!</span>
															</div>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="mb-4 col-lg-7 order-0 order-lg-1 mb-lg-0">
										<div class="screen__ipad">
											<img class="ipad_img" src="{{ asset('buynoir/superlandpage/assets/img/bakery.jpeg')}}" alt="" data-aos="fade-up" data-aos-delay="0">
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- End.software_web -->
		
					 
		 
						<!-- Start Simple Contact -->
						<section class="bg-white simplecontact_section padding-py-12 z-index-3">
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<div class="mb-1 title_sections mb-sm-auto">
											<h2>Still not sure?</h2>
											<p>
												Reach out to us and ask us all your tough questions. 
												<a class="c-green2" href="mailto:team@buynoir.co">team@buynoir.co</a>
											</p>
										</div>
									</div>
									<div class="my-auto ml-auto col-md-6 text-sm-right">
										<button type="button"
											class="mt-3 btn rounded-12 sweep_top sweep_letter btn_md_primary c-white scale bg-green2">
											<div class="inside_item">
												<a href="{{route("buynoir.home.contactus")}}" alt="BuyNoir Contact Us">
													<span data-hover="Contact Us">
															Contact Us
													</span>
												</a>
											</div>
										</button>
									</div>
								</div>
								<div class="circle-ripple z-index-0 d-none d-sm-block">
									<div class="ripple ripple-1"></div>
									<div class="ripple ripple-2"></div>
									<div class="ripple ripple-3"></div>
								</div>
							</div>
						</section>
						<!-- End Simple Contact -->
					</main>
				</div>
				<!-- [id] content -->
		
		 
			</div>
			<!-- End. wrapper -->
		

		{{ view_render_event('bagisto.saas.companies.home.content.after') }}

	
		
@endsection

 


