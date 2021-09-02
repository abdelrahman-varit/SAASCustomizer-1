<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <title>@yield('page_title')</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    {{-- <link rel="stylesheet" href="{{ bagisto_asset('css/shop.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('themes/cognite/assets/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}">

    <!-- Fonts from tinyMCE -->
    <link rel="stylesheet" href="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/css/tinymce-fonts.css') }}">


    <link rel="stylesheet" href="{{ asset('themes/cognite/assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/cognite/assets/css/responsive.css') }}">

    <!-- Color Scheme -->
    @php 
        $theme_color=$velocityMetaData->theme_color
    @endphp
    @if($theme_color!=="default" && !empty($theme_color))
        <link rel="stylesheet" href="{{ asset('themes/cognite/assets/css/colors/'.$theme_color.'.css') }}">
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
 
    <div class="se-pre-con">
        <div class="se-pre-con-inner">
            @if ($logo = core()->getCurrentChannel()->logo_url)                
                <img class="se-pre-con-logo" src="{{ $logo }}" />
            @else
                <img class="se-pre-con-logo" src="{{ asset('themes/cognite/assets/images/logo.svg') }}" />
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="30.72" viewBox="194.435 73.756 130 39.958" xmlns:v="https://vecta.io/nano"><path d="M202.912 82.427c4.697 0 7.459 2.762 7.459 6.596 0 2.59-1.52 4.524-3.626 5.284 2.59.691 4.386 2.935 4.386 5.836 0 3.937-3.039 6.769-7.598 6.769h-9.047V82.427h8.426zm-.552 10.36c2.417 0 3.868-1.381 3.868-3.419 0-2.072-1.45-3.419-3.971-3.419h-3.661v6.837l3.764.001h0zm.449 10.601c2.486 0 4.11-1.347 4.11-3.522 0-2.107-1.415-3.592-3.971-3.592h-4.351v7.114c-.001 0 4.212 0 4.212 0zm18.026 4.006c-4.006 0-6.354-2.969-6.354-6.699V90.093h4.005v9.876c0 2.072.967 3.833 3.384 3.833 2.314 0 3.522-1.554 3.522-3.764v-9.945h4.006v13.744c0 1.381.103 2.452.173 3.074h-3.833c-.069-.38-.138-1.174-.138-1.865-.828 1.519-2.797 2.348-4.765 2.348zm14.573 6.319l4.04-8.805-7.183-14.814h4.524l4.834 10.636 4.524-10.636h4.248l-10.705 23.62-4.282-.001h0zm34.498-6.803L257.82 88.366v18.544h-4.144V82.427h5.284l11.119 17.37v-17.37h4.144v24.484h-4.317v-.001zm25.935-8.426c0 5.18-3.695 8.944-8.737 8.944-5.007 0-8.702-3.764-8.702-8.944 0-5.145 3.695-8.91 8.702-8.91 5.042.001 8.737 3.765 8.737 8.91zm-4.041 0c0-3.488-2.21-5.284-4.697-5.284-2.451 0-4.697 1.796-4.697 5.284s2.245 5.352 4.697 5.352c2.487.001 4.697-1.829 4.697-5.352zm9.877-16.921c1.45 0 2.625 1.174 2.625 2.625s-1.174 2.59-2.625 2.59c-1.415 0-2.59-1.139-2.59-2.59s1.173-2.625 2.59-2.625zm-1.969 25.347V90.093h3.971v16.818h-3.971v-.001zm18.993-12.846a8.74 8.74 0 0 0-1.312-.103c-3.108 0-4.524 1.796-4.524 4.939v8.011h-4.005V90.093h3.902v2.693c.794-1.83 2.659-2.901 4.869-2.901a5.79 5.79 0 0 1 1.07.103v4.076h0z" fill="#fff"/><path fill="#fae3da" d="M321.603 101.489c1.554 0 2.832 1.278 2.832 2.832s-1.278 2.798-2.832 2.798-2.798-1.243-2.798-2.798 1.243-2.832 2.798-2.832z"/><path d="M195.524 77.614v2.062h-1.09v-5.853h1.907a3.31 3.31 0 0 1 1.016.136c.287.092.523.221.71.387a1.53 1.53 0 0 1 .412.589c.088.232.133.482.133.755 0 .283-.048.541-.14.78a1.6 1.6 0 0 1-.427.607 2 2 0 0 1-.707.398 3.23 3.23 0 0 1-.998.14h-.816zm0-.85h.817a1.58 1.58 0 0 0 .523-.074c.151-.052.272-.121.368-.214s.169-.206.221-.342a1.3 1.3 0 0 0 .07-.445c0-.158-.022-.298-.07-.427a.89.89 0 0 0-.221-.324.95.95 0 0 0-.368-.202 1.69 1.69 0 0 0-.523-.07h-.817v2.098zm9.553-.015c0 .431-.074.825-.217 1.193a2.83 2.83 0 0 1-.6.95c-.258.269-.571.475-.935.626s-.769.225-1.211.225-.847-.077-1.215-.225a2.83 2.83 0 0 1-.939-.626c-.258-.269-.46-.585-.604-.95a3.23 3.23 0 0 1-.214-1.193 3.22 3.22 0 0 1 .214-1.193c.144-.364.346-.681.604-.95a2.81 2.81 0 0 1 .939-.626c.368-.147.773-.225 1.215-.225s.847.077 1.211.228.674.361.935.626.46.582.6.946a3.23 3.23 0 0 1 .217 1.194zm-1.119 0c0-.32-.04-.611-.125-.865a1.84 1.84 0 0 0-.368-.648 1.55 1.55 0 0 0-.582-.409 1.97 1.97 0 0 0-.769-.144c-.287 0-.545.048-.773.144s-.427.228-.585.409a1.95 1.95 0 0 0-.372.648 2.73 2.73 0 0 0-.129.865c0 .32.044.607.129.865s.21.471.372.648a1.56 1.56 0 0 0 .585.405c.232.092.486.144.773.144a1.97 1.97 0 0 0 .769-.144c.228-.092.423-.228.582-.405s.28-.394.368-.648a2.75 2.75 0 0 0 .125-.865zm1.432-2.927h.917c.092 0 .173.022.236.066s.107.107.129.18l.994 3.501c.026.088.048.18.066.283l.059.32.074-.32a2.66 2.66 0 0 1 .081-.283l1.149-3.501c.022-.063.066-.118.129-.169s.14-.077.232-.077h.32c.096 0 .173.022.236.066s.103.107.129.18l1.141 3.501c.059.173.11.364.155.574l.059-.302.063-.272.994-3.501a.36.36 0 0 1 .125-.173.39.39 0 0 1 .236-.074h.854l-1.815 5.853h-.987l-1.277-3.998-.052-.166-.052-.191-.048.191-.052.166-1.292 3.998h-.983l-1.82-5.852zm12.704 0v.865h-2.592v1.623h2.043v.839h-2.043v1.657h2.592v.869h-3.689v-5.853h3.689zm2.069 3.567v2.286h-1.09v-5.853h1.785c.401 0 .744.04 1.027.125s.519.195.699.346.317.324.401.53a1.79 1.79 0 0 1 .129.681 1.73 1.73 0 0 1-.088.56 1.62 1.62 0 0 1-.655.854 2.23 2.23 0 0 1-.549.261 1.06 1.06 0 0 1 .357.335l1.465 2.161h-.979a.49.49 0 0 1-.243-.055c-.066-.04-.121-.092-.166-.162l-1.233-1.874c-.044-.074-.096-.121-.151-.151s-.136-.044-.243-.044h-.466zm0-.784h.681c.206 0 .383-.022.537-.074a1.08 1.08 0 0 0 .375-.214c.099-.092.173-.199.221-.324a1.12 1.12 0 0 0 .074-.409c0-.295-.099-.523-.295-.681s-.493-.239-.898-.239h-.696v1.941zm7.871-2.783v.865h-2.592v1.623h2.043v.839h-2.043v1.657h2.592v.869h-3.689v-5.853h3.689zm6.14 2.927c0 .431-.07.825-.214 1.182a2.7 2.7 0 0 1-.604.928 2.76 2.76 0 0 1-.935.604c-.364.144-.766.214-1.207.214h-2.235v-5.853h2.235a3.27 3.27 0 0 1 1.207.217c.364.144.677.346.935.604a2.66 2.66 0 0 1 .604.924c.144.355.214.749.214 1.18zm-1.112 0a2.73 2.73 0 0 0-.129-.865c-.088-.254-.21-.471-.368-.648a1.54 1.54 0 0 0-.582-.405 1.97 1.97 0 0 0-.769-.144h-1.138v4.123h1.138a1.97 1.97 0 0 0 .769-.144c.228-.092.423-.228.582-.405s.28-.394.368-.648.129-.544.129-.864zm3.531 2.926v-5.853h2.017a3.84 3.84 0 0 1 .983.11c.272.07.493.177.666.309a1.19 1.19 0 0 1 .383.49c.081.191.121.409.121.648 0 .14-.018.269-.059.398a1.1 1.1 0 0 1-.188.35c-.085.11-.195.21-.324.298a2.04 2.04 0 0 1-.468.228c.803.18 1.204.615 1.204 1.303 0 .247-.048.475-.14.688a1.52 1.52 0 0 1-.412.541c-.18.155-.405.272-.67.361s-.567.129-.906.129h-2.207zm1.086-3.32h.872c.368 0 .648-.066.839-.202s.291-.35.291-.641c0-.306-.088-.523-.261-.655s-.442-.191-.81-.191h-.931v1.689zm0 .755v1.715h1.108a1.54 1.54 0 0 0 .508-.074c.136-.048.243-.11.328-.191a.7.7 0 0 0 .177-.283 1.06 1.06 0 0 0 .055-.346c0-.121-.022-.239-.063-.342a.63.63 0 0 0-.188-.258c-.085-.07-.199-.125-.335-.166s-.298-.055-.49-.055h-1.1zm6.792.29v2.275h-1.09V77.4l-2.135-3.578h.961c.096 0 .169.022.225.07a.55.55 0 0 1 .14.173l1.071 1.955.162.331.125.306.121-.309a3.35 3.35 0 0 1 .158-.328l1.064-1.955a.56.56 0 0 1 .136-.166c.059-.052.133-.077.225-.077h.964l-2.127 3.578z" fill="#fff"/></svg>
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
            <path d="m479.86 373.27c-2.831 5e-3 -5.548-1.115-7.552-3.115l-227.12-227.14-227.12 227.14c-4.237 4.093-10.99 3.976-15.083-0.262-3.993-4.134-3.993-10.687 0-14.821l234.67-234.67c4.165-4.164 10.917-4.164 15.083 0l234.67 234.67c4.159 4.172 4.148 10.926-0.024 15.085-1.999 1.993-4.706 3.112-7.528 3.113z" fill="#000000"/>
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


    <script type="text/javascript" src="{{ asset('themes/cognite/assets/js/shop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>


    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    
    @stack('scripts')


    {!! view_render_event('bagisto.shop.layout.body.after') !!}

    <div class="modal-overlay"></div>

    <script>
        {!! core()->getConfigData('general.content.custom_scripts.custom_javascript') !!}
    </script>


    <script type="text/javascript" src="{{ asset('themes/cognite/assets/js/scripts.js') }}"></script>

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