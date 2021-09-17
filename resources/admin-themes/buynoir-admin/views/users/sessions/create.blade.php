@extends('admin::layouts.anonymous-master')

@section('page_title')
    {{ __('admin::app.users.sessions.title') }}
@stop

@section('content')

    <div class="form-container col-lg-6 mx-auto">
        <form method="POST" class="buynoir-form-login" action="{{ route('admin.session.store') }}" @submit.prevent="onSubmit">
            @csrf
            <h4 class="mt-3 mb-5 text-center fw-black">{{ __('admin::app.users.sessions.emails') }}</h4>
            
            <div class="form-group mb-3">
                <input type="text" v-validate="'required|email'" class="form-control" :class="[errors.has('email') ? 'is-invalid' : '']" id="email" name="email" data-vv-as="&quot;{{ __('admin::app.users.sessions.email') }}&quot;" placeholder="{{ __('admin::app.users.sessions.email-label') }}" />
                <span class="invalid-feedback" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
            </div>

            <div class="form-group mb-3">
                <input type="password" v-validate="'required|min:6'" class="form-control" :class="[errors.has('password') ? 'is-invalid' : '']" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.sessions.password') }}&quot;" value=""  placeholder="{{ __('admin::app.users.sessions.password') }}"/>
                <span class="invalid-feedback" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
            </div>

            <div class="form-group mb-3">
                <a href="{{ route('admin.forget-password.create') }}" class="fw-bold">{{ __('admin::app.users.sessions.forget-password-link-titles') }}</a>
            </div>

            <div class="text-center text-lg-end">
                <button class="btn default-btn">{{ __('admin::app.users.sessions.submit-btn-title') }}</button>
            </div>
        </form>
    </div>

    <div class="py-5"></div>

@stop