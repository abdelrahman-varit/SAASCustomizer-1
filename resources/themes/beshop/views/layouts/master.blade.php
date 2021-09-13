<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <title>@yield('page_title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="{{ asset('themes/beshop/assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}">

    <!-- Fonts from tinyMCE -->
    <link rel="stylesheet" href="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/css/tinymce-fonts.css') }}">


    <link rel="stylesheet" href="{{ asset('themes/beshop/assets/css/stellarnav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/beshop/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/beshop/assets/css/style.css') }}">

    <!-- Color Scheme -->
    @php 
        $theme_color=$velocityMetaData->theme_color
    @endphp
    @if($theme_color!=="default" && !empty($theme_color))
        <link rel="stylesheet" href="{{ asset('themes/beshop/assets/css/colors/'.$theme_color.'.css') }}">
    @endif


    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
    crossorigin="anonymous"></script>

    @if ($favicon = core()->getCurrentChannel()->favicon_url)
        <link rel="icon" sizes="16x16" href="{{ $favicon }}" />
    @else
        <link rel="icon" sizes="16x16" href="{{ bagisto_asset('images/favicon.ico') }}" />
    @endif

    @yield('head')

    @section('seo')
        @if (! request()->is('/'))
            <meta name="description" content="{{ core()->getCurrentChannel()->description }}"/>
        @endif
    @show

    @stack('css')

    {!! view_render_event('bagisto.shop.layout.head') !!}

    <style>
        {!! core()->getConfigData('general.content.custom_scripts.custom_css') !!}
    </style>

    <style>
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: white;
        }
        .se-pre-con-inner {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        .se-pre-con-logo {
            max-width: 173px;
            height: auto;
            -webkit-transform: scale(1);
            -moz-transform: scale(1);
            transform: scale(1);
	        animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% {
                transform: scale(0.9);
            }
            70% {
                transform: scale(1);
            }
            100% {
                transform: scale(0.9);
            }
        }
    </style>

</head>


<body @if (core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif style="scroll-behavior: smooth;">
 
    {{-- <div class="se-pre-con">
        <div class="se-pre-con-inner">
            @if ($logo = core()->getCurrentChannel()->logo_url)                
                <img class="se-pre-con-logo" src="{{ $logo }}" />
            @else
                <img class="se-pre-con-logo" src="{{ asset('themes/beshop/assets/images/logo.svg') }}" />
            @endif
        </div>
    </div> --}}

    {!! view_render_event('bagisto.shop.layout.body.before') !!}

    <div id="app">
        <flash-wrapper ref='flashes'></flash-wrapper>
        
        {{-- <div class="main-container-wrapper"> --}}

            {!! view_render_event('bagisto.shop.layout.header.before') !!}

            @include('shop::layouts.header.index')

            {!! view_render_event('bagisto.shop.layout.header.after') !!}

            @yield('slider')

            <div class="content-container">

                {!! view_render_event('bagisto.shop.layout.content.before') !!}

                @yield('content-wrapper')

                {!! view_render_event('bagisto.shop.layout.content.after') !!}

            </div>

        {{-- </div> --}}

        {!! view_render_event('bagisto.shop.layout.footer.before') !!}

        @include('shop::layouts.footer.index')

        {!! view_render_event('bagisto.shop.layout.footer.after') !!}

        <overlay-loader :is-open="show_loader"></overlay-loader>
    </div>

    <div id="scrollTop" onclick="document.body.scrollTop = 0; document.documentElement.scrollTop = 0;"><i class="las la-angle-up"></i></div>

    <script type="text/javascript">
        window.flashMessages = [];

        @if ($success = session('success'))
            window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
            
        @elseif ($warning = session('warning'))
            window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
        @elseif ($error = session('error'))
            window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }
            ];
        @elseif ($info = session('info'))
            window.flashMessages = [{'type': 'alert-info', 'message': "{{ $info }}" }
            ];
        @endif

        window.serverErrors = [];
        @if(isset($errors))
            @if (count($errors))
                window.serverErrors = @json($errors->getMessages());
            @endif
        @endif
    </script>


    <script type="text/javascript" src="{{ asset('themes/beshop/assets/js/shop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>


    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    
    @stack('scripts')


    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    <div class="modal-overlay"></div>

    <script>
        {!! core()->getConfigData('general.content.custom_scripts.custom_javascript') !!}
    </script>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('themes/beshop/assets/js/stellarnav.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/beshop/assets/js/scripts.js') }}"></script>

    <script>
        $(window).on('load', function () {
            $(".se-pre-con").fadeOut("slow");
        });

        function showAlertMsg(msgType, msgText){
            document.getElementsByClassName('alert-wrapper')[0].innerHTML = `<div class='alert ${msgType}' style='color:#fff'>${msgText}</div>`;
            setTimeout(() => {
                document.getElementsByClassName('alert-wrapper')[0].innerHTML = '';
            }, 5000);
        }
    </script>
</body>

</html>