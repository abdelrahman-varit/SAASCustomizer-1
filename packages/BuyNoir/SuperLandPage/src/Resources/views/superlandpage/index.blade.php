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
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512" xmlns:v="https://vecta.io/nano"><path d="M457.846 24.615H54.154C24.293 24.615 0 48.909 0 78.769v221.538 34.462c0 29.86 24.293 54.154 54.154 54.154h130.759l-15.754 78.769h-51.005a9.85 9.85 0 0 0-9.846 9.846 9.85 9.85 0 0 0 9.846 9.846h275.692a9.85 9.85 0 0 0 9.846-9.846 9.85 9.85 0 0 0-9.846-9.846h-51.005l-15.754-78.769h130.759c29.86 0 54.154-24.293 54.154-54.154v-34.462V78.769c0-29.86-24.293-54.154-54.154-54.154zM189.241 467.692l15.754-78.769h102.01l15.754 78.769H189.241zm303.067-132.923c0 19.002-15.459 34.462-34.462 34.462H54.154c-19.002 0-34.462-15.459-34.462-34.462v-24.615h472.615v24.615zm0-44.307H19.692V270.77h59.077a9.85 9.85 0 0 0 9.846-9.846 9.85 9.85 0 0 0-9.846-9.846H19.692V78.769c0-19.002 15.459-34.462 34.462-34.462h403.692c19.002 0 34.462 15.459 34.462 34.462v211.693zM256 320c-10.858 0-19.692 8.834-19.692 19.692s8.834 19.692 19.692 19.692 19.692-8.834 19.692-19.692S266.858 320 256 320zm80.612-106.815l-20.887-20.887 17.406-17.405c2.531-2.531 3.489-6.236 2.502-9.677a9.85 9.85 0 0 0-7.251-6.88l-90.51-20.887c-3.307-.761-6.775.231-9.177 2.632a9.85 9.85 0 0 0-2.632 9.177l20.889 90.509a9.85 9.85 0 0 0 16.557 4.749l17.405-17.406 20.887 20.887c1.923 1.923 4.443 2.884 6.962 2.884s5.04-.961 6.962-2.884l20.887-20.887a9.85 9.85 0 0 0 0-13.925zm-27.849 13.925l-20.887-20.887c-1.923-1.923-4.443-2.884-6.962-2.884s-5.04.961-6.962 2.884l-11.806 11.807-13.35-57.849 57.849 13.349-11.807 11.806a9.85 9.85 0 0 0 0 13.925l20.887 20.887-6.962 6.962zm-93.292-114.179l-9.846-9.846a9.85 9.85 0 0 0-13.925 0 9.85 9.85 0 0 0 0 13.925l9.847 9.846c1.923 1.923 4.443 2.884 6.962 2.884s5.04-.961 6.962-2.884a9.85 9.85 0 0 0 0-13.925zm-19.197 26.656H182.35a9.85 9.85 0 0 0-9.846 9.846 9.85 9.85 0 0 0 9.846 9.846h13.924a9.85 9.85 0 0 0 9.846-9.846 9.85 9.85 0 0 0-9.846-9.846zm19.197 32.421a9.85 9.85 0 0 0-13.924 0l-9.846 9.846a9.85 9.85 0 0 0 0 13.925c1.923 1.923 4.443 2.884 6.962 2.884s5.04-.961 6.962-2.884l9.846-9.846a9.85 9.85 0 0 0 0-13.925zm68.924-68.923a9.85 9.85 0 0 0-13.925 0l-9.846 9.846a9.85 9.85 0 0 0 0 13.925c1.923 1.923 4.443 2.884 6.963 2.884a9.81 9.81 0 0 0 6.962-2.884l9.846-9.846a9.85 9.85 0 0 0 0-13.925zm-46.346-19.197a9.85 9.85 0 0 0-9.846 9.846v13.924a9.85 9.85 0 0 0 9.846 9.846 9.85 9.85 0 0 0 9.846-9.846V93.734a9.85 9.85 0 0 0-9.846-9.846z"/><path d="M117.957 259.003a9.55 9.55 0 0 0-.561-1.851 9.95 9.95 0 0 0-.906-1.694 9.38 9.38 0 0 0-1.221-1.497c-.453-.453-.955-.866-1.497-1.221a9.77 9.77 0 0 0-1.703-.906c-.591-.246-1.211-.443-1.841-.561-1.27-.256-2.57-.256-3.84 0-.63.118-1.25.315-1.841.561a9.63 9.63 0 0 0-1.703.906 9.38 9.38 0 0 0-1.497 1.221c-.453.453-.866.955-1.221 1.497a10.02 10.02 0 0 0-.906 1.694 9.55 9.55 0 0 0-.561 1.851 9.7 9.7 0 0 0-.197 1.92 9.7 9.7 0 0 0 .197 1.92c.118.63.315 1.25.561 1.841a9.63 9.63 0 0 0 .906 1.703 9.38 9.38 0 0 0 1.221 1.497c.453.453.955.866 1.497 1.221a9.77 9.77 0 0 0 1.703.906 9.99 9.99 0 0 0 1.841.571c.63.128 1.28.187 1.92.187s1.29-.059 1.92-.187a9.99 9.99 0 0 0 1.841-.571 9.63 9.63 0 0 0 1.703-.906 9.38 9.38 0 0 0 1.497-1.221c.453-.453.866-.955 1.221-1.497a9.77 9.77 0 0 0 .906-1.703c.246-.591.443-1.211.561-1.841a9.7 9.7 0 0 0 .197-1.92 9.7 9.7 0 0 0-.197-1.92z"/></svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#290390" width="35" height="35" viewBox="0 0 512 512" xmlns:v="https://vecta.io/nano"><path d="M94 0H70C31.402 0 0 31.402 0 70v372c0 38.598 31.402 70 70 70h24c38.598 0 70-31.402 70-70V70c0-38.598-31.402-70-70-70zm30 442c0 16.542-13.458 30-30 30H70c-16.542 0-30-13.458-30-30V70c0-16.542 13.458-30 30-30h24c16.542 0 30 13.458 30 30v372zM442 0H276c-38.598 0-70 31.402-70 70v24c0 38.598 31.402 70 70 70h166c38.598 0 70-31.402 70-70V70c0-38.598-31.402-70-70-70zm30 94c0 16.542-13.458 30-30 30H276c-16.542 0-30-13.458-30-30V70c0-16.542 13.458-30 30-30h166c16.542 0 30 13.458 30 30v24zm-30 113H276c-38.598 0-70 31.402-70 70v165c0 38.598 31.402 70 70 70h166c38.598 0 70-31.402 70-70 0-11.046-8.954-20-20-20s-20 8.954-20 20c0 16.542-13.458 30-30 30H276c-16.542 0-30-13.458-30-30V277c0-16.542 13.458-30 30-30h166c16.542 0 30 13.458 30 30v65c0 11.046 8.954 20 20 20s20-8.954 20-20v-65c0-38.598-31.402-70-70-70z"/></svg>
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
                                <svg fill="#1fa299" enable-background="new 0 0 512 512" height="40" viewBox="0 0 512 512" width="40" xmlns="http://www.w3.org/2000/svg"><g><path d="m229.517 235.184h-37.376l-1.401-5.608c-1.648-6.592-7.546-11.196-14.341-11.196h-40.986c-8.769 0-15.902 7.134-15.902 15.902v67.777c0 8.769 7.134 15.902 15.902 15.902h13.804c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-13.804c-.498 0-.902-.405-.902-.902v-67.777c0-.498.404-.902.902-.902h40.816l1.401 5.608c1.648 6.592 7.546 11.196 14.341 11.196h37.546c.497 0 .902.405.902.902v50.973c0 .497-.405.902-.902.902h-45.301c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h45.301c8.769 0 15.902-7.133 15.902-15.902v-50.973c0-8.768-7.134-15.902-15.902-15.902zm0-120.88h-37.376l-1.401-5.608c-1.648-6.592-7.546-11.196-14.341-11.196h-40.986c-8.769 0-15.902 7.134-15.902 15.902v67.777c0 8.769 7.134 15.902 15.902 15.902h94.104c8.769 0 15.902-7.133 15.902-15.902v-50.973c0-8.768-7.134-15.902-15.902-15.902zm.902 66.876c0 .497-.405.902-.902.902h-94.104c-.498 0-.902-.405-.902-.902v-67.777c0-.498.404-.902.902-.902h40.816l1.401 5.608c1.648 6.592 7.546 11.196 14.341 11.196h37.546c.497 0 .902.405.902.902zm-103.409-151.18c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5 7.5-3.358 7.5-7.5-3.358-7.5-7.5-7.5zm30 0c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5 7.5-3.358 7.5-7.5-3.358-7.5-7.5-7.5zm30 0c-4.142 0-7.5 3.358-7.5 7.5s3.358 7.5 7.5 7.5 7.5-3.358 7.5-7.5-3.358-7.5-7.5-7.5zm197.98 67.5h-113.659c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h113.659c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5zm-30 180.88h-83.659c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h83.659c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5zm30-150.88h-113.659c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h113.659c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5zm89.51-84.46h-52.01v-23.54c0-10.752-8.748-19.5-19.5-19.5h-293.98c-10.752 0-19.5 8.748-19.5 19.5v23.54h-52.01c-20.678 0-37.5 16.822-37.5 37.5v282.42c0 20.678 16.822 37.5 37.5 37.5h175.384l-5.712 42.455h-8.357c-6.941 0-13.083 4.671-14.937 11.357l-10.562 38.085c-1.307 4.707-.359 9.637 2.597 13.525s7.454 6.118 12.339 6.118h135.496c4.885 0 9.383-2.23 12.339-6.118s3.903-8.818 2.598-13.524l-10.563-38.084c-1.854-6.688-7.995-11.359-14.937-11.359h-8.357l-5.712-42.455h175.384c20.678 0 37.5-16.822 37.5-37.5v-282.42c0-20.678-16.822-37.5-37.5-37.5zm-369.99-23.54c0-2.481 2.019-4.5 4.5-4.5h293.98c2.481 0 4.5 2.019 4.5 4.5v40.5h-302.98zm0 55.5h302.98v25c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-11.96h44.51v252.42h-44.51v-205.46c0-4.142-3.357-7.5-7.5-7.5s-7.5 3.358-7.5 7.5v205.46h-302.98zm208.676 382.915c.224 0 .422.15.481.365v.001l10.563 38.086c.095.242-.222.661-.482.633h-135.496c-.261.027-.58-.388-.481-.634l10.563-38.087c.06-.215.258-.365.481-.365h114.371zm-90.88-15 5.712-42.455h55.963l5.712 42.455zm274.694-79.955c0 12.407-10.094 22.5-22.5 22.5h-437c-12.406 0-22.5-10.093-22.5-22.5v-282.42c0-12.407 10.094-22.5 22.5-22.5h52.01v15h-48.01c-6.341 0-11.5 5.159-11.5 11.5v259.42c0 6.341 5.159 11.5 11.5 11.5h429c6.341 0 11.5-5.159 11.5-11.5v-259.42c0-6.341-5.159-11.5-11.5-11.5h-48.01v-15h52.01c12.406 0 22.5 10.093 22.5 22.5zm-407.49-274.92v252.42h-44.51v-252.42zm295.48 160.34h-113.659c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h113.659c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5zm-113.659-75.88h83.659c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5h-83.659c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5zm113.659 45.88h-113.659c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h113.659c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5z"/></g></svg>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 0 512.009 512.009" width="40" xmlns:v="https://vecta.io/nano"><path d="M376.505 391.634c-8.067 0-16.012 1.286-23.569 3.781-6.777-15.826-17.421-29.947-30.965-40.832-14.696-11.811-32.395-19.411-50.966-22.096V210.339c21.302-1.41 59.588-7.784 86.006-34.203 37.556-37.557 34.615-99.132 34.471-101.735-.421-7.634-6.517-13.73-14.151-14.151-2.601-.145-64.178-3.085-101.734 34.471-3.996 3.996-7.529 8.266-10.661 12.705-5.502-22.109-15.843-46.81-35.171-66.138C184.904-3.572 111.084-.045 107.965.128c-7.634.421-13.73 6.517-14.151 14.151-.172 3.121-3.701 76.94 41.16 121.8 32.865 32.865 81.266 39.758 106.03 41.027v155.379c-18.571 2.686-36.27 10.285-50.966 22.096-13.544 10.885-24.188 25.006-30.965 40.832-7.557-2.495-15.502-3.781-23.569-3.781-41.493 0-75.25 33.757-75.25 75.25v30.125c0 8.284 6.716 15 15 15h361.5c8.284 0 15-6.716 15-15v-30.125c.001-41.491-33.756-75.248-75.249-75.248zm45.25 90.375h-331.5v-15.125c0-24.951 20.299-45.25 45.25-45.25a45.06 45.06 0 0 1 24.385 7.145c4.102 2.632 9.227 3.107 13.743 1.275a15 15 0 0 0 8.967-10.493c7.988-34.253 38.173-58.177 73.405-58.177s65.417 23.923 73.405 58.177a15 15 0 0 0 22.71 9.218 45.06 45.06 0 0 1 24.385-7.145c24.951 0 45.25 20.299 45.25 45.25zM208.553 62.503c24.922 24.922 30.826 63.7 32.134 84.535-20.805-1.268-59.458-7.127-84.5-32.169-24.922-24.922-30.827-63.7-32.135-84.535 20.805 1.267 59.459 7.127 84.501 32.169zm88.257 53.433c18.574-18.575 47.039-23.838 64.213-25.27-1.473 17.217-6.774 45.806-25.226 64.258-18.576 18.576-47.04 23.838-64.214 25.27 1.474-17.217 6.775-45.806 25.227-64.258z"/></svg>
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

 


