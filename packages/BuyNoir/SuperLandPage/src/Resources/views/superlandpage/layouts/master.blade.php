@php
    $channel = company()->getCurrentChannel();
    $locale = company()->getCurrentLocale();
@endphp
<!doctype html>
<html lang="{{ config('app.locale') }}" @if (isset($locale->direction) && $locale->direction == 'rtl') dir="rtl" @endif>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="V8hWcwFuGVFvBlm5ZPjDeRI1VLR-EKORg47pmyi7riU" />
		<meta name="facebook-domain-verification" content="jzbyb93y51hd3oos0otv55095d17v3" />

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/boxicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/meanmenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/nice-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/odometer.min.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/magnific-popup.min.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/superlandpage/assets/css/custom.css') }}">

        <title>@yield('page_title')</title>
        
        @if ( $channel && $channel->favicon_url)
            <link rel="icon" sizes="16x16" href="{{ $channel->favicon_url }}" />
        @else
            <link rel="icon" sizes="16x16" href="{{ asset('vendor/webkul/ui/assets/images/favicon.ico') }}" />
        @endif

        
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- jquery-migrate -->
        <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>
        <!--vuejs-->
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>


        @yield('css')
        <!-- mailchap code -->
        <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/0da7c10c869f70322ed8f6f7f/870dfe6e6688876caa9699515.js");</script>

        {!! view_render_event('bagisto.saas.companies.layout.head') !!}
    </head>
    <body>
        <div id="app">
            {!! view_render_event('bagisto.saas.companies.body.before') !!}

            <flash-wrapper ref='flashes'></flash-wrapper>

            @if( !request()->is('company/*') )
                @include ('superlandpage_view::superlandpage.nav-top')
            @endif

            @yield('content-wrapper')

            
            {!! view_render_event('bagisto.saas.companies.layout.footer.before') !!}

            @if(!request()->is('company/*') )
                @include('superlandpage_view::superlandpage.footer')
            @endif

            {!! view_render_event('bagisto.saas.companies.layout.footer.after') !!}

            <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>
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

        <!-- Links of JS files -->
        <script src="{{ asset('buynoir/superlandpage/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/appear.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/odometer.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/magnific-popup.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/fancybox.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/meanmenu.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/nice-select.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/sticky-sidebar.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/form-validator.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/contact-form-script.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('buynoir/superlandpage/assets/js/main.js') }}"></script>

        <script type="text/javascript" src="{{ asset('vendor/webkul/admin/assets/js/admin.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>
        
        @stack('scripts')

        {!! view_render_event('bagisto.saas.companies.body.after') !!}
    </body>
</html>