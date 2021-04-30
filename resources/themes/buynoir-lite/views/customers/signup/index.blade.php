@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection

@section('content-wrapper')
    <div class="auth-content form-container">
        <div class="container">
            <div class="col-lg-12 col-md-12">
                <div class="heading">
                    <h2 class="fs24 fw6">
                        {{ __('velocity::app.customer.signup-form.user-registration')}}
                    </h2>

                    <a href="{{ route('customer.session.index') }}" class="btn-new-customer">
                        <button type="button" class="btn btn-dark p3">
                            {{ __('velocity::app.customer.signup-form.login')}}
                        </button>
                    </a>
                </div>

                <div class="row" >
                    <div class="body bg-light col-4 text-center d-flex">
                        <a
                            class="align-self-center"
                            href="{{ route('shop.home.index') }}"  
                        >

                            @if ($logo = core()->getCurrentChannel()->logo_url)
                                <img class="logo" src="{{ $logo }}" />
                            @else
                                <img class="logo align-self-center" src="{{ asset('themes/buynoir-lite/assets/images/logo-text.png') }}" />
                            @endif
                        </a>
                    </div>
                    <div class="body col-8 bg-white" style="border-left:0px">
                        <h3 class="fw6">
                        <sub><i class="material-icons">group_add</i></sub>
                            {{ __('velocity::app.customer.signup-form.become-user')}}
                        </h3>

                        <p class="fs16">
                            {{ __('velocity::app.customer.signup-form.form-sginup-text')}}
                        </p>

                        {!! view_render_event('bagisto.shop.customers.signup.before') !!}

                        <form
                            method="post"
                            action="{{ route('customer.register.create') }}"
                            @submit.prevent="onSubmit">

                            {{ csrf_field() }}

                            {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}

                            <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                                <label for="first_name" class="required label-style">
                                    {{ __('shop::app.customer.signup-form.firstname') }}
                                </label>

                                <input
                                    type="text"
                                    class="form-style"
                                    name="first_name"
                                    v-validate="'required'"
                                    value="{{ old('first_name') }}"
                                    placeholder="First Name"
                                    data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;" />

                                <span class="control-error" v-if="errors.has('first_name')">
                                    @{{ errors.first('first_name') }}
                                </span>
                            </div>

                            {!! view_render_event('bagisto.shop.customers.signup_form_controls.firstname.after') !!}

                            <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                                <label for="last_name" class="required label-style">
                                    {{ __('shop::app.customer.signup-form.lastname') }}
                                </label>

                                <input
                                    type="text"
                                    class="form-style"
                                    name="last_name"
                                    v-validate="'required'"
                                    placeholder="Last Name"
                                    value="{{ old('last_name') }}"
                                    data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;" />

                                <span class="control-error" v-if="errors.has('last_name')">
                                    @{{ errors.first('last_name') }}
                                </span>
                            </div>

                            {!! view_render_event('bagisto.shop.customers.signup_form_controls.lastname.after') !!}

                            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                                <label for="email" class="required label-style">
                                    {{ __('shop::app.customer.signup-form.email') }}
                                </label>

                                <input
                                    type="email"
                                    class="form-style"
                                    name="email"
                                    v-validate="'required|email'"
                                    placeholder="Email Address"
                                    value="{{ old('email') }}"
                                    data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;" />

                                <span class="control-error" v-if="errors.has('email')">
                                    @{{ errors.first('email') }}
                                </span>
                            </div>

                            {!! view_render_event('bagisto.shop.customers.signup_form_controls.email.after') !!}

                            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                                <label for="password" class="required label-style">
                                    {{ __('shop::app.customer.signup-form.password') }}
                                </label>

                                <input
                                    type="password"
                                    class="form-style"
                                    name="password"
                                    v-validate="'required|min:6'"
                                    ref="password"
                                    placeholder="Password"
                                    value="{{ old('password') }}"
                                    data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;" />

                                <span class="control-error" v-if="errors.has('password')">
                                    @{{ errors.first('password') }}
                                </span>
                            </div>

                            {!! view_render_event('bagisto.shop.customers.signup_form_controls.password.after') !!}

                            <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                                <label for="password_confirmation" class="required label-style">
                                    {{ __('shop::app.customer.signup-form.confirm_pass') }}
                                </label>

                                <input
                                    type="password"
                                    class="form-style"
                                    name="password_confirmation"
                                    placeholder="Confirm Password"
                                    v-validate="'required|min:6|confirmed:password'"
                                    data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;" />

                                <span class="control-error" v-if="errors.has('password_confirmation')">
                                    @{{ errors.first('password_confirmation') }}
                                </span>
                            </div>

                            {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}

                            <button class="btn btn-dark btn-lg" type="submit">
                                {{ __('shop::app.customer.signup-form.title') }}
                            </button>
                        </form>

                        {!! view_render_event('bagisto.shop.customers.signup.after') !!}
                    </div>
                </div><!-- end row -->
            </div>
        </div>
    </div>
@endsection
