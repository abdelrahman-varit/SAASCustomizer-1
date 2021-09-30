@extends('shop::layouts.master')
@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection
@section('content-wrapper')


<div style="background: url({{ asset('themes/pattie-labelle/assets/images/registration-auth.jpg') }}) no-repeat center bottom; background-size: cover">
    <div class="main-container-wrapper">

        <div class="auth-container registration-auth-container">
            <div class="auth-content">
            
                {!! view_render_event('bagisto.shop.customers.signup.before') !!}
            
                <form method="post" action="{{ route('customer.register.create') }}" @submit.prevent="onSubmit">
            
                    {{ csrf_field() }}
            
                    <div class="login-form">
                        <div class="login-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" xmlns:v="https://vecta.io/nano"><path fill="#010101" d="M29.874 5.126A17.38 17.38 0 0 0 17.5 0 17.38 17.38 0 0 0 5.126 5.126C1.821 8.432 0 12.825 0 17.5a17.38 17.38 0 0 0 5.126 12.374C8.432 33.179 12.825 35 17.5 35a17.38 17.38 0 0 0 12.374-5.126C33.179 26.568 35 22.174 35 17.5a17.38 17.38 0 0 0-5.126-12.374zM8.773 30.241c.732-4.214 4.384-7.323 8.727-7.323s7.995 3.108 8.727 7.323c-2.485 1.707-5.491 2.708-8.727 2.708s-6.242-1.001-8.727-2.708zm3.163-14.938A5.57 5.57 0 0 1 17.5 9.739a5.57 5.57 0 0 1 5.564 5.564 5.57 5.57 0 0 1-5.564 5.564 5.57 5.57 0 0 1-5.564-5.564zm16.067 13.516c-.552-1.962-1.648-3.742-3.185-5.132-.943-.853-2.016-1.526-3.169-2.001 2.085-1.36 3.466-3.713 3.466-6.382 0-4.199-3.416-7.615-7.615-7.615s-7.615 3.416-7.615 7.615c0 2.669 1.381 5.022 3.466 6.382-1.153.475-2.226 1.147-3.169 2.001a10.9 10.9 0 0 0-3.185 5.132c-3.04-2.823-4.946-6.852-4.946-11.319A15.47 15.47 0 0 1 17.5 2.051 15.47 15.47 0 0 1 32.949 17.5c0 4.467-1.906 8.496-4.946 11.319z"></path></svg>
                            <span>{{ __('shop::app.customer.signup-form.title') }}</span>
                        </div>
                        <p>If you are new to our store, we glad to have you as member.</p>
            
                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}
            
                        <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                            <label for="first_name" class="required">{{ __('shop::app.customer.signup-form.firstname') }}</label>
                            <input type="text" class="control" name="first_name" v-validate="'required'" value="{{ old('first_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;">
                            <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                        </div>
            
                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.firstname.after') !!}
            
                        <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                            <label for="last_name" class="required">{{ __('shop::app.customer.signup-form.lastname') }}</label>
                            <input type="text" class="control" name="last_name" v-validate="'required'" value="{{ old('last_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;">
                            <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
                        </div>
            
                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.lastname.after') !!}
            
                        <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                            <label for="email" class="required">{{ __('shop::app.customer.signup-form.email') }}</label>
                            <input type="email" class="control" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;">
                            <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                        </div>
            
                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.email.after') !!}
            
                        <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                            <label for="password" class="required">{{ __('shop::app.customer.signup-form.password') }}</label>
                            <input type="password" class="control" name="password" v-validate="'required|min:6'" ref="password" value="{{ old('password') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;">
                            <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                        </div>
            
                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.password.after') !!}
            
                        <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                            <label for="password_confirmation" class="required">{{ __('shop::app.customer.signup-form.confirm_pass') }}</label>
                            <input type="password" class="control" name="password_confirmation"  v-validate="'required|min:6|confirmed:password'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;">
                            <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
                        </div>
            
                        {{-- <div class="signup-confirm" :class="[errors.has('agreement') ? 'has-error' : '']">
                            <span class="checkbox">
                                <input type="checkbox" id="checkbox2" name="agreement" v-validate="'required'">
                                <label class="checkbox-view" for="checkbox2"></label>
                                <span>{{ __('shop::app.customer.signup-form.agree') }}
                                    <a href="">{{ __('shop::app.customer.signup-form.terms') }}</a> & <a href="">{{ __('shop::app.customer.signup-form.conditions') }}</a> {{ __('shop::app.customer.signup-form.using') }}.
                                </span>
                            </span>
                            <span class="control-error" v-if="errors.has('agreement')">@{{ errors.first('agreement') }}</span>
                        </div> --}}
            
                        {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}
            
                        <div class="control-group" :class="[errors.has('agreement') ? 'has-error' : '']">
                            <span class="checkbox">
                                <input type="checkbox" id="checkbox2" name="agreement" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.agreement') }}&quot;">
                                <label for="checkbox2" class="checkbox-view"></label> {{ __('shop::app.customer.signup-form.agree') }} <a href="">{{ __('shop::app.customer.signup-form.terms') }}</a> & <a href="">{{ __('shop::app.customer.signup-form.conditions') }}</a> {{ __('shop::app.customer.signup-form.using') }}.
                            </span>
                            <span class="control-error" v-if="errors.has('agreement')">@{{ errors.first('agreement') }}</span>
                        </div>
            
                        <button class="btn btn-black btn-lg text-uppercase" type="submit">
                            <strong>{{ __('shop::app.customer.signup-form.button_title') }}</strong>
                        </button>
    
                        <div class="sign-up-text">
                            <p>{{ __('shop::app.customer.signup-text.account_exists') }} <a href="{{ route('customer.session.index') }}">{{ __('shop::app.customer.signup-text.title') }}</a></p>
                        </div>
            
                    </div>
                </form>
            
                {!! view_render_event('bagisto.shop.customers.signup.after') !!}
            </div>
        </div>
    
    </div>
</div>
@endsection
