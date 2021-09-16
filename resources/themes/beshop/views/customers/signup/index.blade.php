@extends('shop::layouts.master')
@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection
@section('content-wrapper')
    <div style="background: url({{ asset('themes/beshop/assets/img/demo/bg-image.jpg') }}) no-repeat center bottom; background-size: cover">
        <div class="py-5"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-6 bg-white auth-container">
                    <div class="py-3"></div>
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" xmlns:v="https://vecta.io/nano"><path fill="#010101" d="M29.874 5.126A17.38 17.38 0 0 0 17.5 0 17.38 17.38 0 0 0 5.126 5.126C1.821 8.432 0 12.825 0 17.5a17.38 17.38 0 0 0 5.126 12.374C8.432 33.179 12.825 35 17.5 35a17.38 17.38 0 0 0 12.374-5.126C33.179 26.568 35 22.174 35 17.5a17.38 17.38 0 0 0-5.126-12.374zM8.773 30.241c.732-4.214 4.384-7.323 8.727-7.323s7.995 3.108 8.727 7.323c-2.485 1.707-5.491 2.708-8.727 2.708s-6.242-1.001-8.727-2.708zm3.163-14.938A5.57 5.57 0 0 1 17.5 9.739a5.57 5.57 0 0 1 5.564 5.564 5.57 5.57 0 0 1-5.564 5.564 5.57 5.57 0 0 1-5.564-5.564zm16.067 13.516c-.552-1.962-1.648-3.742-3.185-5.132-.943-.853-2.016-1.526-3.169-2.001 2.085-1.36 3.466-3.713 3.466-6.382 0-4.199-3.416-7.615-7.615-7.615s-7.615 3.416-7.615 7.615c0 2.669 1.381 5.022 3.466 6.382-1.153.475-2.226 1.147-3.169 2.001a10.9 10.9 0 0 0-3.185 5.132c-3.04-2.823-4.946-6.852-4.946-11.319A15.47 15.47 0 0 1 17.5 2.051 15.47 15.47 0 0 1 32.949 17.5c0 4.467-1.906 8.496-4.946 11.319z"/></svg>
                    </div>
                    <h4 class="text-center pb-3 mb-3 mt-1 auth-title">{{ __('shop::app.customer.signup-form.title') }}</h4>
                    <p class="mb-5 text-center">If you are new to our store, we glad to have you as member.</p>
                    
                    {!! view_render_event('bagisto.shop.customers.signup.before') !!}

                    <!-- Registration Form Start -->
                    <form action="{{ route('customer.register.create') }}" method="POST" class="px-3 px-lg-4 mb-4 needs-validation" novalidate>

                        {{ csrf_field() }}

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}

                        <div class="mb-4 row">
                            <label for="first_name" class="col-sm-4 col-form-label">{{ __('shop::app.customer.signup-form.firstname') }} <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                <div class="invalid-feedback">{{ $errors->has('first_name') ? $errors->first('first_name') : "First name is required" }}</div>
                            </div>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.firstname.after') !!}

                        <div class="mb-4 row">
                            <label for="last_name" class="col-sm-4 col-form-label">{{ __('shop::app.customer.signup-form.lastname') }} <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                                <div class="invalid-feedback">{{ $errors->has('last_name') ? $errors->first('last_name') : "Last name is required" }}</div>
                            </div>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.lastname.after') !!}

                        <div class="mb-4 row">
                            <label for="email" class="col-sm-4 col-form-label">{{ __('shop::app.customer.signup-form.email') }} <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                <div class="invalid-feedback">{{ $errors->has('email') ? $errors->first('email') : "Email must be valid email address" }}</div>
                            </div>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.email.after') !!}

                        <div class="mb-4 row">
                            <label for="password" class="col-sm-4 col-form-label">{{ __('shop::app.customer.signup-form.password') }} <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="6" required>
                                <div class="invalid-feedback">{{ $errors->has('password') ? $errors->first('password') : "Password minimum length is 6" }}</div>
                            </div>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.password.after') !!}

                        <div class="mb-4 row">
                            <label for="password_confirmation" class="col-sm-4 col-form-label">{{ __('shop::app.customer.signup-form.confirm_pass') }} <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" min="6" required>
                                <div class="invalid-feedback">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : "Passwords must be matched" }}</div>
                            </div>
                        </div>

                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}

                        <div class="form-check fw-bold">
                            <input type="checkbox" class="form-check-input @error('agreement') is-invalid @enderror" id="agreement" name="agreement" required>
                            <label class="form-check-label" for="agreement">{{ __('shop::app.customer.signup-form.agree') }} <a href="/">{{ __('shop::app.customer.signup-form.terms') }}</a> &amp; <a href="/">{{ __('shop::app.customer.signup-form.conditions') }}</a> {{ __('shop::app.customer.signup-form.using') }}.</label>
                            <div class="invalid-feedback">{{ $errors->has('agreement') ? $errors->first('agreement') : "You must agree the terms and conditions" }}</div>
                        </div>

                        <button type="submit" class="btn btn-dark rounded-0 w-100 btn-lg fw-bold mt-3">{{ __('shop::app.customer.signup-form.button_title') }}</button>
                    </form>
                    <!-- Registration Form End -->

                    {!! view_render_event('bagisto.shop.customers.signup.after') !!}

                    <p class="text-center">{{ __('shop::app.customer.signup-text.account_exists') }} <a href="{{ route('customer.session.index') }}" class="text-primary fw-bold text-decoration-underline">{{ __('shop::app.customer.signup-text.title') }}</a></p>
                    <div class="py-3"></div>
                </div>
            </div>
        </div>
        <div class="py-5"></div>
    </div>
@endsection