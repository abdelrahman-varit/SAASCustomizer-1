<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <title>@yield('page_title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;700&display=swap">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    {{-- <link rel="stylesheet" href="{{ bagisto_asset('css/shop.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('themes/toni-braxton/assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}">

    <!-- Fonts from tinyMCE -->
    <link rel="stylesheet" href="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/css/tinymce-fonts.css') }}">


    <link rel="stylesheet" href="{{ asset('themes/toni-braxton/assets/css/greedynav.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/toni-braxton/assets/css/stellarnav.min.css') }}">

    <link rel="stylesheet" href="{{ asset('themes/toni-braxton/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/toni-braxton/assets/css/responsive.css') }}">

    <!-- Color Scheme -->
    @php 
        $theme_color=$velocityMetaData->theme_color
    @endphp
    
    @if($theme_color!=="default" && !empty($theme_color))
        <link rel="stylesheet" href="{{ asset('themes/toni-braxton/assets/css/colors/'.$theme_color.'.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('themes/toni-braxton/assets/css/colors/blue.css') }}">
    @endif


    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
    crossorigin="anonymous"></script>

    @if ($favicon = core()->getCurrentChannel()->favicon_url)
        <link rel="icon" href="{{ $favicon }}" />
    @else
        <link rel="icon" href="{{ asset('vendor/webkul/ui/assets/images/favicon.png') }}" />
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

    <script>
    (function(apiKey){
        (function(p,e,n,d,o){var v,w,x,y,z;o=p[d]=p[d]||{};o._q=o._q||[];
        v=['initialize','identify','updateOptions','pageLoad','track'];for(w=0,x=v.length;w<x;++w)(function(m){
            o[m]=o[m]||function(){o._q[m===v[0]?'unshift':'push']([m].concat([].slice.call(arguments,0)));};})(v[w]);
            y=e.createElement(n);y.async=!0;y.src='https://cdn.pendo.io/agent/static/'+apiKey+'/pendo.js';
            z=e.getElementsByTagName(n)[0];z.parentNode.insertBefore(y,z);})(window,document,'script','pendo');
    })('c30eb5ea-c10a-4003-6523-301d180cb010');

    // in your authentication promise handler or callback
    pendo.initialize({
        visitor: {
            id:              "{{time()}}"   // Required if user is logged in
            // email:        // Recommended if using Pendo Feedback, or NPS Email
            // full_name:    // Recommended if using Pendo Feedback
            // role:         // Optional

            // You can add any additional visitor level key-values here,
            // as long as it's not one of the above reserved names.
        },

        account: {
            id:           "{{time()}}" // Required if using Pendo Feedback
            // name:         // Optional
            // is_paying:    // Recommended if using Pendo Feedback
            // monthly_value:// Recommended if using Pendo Feedback
            // planLevel:    // Optional
            // planPrice:    // Optional
            // creationDate: // Optional

            // You can add any additional account level key-values here,
            // as long as it's not one of the above reserved names.
        }
    });

    </script>

</head>


<body @if (core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif>
 
    <div class="se-pre-con">
        <div class="se-pre-con-inner">
            @if ($logo = core()->getCurrentChannel()->logo_url)                
                <img class="se-pre-con-logo" src="{{ $logo }}" />
            @else
                <img class="se-pre-con-logo" src="{{ asset('themes/toni-braxton/assets/images/logo.svg') }}" />
            @endif
        </div>
    </div>

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

        @if (core()->getConfigData('general.content.footer.footer_toggle'))
            <div class="footer footer-copyright">
                <div class="main-container-wrapper">
                    <div class="footer-copyright-inner">
                        <p>
                            @if (core()->getConfigData('general.content.footer.footer_content'))
                                {{ core()->getConfigData('general.content.footer.footer_content') }}
                            @else
                                {!! trans('admin::app.footer.copy-right') !!}
                            @endif
                        </p>
                        <a href="https://buynoir.co">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="30.746" xmlns:v="https://vecta.io/nano">
                                <path fill="#fff" d="M1.126 2.456v1.522H.467V.082h1.445c.747 0 1.241.505 1.241 1.187s-.494 1.187-1.241 1.187h-.786zm.687-.583c.418 0 .67-.231.67-.599 0-.374-.253-.61-.67-.61h-.687v1.209h.687zM5.515 0a1.95 1.95 0 0 1 1.983 2.027c0 1.28-.961 2.033-1.983 2.033s-1.978-.753-1.978-2.033C3.537.753 4.493 0 5.515 0zm0 3.433c.659 0 1.307-.467 1.307-1.406S6.174.621 5.515.621c-.654 0-1.302.467-1.302 1.406s.648 1.406 1.302 1.406zM12.447.082h.681l-1.093 3.895h-.681l-.945-2.944-.945 2.944h-.675L7.684.082h.692l.78 2.846.912-2.846h.687l.928 2.868.764-2.868zm1.219 3.895V.082h2.406v.615h-1.747V1.73h1.582v.599h-1.582v1.033h1.747v.615h-2.406zm4.345-1.538h-.483v1.538h-.665V.082h1.494c.753 0 1.22.522 1.22 1.181 0 .555-.335.978-.879 1.11l.879 1.604h-.747l-.819-1.538zm.225-.582c.407 0 .67-.236.67-.593 0-.363-.264-.599-.67-.599h-.709v1.192h.709zm2.044 2.12V.082h2.406v.615h-1.747V1.73h1.582v.599h-1.582v1.033h1.747v.615H20.28zm3.196 0V.082h1.379c1.06 0 1.895.703 1.895 1.956 0 1.247-.846 1.939-1.901 1.939h-1.373zm1.352-.604c.676 0 1.236-.434 1.236-1.335 0-.912-.555-1.351-1.231-1.351h-.698v2.686h.693zM30.145.082c.747 0 1.187.439 1.187 1.049 0 .412-.242.72-.577.841.412.11.698.467.698.928 0 .626-.483 1.077-1.209 1.077h-1.439V.082h1.34zm-.088 1.648c.385 0 .615-.22.615-.544 0-.33-.231-.544-.632-.544h-.582V1.73h.599zm.071 1.687c.395 0 .654-.214.654-.56 0-.335-.225-.571-.632-.571h-.692v1.132h.67zM31.672.082h.78l.934 1.632.939-1.632h.742l-1.373 2.247v1.648h-.659V2.329L31.672.082z" fill="#1a1a1a"/><path d="M7.436 6.454c3.928 0 6.201 2.186 6.201 5.128 0 1.97-1.291 3.59-2.918 4.103 1.796.405 3.535 1.997 3.535 4.48 0 3.131-2.469 5.425-6.229 5.425H0V6.454h7.436zm-.702 7.666c1.543 0 2.553-.783 2.553-2.078 0-1.242-.87-2.051-2.61-2.051H4.321v4.13h2.413zm.365 7.989c1.712 0 2.75-.864 2.75-2.24 0-1.323-1.01-2.24-2.75-2.24H4.321v4.48h2.778zm17.115 2.132c-.73 1.161-2.329 1.646-3.732 1.646-3.395 0-5.303-2.375-5.303-5.236v-8.475h4.265v7.611c0 1.296.73 2.321 2.245 2.321 1.431 0 2.329-.945 2.329-2.294v-7.638h4.265v11.012c0 1.215.112 2.186.14 2.402h-4.097c-.056-.242-.112-.998-.112-1.349zm7.155 6.505l3.171-6.964-5.864-11.606h4.77l3.395 7.179 3.087-7.179h4.517l-8.586 18.569h-4.49zm26.459-5.156l-8.193-12.578V25.59H45.23V6.454h5.387l7.464 11.633V6.454h4.433V25.59h-4.686zm20.679-6.72c0 4.156-3.227 7.125-7.408 7.125-4.153 0-7.408-2.969-7.408-7.125s3.255-7.099 7.408-7.099c4.181 0 7.408 2.942 7.408 7.099zm-4.265 0c0-2.267-1.515-3.32-3.143-3.32-1.599 0-3.143 1.053-3.143 3.32 0 2.24 1.543 3.347 3.143 3.347 1.628 0 3.143-1.08 3.143-3.347zm7.463-13.198c1.403 0 2.525 1.08 2.525 2.402s-1.122 2.402-2.525 2.402c-1.347 0-2.469-1.08-2.469-2.402s1.122-2.402 2.469-2.402zM79.601 25.59V12.176h4.265V25.59h-4.265zm15.207-9.365c-.477-.108-.926-.135-1.347-.135-1.712 0-3.255.972-3.255 3.644v5.857h-4.265V12.176h4.125v1.808c.73-1.511 2.497-1.943 3.62-1.943.421 0 .842.054 1.122.135v4.049z" fill="#20a0db"/><path fill="#2b65b0" d="M97.699 21.353c1.263 0 2.301.999 2.301 2.213s-1.038 2.186-2.301 2.186-2.273-.972-2.273-2.186 1.01-2.213 2.273-2.213z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endif


        

        <overlay-loader :is-open="show_loader"></overlay-loader>
    </div>

    <div id="scrollTop">
        <svg width="20" height="20" enable-background="new 0 0 490.523 490.523" version="1.1" viewBox="0 0 490.52 490.52" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
            <path d="m487.41 355.05-234.67-234.67c-4.165-4.164-10.917-4.164-15.083 0l-234.67 234.67c-4.093 4.237-3.976 10.99 0.262 15.083 4.134 3.993 10.687 3.993 14.821 0l227.12-227.12 227.12 227.14c4.237 4.093 10.99 3.976 15.083-0.261 3.993-4.134 3.993-10.688 0-14.821l0.021-0.022z" fill="#FFC107"/>
            <path d="m479.86 373.27c-2.831 5e-3 -5.548-1.115-7.552-3.115l-227.12-227.14-227.12 227.14c-4.237 4.093-10.99 3.976-15.083-0.262-3.993-4.134-3.993-10.687 0-14.821l234.67-234.67c4.165-4.164 10.917-4.164 15.083 0l234.67 234.67c4.159 4.172 4.148 10.926-0.024 15.085-1.999 1.993-4.706 3.112-7.528 3.113z" fill="#ffffff"/>
        </svg>
    </div>

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


    <script type="text/javascript" src="{{ asset('themes/toni-braxton/assets/js/shop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>


    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    
    @stack('scripts')


    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    <div class="modal-overlay"></div>

    <script>
        {!! core()->getConfigData('general.content.custom_scripts.custom_javascript') !!}
    </script>


    <script src="{{ asset('themes/toni-braxton/assets/js/greedynav.js') }}"></script>
    <script src="{{ asset('themes/toni-braxton/assets/js/stellarnav.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('themes/toni-braxton/assets/js/scripts.js') }}"></script>

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