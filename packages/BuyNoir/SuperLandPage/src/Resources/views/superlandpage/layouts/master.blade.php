<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>@yield('page_title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="V8hWcwFuGVFvBlm5ZPjDeRI1VLR-EKORg47pmyi7riU" />
        @php
            $channel = company()->getCurrentChannel();
        @endphp
        @if ( $channel && $channel->favicon_url)
            <link rel="icon" sizes="16x16" href="{{ $channel->favicon_url }}" />
        @else
            <link rel="icon" sizes="16x16" href="{{ asset('vendor/webkul/ui/assets/images/favicon.ico') }}" />
        @endif

        <title>BuyNoir - The tools your business needs to sell more and grow more.</title>
        <!-- Bootstrap 4.5 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" type="text/css" />
        <!-- animate -->
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/animate.css')}}" type="text/css" />
        <!-- Swiper -->
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/swiper.min.css')}}" />
        <!-- aos -->
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/aos.css')}}" type="text/css" />
        <!-- icons -->
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/icons.css')}}" type="text/css" />
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/main.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/superlandpage-main.css')}}" type="text/css" />
        <!-- normalize -->
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/normalize.css')}}" type="text/css" />
      
        <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/webkul/saas/assets/css/tenant.css') }}">


        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/custom.css')}}" type="text/css" />

        
         <!-- jquery -->
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <!-- jquery-migrate -->
         <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>
         
        <!-- js for Brwoser -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

        @yield('css')

                <!-- mailchap code -->
                <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/0da7c10c869f70322ed8f6f7f/870dfe6e6688876caa9699515.js");</script>
        

        {!! view_render_event('bagisto.saas.companies.layout.head') !!}
    </head>
    @php
        $locale = company()->getCurrentLocale();
    @endphp
    <body @if ( isset($locale->direction) && $locale->direction == 'rtl') class="rtl" @endif style="scroll-behavior: smooth;">
        <div id="app">
            {!! view_render_event('bagisto.saas.companies.body.before') !!}

            <flash-wrapper ref='flashes'></flash-wrapper>

            {{-- @if( request()->is('index') ) --}}
            @if( request()->is('company/*') )
            @else
             @include ('superlandpage_view::superlandpage.nav-top')
            @endif



            <div class="main-container-wrapper">
                
                {{--  @if( request()->is('company/*') )
                    @include ('superlandpage_view::superlandpage.nav-top')
                @endif  --}}

                <div class="content-container">
                <div class="row">
                    @yield('content-wrapper')
                </div>
                </div>
            </div>
            
            {!! view_render_event('bagisto.saas.companies.layout.footer.before') !!}

            @if( request()->is('company/*') )
            @else
                @include('superlandpage_view::superlandpage.footer')
            @endif
               
           
            
            {!! view_render_event('bagisto.saas.companies.layout.footer.after') !!}
            
        </div>

        <script type="text/javascript">
            window.flashMessages = [];

            @if ($success = session('success'))
                window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
            @elseif ($warning = session('warning'))
                window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
            @elseif ($error = session('error'))
                window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }];
            @elseif ($info = session('info'))
                window.flashMessages = [{'type': 'alert-error', 'message': "{{ $info }}" }];
            @endif

            window.serverErrors = [];

            @if (isset($errors))
                @if (count($errors))
                    window.serverErrors = @json($errors->getMessages());
                @endif
            @endif
        </script>

    

        <!-- popper -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/popper.min.js')}}" type="text/javascript"></script>
        <!-- bootstrap -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!--
        ============
        vendor file
        ============
        -->
        <!-- particles -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/particles.min.js')}}" type="text/javascript"></script>
        <!-- TweenMax -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js" type="text/javascript"></script>
        <!-- ScrollMagic -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/ScrollMagic.js')}}" type="text/javascript"></script>
        <!-- animation.gsap -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/animation.gsap.js')}}" type="text/javascript"></script>
        <!-- addIndicators -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/debug.addIndicators.min.js')}}" type="text/javascript"></script>
        <!-- Swiper js -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/swiper.min.js')}}" type="text/javascript"></script>
        <!-- countdown -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/countdown.js')}}" type="text/javascript"></script>
        <!-- simpleParallax -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/simpleParallax.min.js')}}" type="text/javascript"></script>
        <!-- waypoints -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/waypoints.min.js')}}" type="text/javascript"></script>
        <!-- counterup -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <!-- charming -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/charming.min.js')}}" type="text/javascript"></script>
        <!-- imagesloaded -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/imagesloaded.pkgd.min.js')}}" type="text/javascript"></script>
        <!-- BX-Slider -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/jquery.bxslider.min.js')}}" type="text/javascript"></script>
        <!-- Aos -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/vendor/aos.js')}}" type="text/javascript"></script>
        <!-- main file -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/main.js')}}" type="text/javascript"></script>

        <script type="text/javascript" src="{{ asset('vendor/webkul/admin/assets/js/admin.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>


        @stack('scripts')

        <div class="modal-overlay"></div>

        {!! view_render_event('bagisto.saas.companies.body.after') !!}
    </body>
</html>