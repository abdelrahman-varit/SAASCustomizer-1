@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@section('activeItem')
    <i class="fas fa-people me-2"></i> Profile
@endsection

@section('content-wrapper')

<div class="py-5"></div>

<div class="container">
    <div class="row">
        
        @include('shop::customers.account.partials.sidemenu')

        <!-- Right Side Content Start -->
        <div class="col-lg-8 col-xl-9">
            {!! view_render_event('bagisto.shop.customers.account.profile.view.before', ['customer' => $customer]) !!}

            <div class="user-profile-wrapper d-flex flex-column flex-lg-row mt-4">
                <div class="col-lg-4 p-4 text-lg-center">
                    <img src="{{ asset('themes/beshop/img/demo/User.png') }}" alt="Mohammad Wahid" width="100" height="100" class="rounded-circle mb-3">
                    <h4 class="m-0 text-black">{{ $customer->first_name }} {{ $customer->last_name }}</h4>
                </div>
                <div class="col-lg-8 p-4">
                    <h4 class="mb-4 text-primary border-bottom border-primary d-inline-block">Personal Details</h4>
                    
                    {!! view_render_event('bagisto.shop.customers.account.profile.view.table.before', ['customer' => $customer]) !!}

                    <p class="mb-2"><strong>{{ __('shop::app.customer.account.profile.fname') }}:</strong> {{ $customer->first_name }}</p>
                    {!! view_render_event('bagisto.shop.customers.account.profile.view.table.first_name.after', ['customer' => $customer]) !!}


                    <p class="mb-2"><strong>{{ __('shop::app.customer.account.profile.lname') }}:</strong> {{ $customer->last_name }}</p>
                    {!! view_render_event('bagisto.shop.customers.account.profile.view.table.last_name.after', ['customer' => $customer]) !!}


                    <p class="mb-2"><strong>{{ __('shop::app.customer.account.profile.gender') }}:</strong> {{ __($customer->gender) }}</p>
                    {!! view_render_event('bagisto.shop.customers.account.profile.view.table.gender.after', ['customer' => $customer]) !!}


                    <p class="mb-2"><strong>{{ __('shop::app.customer.account.profile.dob') }}:</strong> {{ $customer->date_of_birth }}</p>
                    {!! view_render_event('bagisto.shop.customers.account.profile.view.table.date_of_birth.after', ['customer' => $customer]) !!}


                    <p class="mb-4"><strong>{{ __('shop::app.customer.account.profile.email') }}:</strong> {{ $customer->email }}</p>

                    {!! view_render_event('bagisto.shop.customers.account.profile.view.table.after', ['customer' => $customer]) !!}

                    <a href="{{ route('customer.profile.edit') }}" class="btn btn-primary text-white fw-bold rounded-pill" style="width: 120px">{{ __('shop::app.customer.account.profile.index.edit') }}</a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteProfile" class="btn btn-danger fw-bold rounded-pill" style="width: 120px">{{ __('shop::app.customer.account.address.index.delete') }}</button>
                </div>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.view.after', ['customer' => $customer]) !!}
        </div>
        <!-- Right Side Content End -->
    </div>
</div>

<div class="py-5"></div>


<!-- Modal -->
<div class="modal fade" id="deleteProfile">
    <div class="modal-dialog">
        <form action="{{ route('customer.profile.destroy') }}" method="POST" class="modal-content needs-validation" novalidate>
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label for="password" class="form-label">{{ __('shop::app.customer.account.address.index.enter-password') }} <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" minlength="6" required>
                <div class="invalid-feedback">{{ $errors->has('password') ? $errors->first('password') : "Password minimum length is 6" }}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">{{ __('shop::app.customer.account.address.index.delete') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
