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
		
		<!-- Start Main Banner Area -->
        <section class="main-banner-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="main-banner-content">
                            <h1>We power your black and brown owned online business</h1>
                            <p>The world's only platform dedicated to powering black and brown owned e-commerce businesses. We give you the tools you need to build and grow your online business. Start your online business and grow with us.</p>
                            <div class="btn-box">
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('company.create.index') }}" class="default-btn">Start now</a>
                                    {{-- <a href="https://www.youtube.com/watch?v=Y5KCDWi7h9o" class="video-btn popup-youtube"><i class="flaticon-play-button"></i> Watch video</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="main-banner-image">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/banner-img1.jpg')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="shape1"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape1.png')}}" alt="image"></div>
            <div class="shape2"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape2.png')}}" alt="image"></div>
            <div class="shape3"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape3.png')}}" alt="image"></div>
            <div class="shape4"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape4.png')}}" alt="image"></div>
            <div class="shape5"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape5.png')}}" alt="image"></div>
            <div class="shape6"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape6.png')}}" alt="image"></div>
            <div class="shape7"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape7.png')}}" alt="image"></div>
            <div class="shape8"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape8.png')}}" alt="image"></div>
        </section>
        <!-- End Main Banner Area -->
        
        <!-- Start Featured Services Area -->
        <section class="featured-services-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">Features</span>
                    <h2>This is how we do it</h2>
                    <p>We give you a premade online shop to sell your stuff. All you have to do is select a template that matches your style, upload your products, and sell your stuff.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-featured-services-box">
                            <div class="icon">
                                <i class="flaticon-research"></i>
                                <div class="circles-box">
                                    <div class="circle-one"></div>
                                    <div class="circle-two"></div>
                                </div>
                            </div>
                            <h3><a href="javascript:void(0)">No coding required</a></h3>
                            <p>It's so simple. Select a template, upload your products, and sell! No need for coding, hosting, or any technical nery stuff. We've got that part covered.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-featured-services-box">
                            <div class="icon">
                                <i class="flaticon-speed"></i>
                                <div class="circles-box">
                                    <div class="circle-one"></div>
                                    <div class="circle-two"></div>
                                </div>
                            </div>
                            <h3><a href="javascript:void(0)">Beautifully Designed Templates</a></h3>
                            <p>Simple, mobile ready, and beautifully designed. Your online shop's look and feel will appeal to your customers and give your brand a refined feel.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                        <div class="single-featured-services-box">
                            <div class="icon">
                                <i class="flaticon-email-marketing"></i>
                                <div class="circles-box">
                                    <div class="circle-one"></div>
                                    <div class="circle-two"></div>
                                </div>
                            </div>
                            <h3><a href="javascript:void(0)">Data Insights</a></h3>
                            <p>Data is power. We pull together the right data about your sales and your buyers to help inform you on how, when, and where to grow your business.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Services Area -->

        <!-- Start About Area -->
        <section class="about-area pb-100" id="about-us">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-image">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/about-img1.jpg')}}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="about-content">
                            <div class="content">
                                <span class="sub-title">About Us</span>
                                <h2>We give power to your black and brown owned online business</h2>
                                <p>BuyNoir is the platform that black and brown owned businesses are powered by. We give you the tech you need to be successful selling your stuff and growing your business. We are black and brown owned, built specifically to power black and brown owned businesses.</p>
                                <ul class="funfacts-list">
                                    <li>
                                        <div class="list">
                                            <i class="flaticon-menu-1"></i>
                                            <h3 class="odometer" data-count="5">00</h3>
                                            <p>Templates, and growing</p>
                                        </div>
                                    </li>                                    
                                    <li>
                                        <div class="list">
                                            <i class="flaticon-conversation"></i>
                                            <h3 class="odometer" data-count="24">00</h3>hr
                                            <p>Email Support</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="list">
                                            <i class="flaticon-web-settings"></i>
                                            <h3><span class='bx bx-infinite fw-bold'></span></h3>
                                            <p>Possibilities</p>
                                        </div>
                                    </li>
                                </ul>
                                <a href="{{ route('company.create.index') }}" class="default-btn">Open Your Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Area -->


        <!-- Start What We Do Area -->
        <section class="what-we-do-area pb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="what-we-do-content">
                            <span class="sub-title">What We Do</span>
                            <h2>We provide the technology you need to bring your business online.</h2>
                            <p>You worry about making and creating the things you're passionate about, and we'll take care of the geeky stuff.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="what-we-do-content-accordion">
                            <ul class="accordion">
                                <li class="accordion-item">
                                    <a class="accordion-title active" href="javascript:void(0)">
                                        <i class="flaticon-plus"></i>
                                        Online digital shops
                                    </a>
    
                                    <div class="accordion-content show">
                                        <p>There are no more excuses. We've taken care of all of your technology needs. Simply select a shop template, add products and GO!</p>
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="flaticon-plus"></i>
                                        No code templates
                                    </a>
    
                                    <div class="accordion-content">
                                        <p>Named after our favorite R&B and Jazz musicians, our templates are beautiful, simple, and fully responsive. With your BuyNoir shop, you'll give your customers a beautiful shopping experience that keeps them coming back.</p>
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="flaticon-plus"></i>
                                        Ujamaa (Co-operative Economics)
                                    </a>
    
                                    <div class="accordion-content">
                                        <p>Coming soon are tools to aid our communities in building co-operative economics. More exciting  features to come.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End What We Do Area -->

        <!-- Start Pricing Area -->
        <section class="pricing-area bg-f9f9f9 pt-100 pb-70" id="pricing">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">Pricing</span>
                    <h2>Our pricing is simple</h2>
                    <p>Open your shop today and we'll cover the first 10 days, <strong>free</strong>. After that, you pay a simple monthly cost to keep your shop running. We don't take any of your sales income. You keep 100% of your profits.</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-pricing-box">
                            <div class="pricing-header">
                                <div class="icon">
                                    <i class="flaticon-paper-plane"></i>
                                    <div class="circles-box">
                                        <div class="circle-one"></div>
                                    </div>
                                </div>
                                <h3>Grow with us</h3>
                            </div>

                            <div class="pricing-features">
                                <ul>
                                    <li>Unlimited Products</li>
                                    <li>Unlimited Orders</li>
                                    <li>Unlimited Storage</li>
                                    <li>Email Support</li>
                                    <li>Keep all profits</li>
                                </ul>
                            </div>

                            <div class="price">
                                $19.99
                                <span>Per Month</span>
                            </div>

                            <a href="{{ route('company.create.index') }}" class="default-btn">Open Your Shop</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Pricing Area -->

        <!-- Start Subscribe Area -->
        <section class="subscribe-area ptb-100">
            <div class="container">
                <div class="subscribe-content">
                    <span class="sub-title">Keep in touch</span>
                    <h2>Subscribe To Our Newsletter</h2>
                    <p>Get connected with us. Learn what we're up to and how we're growing.</p>
                    <form class="newsletter-form" data-bs-toggle="validator">
                        <input type="text" class="input-newsletter" placeholder="Enter your email address" name="EMAIL" required autocomplete="off">
                        <button type="submit" class="default-btn">Subscribe Now</button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>

            <div class="shape9"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape9.png')}}" alt="image"></div>
            <div class="shape10"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape10.png')}}" alt="image"></div>
            <div class="shape11"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape11.png')}}" alt="image"></div>
            <div class="shape12"><img src="{{ asset('buynoir/superlandpage/assets/img/shape/shape12.png')}}" alt="image"></div>
        </section>
        <!-- End Subscribe Area -->

	{{ view_render_event('bagisto.saas.companies.home.content.after') }}
@endsection

 


