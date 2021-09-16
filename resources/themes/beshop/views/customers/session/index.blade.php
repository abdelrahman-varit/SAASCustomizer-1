@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.login-form.page-title') }}
@endsection

@section('content-wrapper')

    <div class="py-5"></div>
    <div class="container auth-container" style="background-color: #DAF3F7">
        <div class="row align-items-center">
            <div class="col-lg-6 auth-graphic">
                <div class="auth-graphic-content">
                    <img src="{{ asset('themes/beshop/assets/img/demo/Login image-01.svg') }}" alt="Graphic">
                </div>
            </div>
            <div class="col-lg-6 auth-content">
                <div class="py-5"></div>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="38" height="36.348" fill="#010101" xmlns:v="https://vecta.io/nano"><path d="M25.195 19.413H1.239A1.24 1.24 0 0 1 0 18.174a1.24 1.24 0 0 1 1.239-1.239h23.956a1.24 1.24 0 0 1 1.239 1.239 1.24 1.24 0 0 1-1.239 1.239z"/><path d="M18.587 26.022a1.23 1.23 0 0 1-.876-.363 1.24 1.24 0 0 1 0-1.753l5.733-5.733-5.733-5.733a1.24 1.24 0 0 1 0-1.753 1.24 1.24 0 0 1 1.753 0l6.609 6.609a1.24 1.24 0 0 1 0 1.753l-6.609 6.609c-.243.243-.56.364-.877.364zm1.239 10.326c-7.519 0-14.157-4.524-16.915-11.526a1.24 1.24 0 0 1 .699-1.606c.634-.248 1.357.061 1.608.701 2.381 6.045 8.115 9.953 14.608 9.953 8.654 0 15.696-7.042 15.696-15.696S28.48 2.478 19.826 2.478a15.61 15.61 0 0 0-14.608 9.953c-.253.64-.973.948-1.608.701a1.24 1.24 0 0 1-.699-1.606C5.669 4.524 12.307 0 19.826 0 29.846 0 38 8.154 38 18.174s-8.154 18.174-18.174 18.174z"/></svg>
                </div>
                <h4 class="text-center pb-3 mb-3 mt-1 auth-title">{{ __('shop::app.customer.login-form.title') }}</h4>
                <p class="mb-5 text-center">If you have an account, sign in with your email address.</p>

                {!! view_render_event('bagisto.shop.customers.login.before') !!}

                <!-- Login Form Start -->
                <form method="POST" action="{{ route('customer.session.create') }}" class="row g-3 mb-4 px-3 px-lg-5 needs-validation" novalidate>
                    
                    {{ csrf_field() }}

                    <div class="col-12">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        <div class="invalid-feedback">{{ $errors->has('email') ? $errors->first('email') : "Email must be valid email address" }}</div>
                    </div>
                    <div class="col-12">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <div class="input-group input-group-password">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="6" required>
                            <div class="invalid-feedback">{{ $errors->has('password') ? $errors->first('password') : "Password minimum length is 6" }}</div>
                            <button class="btn bg-white shadow-none" type="button" style="height: 40px; top: 1px; right: 1px;"><i class="far fa-eye-slash"></i></button>
                        </div>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.login_form_controls.after') !!}

                    <div class="col-12">
                        <a href="{{ route('customer.forgot-password.create') }}" class="text-primary"><u>{{ __('shop::app.customer.login-form.forgot_pass') }}</u></a>
                        @if (Cookie::has('enable-resend'))
                            @if (Cookie::get('enable-resend') == true)
                                <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                            @endif
                        @endif
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark rounded-0 w-100 btn-lg fw-bold mt-3">{{ __('shop::app.customer.login-form.button_title') }}</button>
                    </div>
                </form>
                <!-- Login Form End -->

                {!! view_render_event('bagisto.shop.customers.login.after') !!}

                <p class="text-center">{{ __('shop::app.customer.login-text.no_account') }} <a href="{{ route('customer.register.index') }}" class="text-primary fw-bold">{{ __('shop::app.customer.login-text.title') }}</a></p>
                <p class="text-center">Or</p>
                <p class="text-center mb-5">Continue with social media</p>
                
                {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}

                <div class="py-5"></div>
            </div>
        </div>
    </div>
    <div class="py-5"></div>
@stop
