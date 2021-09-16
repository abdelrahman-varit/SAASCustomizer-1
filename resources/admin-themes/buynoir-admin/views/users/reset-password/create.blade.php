@extends('admin::layouts.anonymous-master')

@section('page_title')
    {{ __('admin::app.users.reset-password.title') }}
@stop

@section('content')

    <div class="form-container col-lg-6 mx-auto">
        <form method="POST" action="{{ route('admin.reset-password.store') }}" @submit.prevent="onSubmit">
            @csrf
            <h4 class="mt-3 mb-5 text-orange text-center fw-black">{{ __('admin::app.users.reset-password.title') }}</h4>

            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="form-group mb-3">
                <input type="text" :class="[errors.has('email') ? 'is-invalid' : '']" v-validate="'required|email'" class="form-control" id="email" name="email" data-vv-as="&quot;{{ __('admin::app.users.reset-password.email') }}&quot;" value="{{ old('email') }}"/>
                <span class="invalid-feedback" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
            </div>
            
            <div class="form-group mb-3">
                <input type="password" :class="[errors.has('password') ? 'is-invalid' : '']" v-validate="'required|min:6'" class="form-control" id="password" name="password" ref="password" data-vv-as="&quot;{{ __('admin::app.users.reset-password.password') }}&quot;">
                <span class="invalid-feedback" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
            </div>
            
            <div class="form-group mb-3">
                <input type="password" :class="[errors.has('password') ? 'is-invalid' : '']" v-validate="'required|min:6|confirmed:password'" class="form-control" id="password_confirmation" name="password_confirmation" data-vv-as="&quot;{{ __('admin::app.users.reset-password.confirm-password') }}&quot;" data-vv-as="password"/>
                <span class="invalid-feedback" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
            </div>

            <div class="text-center text-lg-end mb-3">
                <button class="btn default-btn">{{ __('admin::app.users.reset-password.submit-btn-title') }}</button>
            </div>

            <a href="{{ route('admin.session.create') }}">&#8592; {{ __('admin::app.users.reset-password.back-link-title') }}</a>

        </form>
    </div>

    <div class="py-5"></div>
@stop