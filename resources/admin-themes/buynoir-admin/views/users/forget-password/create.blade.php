@extends('admin::layouts.anonymous-master')

@section('page_title')
    {{ __('admin::app.users.forget-password.title') }}
@stop

@section('content')

    <div class="form-container col-lg-6 mx-auto">
        <form method="POST" action="{{ route('admin.forget-password.store') }}" @submit.prevent="onSubmit">
            @csrf
            <h4 class="mt-3 mb-5 text-orange text-center fw-black">{{ __('admin::app.users.forget-password.header-title') }}</h4>
            
            <div class="form-group mb-3">
                <input type="text" v-validate="'required|email'" class="form-control" :class="[errors.has('email') ? 'is-invalid' : '']" id="email" name="email" data-vv-as="&quot;{{ __('admin::app.users.forget-password.email') }}&quot;" placeholder="{{ __('admin::app.users.forget-password.email') }}" value="{{ old('email') }}">
                <span class="text-danger small d-block mt-1" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
            </div>

            <div class="text-center text-lg-end mb-3">
                <button class="btn default-btn">{{ __('admin::app.users.forget-password.submit-btn-title') }}</button>
            </div>

            <a href="{{ route('admin.session.create') }}">&#8592; {{ __('admin::app.users.forget-password.back-link-title') }}</a>

        </form>
    </div>

    <div class="py-5"></div>
@stop