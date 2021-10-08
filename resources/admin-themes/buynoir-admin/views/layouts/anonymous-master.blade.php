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
            <link rel="icon" sizes="16x16" href="{{ asset('vendor/webkul/ui/assets/images/favicon.png') }}" />
        @endif
        
        <link rel="stylesheet" href="{{ asset('admin-themes/buynoir-admin/assets/admin/css/admin.css') }}">
        <link rel="stylesheet" href="{{ asset('buynoir/shopadmin/css/shop-admin.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-themes/buynoir-admin/assets/ui/assets/css/ui.css') }}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">


        <style nonce="2726c7f26c">
            body {
                font-family: 'Nunito', sans-serif;
            }
            .text-orange {
                color: #0EA1E2;
            }
            .fw-black {
                font-weight: 800;
            }
            .form-control {
                height: 50px;
                color: #002F64;
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
                border-color: #0EA1E2;
            }
            a:active, a:focus, a:hover, a:link, a:visited {
                color: #0EA1E2;
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
                background-color: #002F64;
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
                background-color: #0EA1E2;
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
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image')) }}" alt="{{ config('app.name') }}" style="display: block; max-height: 40px; max-width: 130px">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="130" height="34.126" viewBox="0 3.026 130 34.126" xmlns:v="https://vecta.io/nano"><path d="M9.632 4.091c5.089 0 8.033 2.975 8.033 6.979 0 2.682-1.672 4.886-3.78 5.583 2.326.551 4.58 2.718 4.58 6.098 0 4.261-3.198 7.383-8.069 7.383H0V4.091h9.632zm-.909 10.432c1.999 0 3.308-1.065 3.308-2.828 0-1.69-1.127-2.792-3.38-2.792H5.597v5.62h3.126zm.473 10.874c2.217 0 3.562-1.175 3.562-3.049 0-1.8-1.309-3.049-3.562-3.049H5.597v6.098h3.599zm22.185 2.9c-.945 1.58-3.017 2.241-4.834 2.241-4.398 0-6.869-3.233-6.869-7.126V11.877h5.525v10.359c0 1.763.945 3.159 2.908 3.159 1.854 0 3.017-1.286 3.017-3.122V11.877h5.525v14.987a28.73 28.73 0 0 0 .182 3.269h-5.307c-.074-.33-.147-1.359-.147-1.836zm9.485 8.854l4.107-9.477-7.596-15.795h6.179l4.398 9.771 3.998-9.771h5.852L46.682 37.151h-5.816zm34.214-7.016L64.467 13.017v17.118H58.76V4.091h6.979l9.668 15.832V4.091h5.743v26.044h-6.07zm26.806-9.146c0 5.657-4.18 9.698-9.596 9.698-5.379 0-9.596-4.041-9.596-9.698s4.216-9.661 9.596-9.661c5.416 0 9.596 4.004 9.596 9.661zm-5.524 0c0-3.086-1.963-4.518-4.071-4.518-2.072 0-4.071 1.433-4.071 4.518 0 3.049 1.999 4.555 4.071 4.555 2.108 0 4.071-1.47 4.071-4.555zm9.747-17.963c1.817 0 3.271 1.469 3.271 3.269s-1.454 3.269-3.271 3.269c-1.745 0-3.199-1.469-3.199-3.269s1.454-3.269 3.199-3.269zm-2.726 27.109V11.879h5.525v18.257h-5.525zm19.64-12.746c-.618-.147-1.2-.184-1.745-.184-2.217 0-4.216 1.322-4.216 4.959v7.971h-5.525V11.879h5.343v2.461c.945-2.057 3.235-2.645 4.689-2.645.545 0 1.09.073 1.454.184v5.51z" fill="#0ea1e2"/><path fill="#1964bc" d="M126.992 24.155c1.65 0 3.008 1.357 3.008 3.008s-1.357 2.972-3.008 2.972a2.96 2.96 0 0 1-2.972-2.972c0-1.651 1.321-3.008 2.972-3.008z"/></svg>
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
