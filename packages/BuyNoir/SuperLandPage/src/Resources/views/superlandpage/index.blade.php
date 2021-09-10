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
                            <span class="sub-title">Growth Your Business</span>
                            <h1>We Provide Best Digital Marketing Solutions</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                            <div class="btn-box">
                                <div class="d-flex align-items-center">
                                    <a href="contact.html" class="default-btn">Get Started</a>
                                    <a href="https://www.youtube.com/watch?v=Y5KCDWi7h9o" class="video-btn popup-youtube"><i class="flaticon-play-button"></i> Watch Video</a>
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
                    <h2>Let’s Check Our Featured Services</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
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
                            <h3><a href="single-services.html">Marketing Analysis</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <a href="single-services.html" class="learn-more-btn"><i class="left-icon flaticon-next-button"></i> Learn More <i class="right-icon flaticon-next-button"></i></a>
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
                            <h3><a href="single-services.html">Website Optimization</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <a href="single-services.html" class="learn-more-btn"><i class="left-icon flaticon-next-button"></i> Learn More <i class="right-icon flaticon-next-button"></i></a>
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
                            <h3><a href="single-services.html">Email Marketing</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <a href="single-services.html" class="learn-more-btn"><i class="left-icon flaticon-next-button"></i> Learn More <i class="right-icon flaticon-next-button"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Services Area -->

        <!-- Start About Area -->
        <section class="about-area pb-100">
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
                                <h2>Enjoy Full-Service Digital Marketing Expertise</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                                <ul class="funfacts-list">
                                    <li>
                                        <div class="list">
                                            <i class="flaticon-menu-1"></i>
                                            <h3 class="odometer" data-count="376">00</h3>
                                            <p>Completed projects</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="list">
                                            <i class="flaticon-web-settings"></i>
                                            <h3 class="odometer" data-count="7548">00</h3>
                                            <p>Working hours were spent</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="list">
                                            <i class="flaticon-conversation"></i>
                                            <h3 class="odometer" data-count="350">00</h3>
                                            <p>Expert team members</p>
                                        </div>
                                    </li>
                                </ul>
                                <a href="about-us-1.html" class="default-btn">More About Us</a>
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
                            <h2>We Help to Website Growth With Next Level Visitor</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                            <div class="skills-item">
                                <div class="skills-header">
                                    <h4 class="skills-title">Digital Marketing & SEO</h4>
                                    <div class="skills-percentage">
                                        <div class="count-box">95%</div>
                                    </div>
                                </div>
                                <div class="skills-bar">
                                    <div class="bar-inner"><div class="bar progress-line" data-width="95"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="what-we-do-content-accordion">
                            <ul class="accordion">
                                <li class="accordion-item">
                                    <a class="accordion-title active" href="javascript:void(0)">
                                        <i class="flaticon-plus"></i>
                                        Social Media Optimization
                                    </a>
    
                                    <div class="accordion-content show">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="flaticon-plus"></i>
                                        Content Generation
                                    </a>
    
                                    <div class="accordion-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                                    </div>
                                </li>

                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="flaticon-plus"></i>
                                        Pay Per Click Services
                                    </a>
    
                                    <div class="accordion-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End What We Do Area -->

        <!-- Start Services Area -->
        <section class="services-area bg-f9f9f9 pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">Services</span>
                    <h2>Let’s Check Our Services</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon">
                                <i class="flaticon-megaphone"></i>
                                <div class="circles-box">
                                    <div class="circle-one"></div>
                                    <div class="circle-two"></div>
                                </div>
                            </div>
                            <h3><a href="single-services.html">Social Media Marketing</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <a href="single-services.html" class="learn-more-btn"><i class="left-icon flaticon-next-button"></i> Learn More <i class="right-icon flaticon-next-button"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon">
                                <i class="flaticon-keywords"></i>
                                <div class="circles-box">
                                    <div class="circle-one"></div>
                                    <div class="circle-two"></div>
                                </div>
                            </div>
                            <h3><a href="single-services.html">Keyward Research</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <a href="single-services.html" class="learn-more-btn"><i class="left-icon flaticon-next-button"></i> Learn More <i class="right-icon flaticon-next-button"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon">
                                <i class="flaticon-content-management"></i>
                                <div class="circles-box">
                                    <div class="circle-one"></div>
                                    <div class="circle-two"></div>
                                </div>
                            </div>
                            <h3><a href="single-services.html">Content Marketing</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <a href="single-services.html" class="learn-more-btn"><i class="left-icon flaticon-next-button"></i> Learn More <i class="right-icon flaticon-next-button"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon">
                                <i class="flaticon-ppc"></i>
                                <div class="circles-box">
                                    <div class="circle-one"></div>
                                    <div class="circle-two"></div>
                                </div>
                            </div>
                            <h3><a href="single-services.html">PPC Advertising</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <a href="single-services.html" class="learn-more-btn"><i class="left-icon flaticon-next-button"></i> Learn More <i class="right-icon flaticon-next-button"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon">
                                <i class="flaticon-competitor"></i>
                                <div class="circles-box">
                                    <div class="circle-one"></div>
                                    <div class="circle-two"></div>
                                </div>
                            </div>
                            <h3><a href="single-services.html">Competitor Research</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <a href="single-services.html" class="learn-more-btn"><i class="left-icon flaticon-next-button"></i> Learn More <i class="right-icon flaticon-next-button"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon">
                                <i class="flaticon-startup"></i>
                                <div class="circles-box">
                                    <div class="circle-one"></div>
                                    <div class="circle-two"></div>
                                </div>
                            </div>
                            <h3><a href="single-services.html">Skyrocketing Growth</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                            <a href="single-services.html" class="learn-more-btn"><i class="left-icon flaticon-next-button"></i> Learn More <i class="right-icon flaticon-next-button"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Area -->

        <!-- Start Testimonials Area -->
        <section class="testimonials-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <div class="testimonials-content">
                            <span class="sub-title">Testimonials</span>
                            <h2>What Our Clients Are Saying?</h2>

                            <div class="testimonials-slides owl-carousel owl-theme">
                                <div class="single-testimonials-item">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>

                                    <div class="client-info">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('buynoir/superlandpage/assets/img/user1.jpg')}}" alt="image">
                                            <div class="title">
                                                <h3>John Smith</h3>
                                                <span>Python Developer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-testimonials-item">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>

                                    <div class="client-info">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('buynoir/superlandpage/assets/img/user2.jpg')}}" alt="image">
                                            <div class="title">
                                                <h3>Sarah Taylor</h3>
                                                <span>Web Developer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-testimonials-item">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>

                                    <div class="client-info">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('buynoir/superlandpage/assets/img/user3.jpg')}}" alt="image">
                                            <div class="title">
                                                <h3>James Anderson</h3>
                                                <span>Web Designer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12">
                        <div class="testimonials-image">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/testimonials-img.jpg')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Area -->

        <!-- Start Partner Area -->
        <section class="partner-area bg-f9f9f9 ptb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-6 col-sm-4 col-md-4">
                        <div class="single-partner-item">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/partner/partner-img6.png')}}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 col-sm-4 col-md-4">
                        <div class="single-partner-item">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/partner/partner-img2.png')}}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 col-sm-4 col-md-4">
                        <div class="single-partner-item">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/partner/partner-img3.png')}}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 col-sm-4 col-md-4">
                        <div class="single-partner-item">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/partner/partner-img4.png')}}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 col-sm-4 col-md-4">
                        <div class="single-partner-item">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/partner/partner-img1.png')}}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 col-sm-4 col-md-4">
                        <div class="single-partner-item">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/partner/partner-img5.png')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Partner Area -->

        <!-- Start Team Area -->
        <section class="team-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-team-box">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img1.jpg')}}" alt="team-image">

                            <div class="content">
                                <h3>James Anderson</h3>
                                <span>CEO</span>
                            </div>

                            <ul class="social-link">
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-team-box">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img2.jpg')}}" alt="team-image">

                            <div class="content">
                                <h3>Sarah Taylor</h3>
                                <span>Marketing Lead</span>
                            </div>

                            <ul class="social-link">
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="section-title">
                            <span class="sub-title">Our Team</span>
                            <h2>We Help to Acheive Your Business Goal</h2>
                            <a href="team-1.html" class="learn-more-btn"><i class="left-icon flaticon-next-button"></i> View All <i class="right-icon flaticon-next-button"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-team-box">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img3.jpg')}}" alt="team-image">

                            <div class="content">
                                <h3>Taylor Sopia</h3>
                                <span>Web Designer</span>
                            </div>

                            <ul class="social-link">
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-team-box">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img4.jpg')}}" alt="team-image">

                            <div class="content">
                                <h3>Harry Steve</h3>
                                <span>Web Developer</span>
                            </div>

                            <ul class="social-link">
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-team-box">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img5.jpg')}}" alt="team-image">

                            <div class="content">
                                <h3>Alina Smith</h3>
                                <span>Advisor</span>
                            </div>

                            <ul class="social-link">
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-team-box">
                            <img src="{{ asset('buynoir/superlandpage/assets/img/team/team-img6.jpg')}}" alt="team-image">

                            <div class="content">
                                <h3>David Warner</h3>
                                <span>Support</span>
                            </div>

                            <ul class="social-link">
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                                <li><a href="#" class="d-block" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Team Area -->

        <!-- Start Pricing Area -->
        <section class="pricing-area bg-f9f9f9 pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">Pricing</span>
                    <h2>Our Flexible Pricing Plan</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-pricing-box">
                            <div class="pricing-header">
                                <div class="icon">
                                    <i class="flaticon-paper-plane"></i>
                                    <div class="circles-box">
                                        <div class="circle-one"></div>
                                    </div>
                                </div>
                                <h3>Starter Plan</h3>
                            </div>

                            <div class="pricing-features">
                                <ul>
                                    <li>10GB Bandwidth Internet</li>
                                    <li>Business & Financ Analysing</li>
                                    <li>25 Social Media Reviews</li>
                                    <li>Customer Managemet</li>
                                    <li>24/7 Support</li>
                                </ul>
                            </div>

                            <div class="price">
                                $49.99
                                <span>Per Month</span>
                            </div>

                            <a href="#" class="default-btn">Book Now</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-pricing-box">
                            <div class="pricing-header">
                                <div class="icon">
                                    <i class="flaticon-jigsaw"></i>
                                    <div class="circles-box">
                                        <div class="circle-one"></div>
                                    </div>
                                </div>
                                <h3>Advance Plan</h3>
                            </div>

                            <div class="pricing-features">
                                <ul>
                                    <li>15GB Bandwidth Internet</li>
                                    <li>Business & Financ Analysing</li>
                                    <li>30 Social Media Reviews</li>
                                    <li>Customer Managemet</li>
                                    <li>24/7 Support</li>
                                </ul>
                            </div>

                            <div class="price">
                                $69.99
                                <span>Per Month</span>
                            </div>

                            <a href="#" class="default-btn">Book Now</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                        <div class="single-pricing-box">
                            <div class="pricing-header">
                                <div class="icon">
                                    <i class="flaticon-diamond"></i>
                                    <div class="circles-box">
                                        <div class="circle-one"></div>
                                    </div>
                                </div>
                                <h3>Premium Plan</h3>
                            </div>

                            <div class="pricing-features">
                                <ul>
                                    <li>50GB Bandwidth Internet</li>
                                    <li>Business & Financ Analysing</li>
                                    <li>35 Social Media Reviews</li>
                                    <li>Customer Managemet</li>
                                    <li>24/7 Support</li>
                                </ul>
                            </div>

                            <div class="price">
                                $99.99
                                <span>Per Month</span>
                            </div>

                            <a href="#" class="default-btn">Book Now</a>
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
                    <span class="sub-title">Dibiz Updates</span>
                    <h2>Subscribe To Our Newsletter</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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

 


