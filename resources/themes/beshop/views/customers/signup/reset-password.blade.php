@extends('shop::layouts.master')

@section('page_title')
 {{ __('shop::app.customer.reset-password.title') }}
@endsection

@section('content-wrapper')

<div class="py-5"></div>
<div class="container auth-container" style="background-color: #DAF3F7">
    <div class="row align-items-center">
        <div class="col-lg-6 auth-graphic">
            <div class="auth-graphic-content">
                <img src="{{ asset('themes/beshop/img/demo/Login image-01.svg') }}" alt="Graphic">
            </div>
        </div>
        <div class="col-lg-6 auth-content">
            <div class="py-5"></div>
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" xmlns:v="https://vecta.io/nano"><path d="M24.244 13.123h1.472c2.819.015 4.263 1.459 4.268 4.308l.003 15.041-.007 2.918c-.078 2.351-1.543 3.876-3.896 3.887-7.408.035-14.817.037-22.225-.004-2.291-.012-3.811-1.541-3.826-3.829l.002-18.521c.018-2.32 1.62-3.77 3.97-3.8l1.625-.001.004-3.613c.101-4.643 2.965-8.255 7.333-9.273C18.256-.996 23.62 2.712 24.218 8.113c.177 1.614.026 3.264.026 5.01zm-3.462-.045c0-1.5.107-2.887-.022-4.252-.267-2.813-2.348-4.851-5.161-5.22-2.516-.331-5.082 1.249-6.009 3.729-.701 1.876-.324 3.805-.383 5.743h11.575zM9.396 25.974c-.209-3.582 3.447-6.472 6.901-5.392 1.255.393 1.911.107 2.479-.912-1.715-1.27-4.165-1.568-6.4-.73-3.212 1.205-4.725 3.687-5.06 7.1H4.607l3.626 3.235 3.246-3.301H9.396zm1.747 6.387c1.767 1.264 4.02 1.57 6.239.794 3.338-1.168 4.911-3.698 5.25-7.227h2.49l-3.669-3.742-1.582 1.826c-.562.614-1.156 1.199-1.936 2.003h2.6c.329 3.568-3.533 6.583-7 5.415-1.238-.418-1.771.029-2.392.931z"/></svg>
            </div>
            <h4 class="text-center pb-3 mb-3 mt-1">{{ __('shop::app.customer.reset-password.title') }}</h4>
            <p class="mb-5 text-center">We will send you and email to reset your password.</p>
            
            {!! view_render_event('bagisto.shop.customers.reset_password.before') !!}

            <form method="POST" action="{{ route('customer.forgot-password.store') }}" class="row g-3 mb-4 px-3 px-lg-5 needs-validation" novalidate>
                
                {{ csrf_field() }}

                {!! view_render_event('bagisto.shop.customers.reset_password_form_controls.before') !!}

                <div class="col-12">
                    <label for="email">Email address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    <div class="invalid-feedback">{{ $errors->has('email') ? $errors->first('email') : "Email must be valid email address" }}</div>
                </div>

                <div class="col-12">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" minlength="6" required>
                    <div class="invalid-feedback">{{ $errors->has('password') ? $errors->first('password') : "Password minimum length is 6" }}</div>
                </div>

                <div class="col-12">
                    <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" min="6" required>
                    <div class="invalid-feedback">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : "Passwords must be matched" }}</div>
                </div>

                {!! view_render_event('bagisto.shop.customers.reset_password_form_controls.after') !!}

                <div class="col-12">
                    <button type="submit" class="btn btn-dark rounded-0 w-100 btn-lg fw-bold mt-3">{{ __('shop::app.customer.reset-password.submit-btn-title') }}</button>
                </div>
                <div class="col-12">
                    <p class="m-0"><a href="{{ route('customer.session.index') }}" class="text-dark fw-bold">{{ __('shop::app.customer.reset-password.back-link-title') }}</a></p>
                </div>
            </form>
            <div class="py-5"></div>
        </div>
    </div>
</div>
<div class="py-5"></div>
@endsection