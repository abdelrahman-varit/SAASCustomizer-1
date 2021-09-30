@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.login-form.page-title') }}
@endsection

@section('content-wrapper')

<div class="main-container-wrapper">


    <div class="auth-container login-auth-container">

        <div class="auth-grapic">
            <div class="auth-graphic-content">
                <img src="{{ asset('themes/pattie-labelle/assets/images/login-auth.svg') }}" alt="Graphic">
            </div>
        </div>
        <div class="auth-content">
            
            {!! view_render_event('bagisto.shop.customers.login.before') !!}
    
            <form method="POST" action="{{ route('customer.session.create') }}" @submit.prevent="onSubmit">
                {{ csrf_field() }}
                <div class="login-form">

                    <div class="login-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="36.348" fill="#010101" xmlns:v="https://vecta.io/nano"><path d="M25.195 19.413H1.239A1.24 1.24 0 0 1 0 18.174a1.24 1.24 0 0 1 1.239-1.239h23.956a1.24 1.24 0 0 1 1.239 1.239 1.24 1.24 0 0 1-1.239 1.239z"></path><path d="M18.587 26.022a1.23 1.23 0 0 1-.876-.363 1.24 1.24 0 0 1 0-1.753l5.733-5.733-5.733-5.733a1.24 1.24 0 0 1 0-1.753 1.24 1.24 0 0 1 1.753 0l6.609 6.609a1.24 1.24 0 0 1 0 1.753l-6.609 6.609c-.243.243-.56.364-.877.364zm1.239 10.326c-7.519 0-14.157-4.524-16.915-11.526a1.24 1.24 0 0 1 .699-1.606c.634-.248 1.357.061 1.608.701 2.381 6.045 8.115 9.953 14.608 9.953 8.654 0 15.696-7.042 15.696-15.696S28.48 2.478 19.826 2.478a15.61 15.61 0 0 0-14.608 9.953c-.253.64-.973.948-1.608.701a1.24 1.24 0 0 1-.699-1.606C5.669 4.524 12.307 0 19.826 0 29.846 0 38 8.154 38 18.174s-8.154 18.174-18.174 18.174z"></path></svg>
                        <span>{{ __('shop::app.customer.login-form.title') }}</span>
                    </div>
                    <p>If you have an account, sign in with your email address.</p>
    
                    <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                        <label for="email" class="required">{{ __('shop::app.customer.login-form.email') }}</label>
                        <input type="text" class="control" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.login-form.email') }}&quot;">
                        <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                    </div>
    
                    <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                        <label for="password" class="required">{{ __('shop::app.customer.login-form.password') }}</label>
                        <input type="password" v-validate="'required|min:6'" class="control" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.sessions.password') }}&quot;" value=""/>
                        <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                    </div>
    
                    {!! view_render_event('bagisto.shop.customers.login_form_controls.after') !!}
    
                    <div class="forgot-password-link">
                        <a href="{{ route('customer.forgot-password.create') }}">{{ __('shop::app.customer.login-form.forgot_pass') }}</a>
    
                        <div class="mt-10">
                            @if (Cookie::has('enable-resend'))
                                @if (Cookie::get('enable-resend') == true)
                                    <a href="{{ route('customer.resend.verification-email', Cookie::get('email-for-resend')) }}">{{ __('shop::app.customer.login-form.resend-verification') }}</a>
                                @endif
                            @endif
                        </div>
                    </div>
    
                    <button type="submit" class="btn btn-black btn-lg text-uppercase"><strong>{{ __('shop::app.customer.login-form.button_title') }}</strong></button>

                    <div class="sign-up-text">
                        <p>{{ __('shop::app.customer.login-text.no_account') }} <a href="{{ route('customer.register.index') }}">{{ __('shop::app.customer.login-text.title') }}</a></p>
                        <p>or</p>
                        <p>Continue with social media</p>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.login_form_controls.before') !!}
                </div>
            </form>
    
            {!! view_render_event('bagisto.shop.customers.login.after') !!}
        </div>        
    </div>

</div>

@stop

