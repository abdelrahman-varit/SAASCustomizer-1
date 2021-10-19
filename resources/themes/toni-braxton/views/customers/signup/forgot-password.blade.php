@extends('shop::layouts.master')

@section('page_title')
 {{ __('shop::app.customer.forgot-password.page_title') }}
@stop

@section('content-wrapper')
    <div class="main-container-wrapper">
        <div class="auth-content">
            <div class="auth-content-inner">
                <div class="auth-graphic">
                    <img src="{{ asset('themes/toni-braxton/assets/images/auth-graphic.png') }}" alt="Auth Graphic">
                </div>

                {!! view_render_event('bagisto.shop.customers.forget_password.before') !!}
                
                <form method="post" action="{{ route('customer.forgot-password.store') }}" @submit.prevent="onSubmit">

                    {{ csrf_field() }}
            
                    <div class="login-form">
            
                        <div class="login-text">
                            <i class="las la-lock"></i>
                            <span>{{ __('shop::app.customer.forgot-password.title') }}</span>
                        </div>
                        <p>We will send you and email to reset your password.</p>
            
                        {!! view_render_event('bagisto.shop.customers.forget_password_form_controls.before') !!}
            
                        <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                            <label for="email" class="required">{{ __('shop::app.customer.forgot-password.email') }}</label>
                            <input type="email" class="control" name="email" v-validate="'required|email'">
                            <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                        </div>
            
                        {!! view_render_event('bagisto.shop.customers.forget_password_form_controls.before') !!}
            
                        <div class="control-group">
                            <button type="submit" class="btn btn-lg btn-primary">
                                {{ __('shop::app.customer.forgot-password.submit') }}
                            </button>
                        </div>
            
                        <div class="control-group">
                            <a href="{{ route('customer.session.index') }}">
                                <i class="las la-arrow-left"></i>
                                {{ __('shop::app.customer.reset-password.back-link-title') }}
                            </a>
                        </div>
            
                    </div>
                </form>

                {!! view_render_event('bagisto.shop.customers.forget_password.before') !!}
            </div>
        </div>
    </div>
@endsection