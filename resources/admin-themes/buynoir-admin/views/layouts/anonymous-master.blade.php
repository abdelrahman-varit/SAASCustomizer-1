<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>@yield('page_title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        @if ($favicon = core()->getConfigData('general.design.admin_logo.favicon'))
            <link rel="icon" sizes="16x16" href="{{ \Illuminate\Support\Facades\Storage::url($favicon) }}" />
        @else
            <link rel="icon" sizes="16x16" href="{{ asset('vendor/webkul/ui/assets/images/favicon.ico') }}" />
        @endif
        
        <link rel="stylesheet" href="{{ asset('admin-themes/buynoir-admin/assets/admin/css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/shopadmin/css/shop-admin.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-themes/buynoir-admin/assets/ui/assets/css/ui.css') }}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .text-orange {
                color: #fe4c1c;
            }
            .fw-black {
                font-weight: 800;
            }
            .form-control {
                height: 50px;
                color: #080e32;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
                border: 1px solid #f5f5f5;
                background-color: #f5f5f5;
                -webkit-transition: .5s;
                -moz-transition: .5s;
                transition: .5s;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                padding: 1px 0 0 15px;
                font-size: 16px;
                font-weight: 600;
            }
            .form-control.is-invalid,
            .was-validated .form-control:invalid {
                background-image: none;
            }
            .form-control:focus {
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
                border-color: #fe4c1c;
            }
            a:active, a:focus, a:hover, a:link, a:visited {
                color: #fe4c1c;
            }
            .default-btn {
                text-align: center;
                display: inline-block;
                transition: .5s;
                border-radius: 5px;
                border: none;
                padding: 10px 30px;
                position: relative;
                z-index: 1;
                color: white;
                background-color: #080e32;
                font-size: 17px;
                font-weight: 700;
            }
            .default-btn:hover {
                color: white;
            }
            .default-btn:hover::before {
                transform: scaleX(0);
            }
            .default-btn::before {
                content: '';
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                border-radius: 5px;
                background-color: #fe4c1c;
                z-index: -1;
                transition: .5s;
            }
        </style>

        @yield('css')

        {!! view_render_event('bagisto.admin.layout.head') !!}
    </head>
    <body @if (core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif style="scroll-behavior: smooth;">
        <div id="app">

            <flash-wrapper ref='flashes'></flash-wrapper>


            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="py-5"></div>
                        
                        <div class="text-center">
                            <a href="{{ route('buynoir.home.index') }}" class="d-inline-block">
                                @if (core()->getConfigData('general.design.admin_logo.logo_image'))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image')) }}" alt="{{ config('app.name') }}">
                                @else
                                    <img src="{{ asset('buynoir/shopadmin/images/logo-trans.png') }}" alt="{{ config('app.name') }}">
                                @endif
                            </a>
                        </div>

                        {!! view_render_event('bagisto.admin.layout.content.before') !!}
            
                        @yield('content')
            
                        {!! view_render_event('bagisto.admin.layout.content.after') !!}
            
                        @if (core()->getConfigData('general.content.footer.footer_toggle'))
                            <p class="m-0 text-center">
                                @if (core()->getConfigData('general.content.footer.footer_content'))
                                    {{ core()->getConfigData('general.content.footer.footer_content') }}
                                @else
                                    {!! trans('admin::app.footer.copy-right') !!}
                                @endif
                            </p>
                        @endif
                        
                        <div class="py-5"></div>
                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            window.flashMessages = [];
            @if ($success = session('success'))
                window.flashMessages = [{'type': 'alert-success', 'message': "{{ $success }}" }];
            @elseif ($warning = session('warning'))
                window.flashMessages = [{'type': 'alert-warning', 'message': "{{ $warning }}" }];
            @elseif ($error = session('error'))
                window.flashMessages = [{'type': 'alert-error', 'message': "{{ $error }}" }];
            @endif

            window.serverErrors = [];
            @if (isset($errors))
                @if (count($errors))
                    window.serverErrors = @json($errors->getMessages());
                @endif
            @endif
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="{{ asset('vendor/webkul/admin/assets/js/admin.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/webkul/ui/assets/js/ui.js') }}"></script>

        @stack('javascript')

        {!! view_render_event('bagisto.admin.layout.body.after') !!}

        <div class="modal-overlay"></div>
    </body>
</html>
