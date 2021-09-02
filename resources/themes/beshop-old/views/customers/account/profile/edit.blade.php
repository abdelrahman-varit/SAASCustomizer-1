@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.edit-profile.page-title') }}
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
        <div class="col-lg-8 col-xl-9 mt-4">
            {!! view_render_event('bagisto.shop.customers.account.profile.edit.before', ['customer' => $customer]) !!}

            <form method="post" action="{{ route('customer.profile.store') }}" class="row gy-3 needs-validation" novalidate>
                @csrf
                {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]) !!}

                <div class="col-12">
                    <label for="first_name" class="form-label">{{ __('shop::app.customer.account.profile.fname') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') ?? $customer->first_name }}" required>
                    <div class="invalid-feedback">{{ $errors->has('first_name') ? $errors->first('first_name') : "First name is required" }}</div>
                </div>

                {!! view_render_event('bagisto.shop.customers.account.profile.edit.first_name.after') !!}


                <div class="col-12">
                    <label for="last_name" class="form-label">{{ __('shop::app.customer.account.profile.lname') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') ?? $customer->last_name }}" required>
                    <div class="invalid-feedback">{{ $errors->has('last_name') ? $errors->first('last_name') : "Last name is required" }}</div>
                </div>

                {!! view_render_event('bagisto.shop.customers.account.profile.edit.last_name.after') !!}

                <div class="col-12">
                    <label for="gender" class="form-label">{{ __('shop::app.customer.account.profile.gender') }} <span class="text-danger">*</span></label>
                    <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror" required>
                        <option value="" @if ($customer->gender == "") selected @endif></option>
                        <option value="Other" @if ($customer->gender == "Other") selected @endif>{{ __('shop::app.customer.account.profile.other') }}</option>
                        <option value="Male" @if ($customer->gender == "Male") selected @endif>{{ __('shop::app.customer.account.profile.male') }}</option>
                        <option value="Female" @if ($customer->gender == "Female") selected @endif>{{ __('shop::app.customer.account.profile.female') }}</option>
                    </select>
                    <div class="invalid-feedback">{{ $errors->has('gender') ? $errors->first('gender') : "Gender is required" }}</div>
                </div>

                {!! view_render_event('bagisto.shop.customers.account.profile.edit.gender.after') !!}


                <div class="col-12">
                    <label for="date_of_birth" class="form-label">{{ __('shop::app.customer.account.profile.dob') }} <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') ?? $customer->date_of_birth }}" required>
                    <div class="invalid-feedback">{{ $errors->has('date_of_birth') ? $errors->first('date_of_birth') : "Date of birth is required" }}</div>
                </div>

                {!! view_render_event('bagisto.shop.customers.account.profile.edit.date_of_birth.after') !!}


                <div class="col-12">
                    <label for="email" class="form-label">{{ __('shop::app.customer.account.profile.dob') }} <span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $customer->email }}" required>
                    <div class="invalid-feedback">{{ $errors->has('email') ? $errors->first('email') : "Please enter a valid email adress" }}</div>
                </div>

                {!! view_render_event('bagisto.shop.customers.account.profile.edit.email.after') !!}

                <div class="col-12">
                    <label for="oldpassword" class="form-label">{{ __('shop::app.customer.account.profile.opassword') }}</label>
                    <input type="password" class="form-control @error('oldpassword') is-invalid @enderror" id="oldpassword" name="oldpassword">
                    <div class="invalid-feedback">{{ $errors->has('oldpassword') ? $errors->first('oldpassword') : "Old password is required" }}</div>
                </div>

                {!! view_render_event('bagisto.shop.customers.account.profile.edit.oldpassword.after') !!}

                <div class="col-12">
                    <label for="password" class="form-label">{{ __('shop::app.customer.account.profile.password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    <div class="invalid-feedback">{{ $errors->has('password') ? $errors->first('password') : "Minimum password length is 6" }}</div>
                </div>

                {!! view_render_event('bagisto.shop.customers.account.profile.edit.password.after') !!}

                <div class="col-12">
                    <label for="password_confirmation" class="form-label">{{ __('shop::app.customer.account.profile.password') }}</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                    <div class="invalid-feedback">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : "Passwords must be matched" }}</div>
                </div>


                {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', ['customer' => $customer]) !!}

                <div class="col-12">
                    <button class="btn btn-primary text-white" type="submit">{{ __('shop::app.customer.account.profile.submit') }}</button>
                </div>

            </form>

            {!! view_render_event('bagisto.shop.customers.account.profile.edit.after', ['customer' => $customer]) !!}
        </div>
        <!-- Right Side Content End -->
    </div>
</div>

<div class="py-5"></div>

@endsection
