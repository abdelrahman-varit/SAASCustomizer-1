<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
		
        <!-- Fonts from tinyMCE -->
        <link rel="stylesheet" href="{{ asset('admin-themes/buynoir-admin/assets/admin/assets/css/tinymce-fonts.css') }}">

		<!-- Fonts -->
		<link rel="stylesheet" href="{{ asset('themes/beshop/fonts/fontawesome/css/all.min.css') }}">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap">

		<!-- Title -->
		<title>@yield('page_title')</title>

		<!-- Stylesheets -->
		<link rel="stylesheet" href="{{ asset('themes/beshop/css/swiper-bundle.min.css') }}">
		<link rel="stylesheet" href="{{ asset('themes/beshop/css/greedynav.css') }}">
		<link rel="stylesheet" href="{{ asset('themes/beshop/css/stellarnav.min.css') }}">
		<link rel="stylesheet" href="{{ asset('themes/beshop/css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('themes/beshop/css/style.css') }}">

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

        <!--jQuery-->
        <script src="{{ asset('themes/beshop/js/jquery.min.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>

	</head>
    <body @if (core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif>

        {!! view_render_event('bagisto.shop.layout.body.before') !!}

		<div id="app">
			<flash-wrapper ref='flashes'></flash-wrapper>
			
			{!! view_render_event('bagisto.shop.layout.header.before') !!}

			@include('shop::layouts.header.index')

			{!! view_render_event('bagisto.shop.layout.header.after') !!}

			@yield('slider')

			{!! view_render_event('bagisto.shop.layout.content.before') !!}

			@yield('content-wrapper')

			{!! view_render_event('bagisto.shop.layout.content.after') !!}



			{!! view_render_event('bagisto.shop.layout.footer.before') !!}

			@include('shop::layouts.footer.index')

			{!! view_render_event('bagisto.shop.layout.footer.after') !!}			

			<overlay-loader :is-open="show_loader"></overlay-loader>
		</div>
		
		

		

		<!-- Floating Menu (Mobile only) Start -->
		<div class="floating-menu bg-white fixed-bottom d-lg-none">
			<div class="list-group list-group-horizontal rounded-0 text-center">
				<a href="#" class="list-group-item list-group-item-action py-3 active">
					<svg width="20" height="20" fill="#00acc2" enable-background="new 0 0 19.002 19" version="1.1" viewBox="0 0 19.002 19" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
						<path d="m9.129 0h0.742c0.529 0.182 0.914 0.556 1.299 0.942 2.346 2.357 4.701 4.706 7.053 7.058 0.096 0.096 0.195 0.19 0.286 0.291 0.479 0.534 0.625 1.147 0.369 1.821-0.249 0.656-0.741 1.03-1.443 1.119-0.144 0.018-0.288 0.033-0.469 0.054v0.454c0 1.694 8e-3 3.388-3e-3 5.082-8e-3 1.329-0.867 2.174-2.19 2.177-0.853 2e-3 -1.706 1e-3 -2.56 0-0.757 0-0.88-0.123-0.88-0.882v-3.784c0-1.01-0.284-1.29-1.306-1.29h-1.113c-0.942 1e-3 -1.249 0.303-1.249 1.235-1e-3 1.348 3e-3 2.696-2e-3 4.044-2e-3 0.482-0.196 0.674-0.675 0.676-0.878 4e-3 -1.756 1e-3 -2.634 1e-3 -1.502 0-2.32-0.812-2.322-2.308-2e-3 -1.657 0-3.314 0-4.971v-0.421c-0.304-0.051-0.565-0.072-0.812-0.142-0.656-0.185-0.989-0.69-1.22-1.285v-0.742c0.176-0.517 0.537-0.895 0.915-1.27 2.32-2.309 4.634-4.624 6.943-6.943 0.376-0.378 0.753-0.741 1.271-0.916z"/>
					</svg>
				</a>
				<a href="#" class="list-group-item list-group-item-action py-3">
					<span class="count">0</span>
					<svg width="20" height="20" fill="#00acc2" enable-background="new 293.364 356.469 25.271 22.484" version="1.1" viewBox="293.36 356.47 25.271 22.484" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
						<path d="m316.63 358.67c-1.308-1.419-3.103-2.2-5.055-2.2-1.459 0-2.795 0.461-3.971 1.371-0.593 0.459-1.131 1.021-1.605 1.676-0.474-0.655-1.012-1.217-1.605-1.676-1.176-0.909-2.512-1.371-3.971-1.371-1.952 0-3.747 0.781-5.055 2.2-1.293 1.402-2.005 3.318-2.005 5.395 0 2.137 0.796 4.094 2.506 6.157 1.53 1.846 3.728 3.719 6.274 5.889 0.869 0.741 1.855 1.581 2.878 2.475 0.27 0.237 0.617 0.367 0.977 0.367s0.707-0.13 0.977-0.367c1.023-0.895 2.009-1.735 2.879-2.476 2.546-2.169 4.744-4.043 6.274-5.889 1.71-2.063 2.506-4.02 2.506-6.157 1e-3 -2.076-0.711-3.992-2.004-5.394z"/>
					</svg>
				</a>
				<a href="#" class="list-group-item list-group-item-action py-3">
					<span class="count">0</span>
					<svg width="20" height="20" fill="#00acc2" enable-background="new 0 0 21.138 21.138" version="1.1" viewBox="0 0 21.138 21.138" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
						<path d="m21.138 3.42c-1.988 1.166-3.868 2.268-5.84 3.426v-2.135c-1.116-0.236-1.177-0.201-1.543 0.787-1.581 4.269-3.171 8.535-4.732 12.812-0.173 0.474-0.411 0.619-0.89 0.594-0.736-0.038-1.476-0.01-2.259-0.01v2.245c-1.99-1.16-3.879-2.26-5.874-3.421 1.968-1.156 3.856-2.265 5.837-3.428v2.133c1.097 0.236 1.15 0.21 1.505-0.745 1.592-4.286 3.188-8.571 4.764-12.863 0.159-0.432 0.36-0.612 0.839-0.584 0.755 0.046 1.515 0.012 2.317 0.012v-2.243c1.989 1.157 3.878 2.258 5.876 3.42z"/>
						<path d="m15.267 21.137v-2.243c-0.836 0-1.632-0.018-2.427 7e-3 -0.373 0.012-0.548-0.111-0.672-0.471-0.374-1.083-0.798-2.149-1.189-3.227-0.062-0.172-0.119-0.392-0.064-0.55 0.376-1.081 0.783-2.151 1.231-3.361 0.21 0.547 0.375 0.966 0.531 1.389 0.366 0.983 0.726 1.969 1.092 2.953 0.356 0.957 0.358 0.957 1.482 0.836v-2.2c1.997 1.169 3.887 2.276 5.883 3.445-1.967 1.147-3.854 2.248-5.867 3.422z"/>
						<path d="m5.819 2.243c0.912 0 1.711 0.015 2.509-6e-3 0.342-9e-3 0.522 0.093 0.641 0.433 0.386 1.101 0.814 2.187 1.212 3.284 0.055 0.152 0.087 0.352 0.036 0.498-0.381 1.08-0.786 2.152-1.233 3.361-0.321-0.856-0.598-1.587-0.871-2.32-0.251-0.674-0.497-1.35-0.746-2.025-0.353-0.953-0.353-0.953-1.505-0.779v2.171c-1.99-1.168-3.879-2.275-5.86-3.437 1.971-1.15 3.849-2.247 5.818-3.397-1e-3 0.763-1e-3 1.447-1e-3 2.217z"/>
					</svg>
				</a>
				<a href="#" class="list-group-item list-group-item-action py-3">
					<span class="count">0</span>
					<svg width="20" height="20" fill="#00acc2" enable-background="new 228.689 272 24.58 21.604" version="1.1" viewBox="228.69 272 24.58 21.604" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
						<path d="m236.66 286.4h13.01c0.322 0 0.605-0.213 0.692-0.522l2.881-10.082c0.062-0.217 0.02-0.451-0.117-0.631s-0.349-0.286-0.575-0.286h-17.553l-0.515-2.316c-0.073-0.33-0.366-0.564-0.703-0.564h-4.369c-0.398 0-0.72 0.322-0.72 0.72s0.322 0.72 0.72 0.72h3.791l2.6 11.702c-0.765 0.333-1.302 1.094-1.302 1.98 0 1.191 0.969 2.16 2.16 2.16h13.01c0.398 0 0.72-0.322 0.72-0.72s-0.322-0.72-0.72-0.72h-13.01c-0.397 0-0.72-0.323-0.72-0.72s0.324-0.721 0.72-0.721z"/>
						<path d="m235.94 291.44c0 1.191 0.969 2.16 2.161 2.16 1.191 0 2.16-0.969 2.16-2.16s-0.969-2.16-2.16-2.16c-1.192 0-2.161 0.969-2.161 2.16z"/>
						<path d="m246.07 291.44c0 1.191 0.969 2.16 2.16 2.16s2.16-0.969 2.16-2.16-0.969-2.16-2.16-2.16-2.16 0.969-2.16 2.16z"/>
					</svg>
				</a>
				<a href="#" class="list-group-item list-group-item-action py-3">
					<svg width="20" height="20" fill="#00acc2" enable-background="new 297.497 386.5 17.007 19" version="1.1" viewBox="297.5 386.5 17.007 19" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
						<path d="m306 386.5c-2.714 0-4.933 2.219-4.933 4.933s2.219 4.933 4.933 4.933 4.933-2.219 4.933-4.933-2.219-4.933-4.933-4.933z"/>
						<path d="m314.47 400.31c-0.129-0.323-0.302-0.625-0.495-0.905-0.991-1.465-2.52-2.434-4.244-2.671-0.215-0.022-0.452 0.022-0.625 0.151-0.905 0.668-1.982 1.012-3.102 1.012s-2.197-0.345-3.102-1.012c-0.172-0.129-0.409-0.194-0.625-0.151-1.723 0.237-3.274 1.206-4.244 2.671-0.194 0.28-0.366 0.603-0.495 0.905-0.065 0.129-0.043 0.28 0.022 0.409 0.172 0.302 0.388 0.603 0.582 0.862 0.302 0.409 0.625 0.775 0.991 1.12 0.302 0.302 0.646 0.582 0.991 0.862 1.702 1.271 3.748 1.939 5.859 1.939s4.158-0.668 5.859-1.939c0.345-0.258 0.689-0.56 0.991-0.862 0.345-0.345 0.689-0.711 0.991-1.12 0.215-0.28 0.409-0.56 0.582-0.862 0.107-0.129 0.129-0.279 0.064-0.409z"/>
					</svg>			
				</a>
			</div>			
		</div>
		<!-- Floating Menu (Mobile only) End -->

        <!-- ScrollTop Button -->
		<button id="scrollTop" onclick="document.body.scrollTop = 0; document.documentElement.scrollTop = 0;"><i class="fas fa-chevron-up"></i></button>
        
        @stack('scripts')


        {!! view_render_event('bagisto.shop.layout.body.after') !!}

        <!-- Scripts -->
		<script src="{{ asset('themes/beshop/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('themes/beshop/js/swiper-bundle.min.js') }}"></script>
		<script src="{{ asset('themes/beshop/js/greedynav.js') }}"></script>
		<script src="{{ asset('themes/beshop/js/stellarnav.min.js') }}"></script>
		<script src="{{ asset('themes/beshop/js/scripts.js') }}"></script>

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

        <script>
            function showAlertMsg(msgType, msgText){
                document.getElementsByClassName('alert-wrapper')[0].innerHTML = `<div class='alert ${msgType}' style='color:#fff'>${msgText}</div>`;
                setTimeout(() => {
                    document.getElementsByClassName('alert-wrapper')[0].innerHTML = '';
                }, 5000);
            }
        </script>

		<script>
			(function () {
				'use strict'

				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				let forms = document.querySelectorAll('.needs-validation')

				// Loop over them and prevent submission
				Array.prototype.slice.call(forms).forEach(function (form) {
					form.addEventListener('submit', function (event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}
						form.classList.add('was-validated')
					}, false)
				})
			})()
		</script>

        <script>
            {!! core()->getConfigData('general.content.custom_scripts.custom_javascript') !!}
        </script>
    </body>
</html>