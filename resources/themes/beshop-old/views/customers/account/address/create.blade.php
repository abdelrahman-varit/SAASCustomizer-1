@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.address.create.page-title') }}
@endsection

@section('activeItem')
    <i class="fas fa-contact_mail me-2"></i> Address
@endsection

@section('content-wrapper')

<div class="py-5"></div>
<div class="container">
    <div class="row">
        @include('shop::customers.account.partials.sidemenu')

        <!-- Right Side Content Start -->
        <div class="col-lg-8 col-xl-9">
            <h4 class="mb-0">Add Address</h4>
            <div class="user-address-wrapper mt-4">
                
                {!! view_render_event('bagisto.shop.customers.account.address.create.before') !!}

                <form method="post" action="{{ route('customer.address.store') }}" class="row gy-3 needs-validation" novalidate>
                    @csrf
                    
                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.before') !!}

                    <div class="col-12">
                        <label for="company_name">{{ __('shop::app.customer.account.address.create.company_name') }}</label>
                        <input value="{{ old('company_name') }}" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name">
                        <div class="invalid-feedback">{{ $errors->has('company_name') ? $errors->first('company_name') : "Company name is required" }}</div>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.company_name.after') !!}

                    <div class="col-12">
                        <label for="first_name">{{ __('shop::app.customer.account.address.create.first_name') }} <span class="text-danger">*</span></label>
                        <input value="{{ old('first_name') }}" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" required>
                        <div class="invalid-feedback">{{ $errors->has('first_name') ? $errors->first('first_name') : "First name is required" }}</div>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.first_name.after') !!}

                    <div class="col-12">
                        <label for="last_name">{{ __('shop::app.customer.account.address.create.last_name') }} <span class="text-danger">*</span></label>
                        <input value="{{ old('last_name') }}" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required>
                        <div class="invalid-feedback">{{ $errors->has('last_name') ? $errors->first('last_name') : "Last name is required" }}</div>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.last_name.after') !!}

                    <div class="col-12">
                        <label for="vat_id">{{ __('shop::app.customer.account.address.create.vat_id') }}</label>
                        <input type="text" class="form-control @error('vat_id') is-invalid @enderror" name="vat_id" value="{{ old('vat_id') }}">
                        <div class="form-text">{{ __('shop::app.customer.account.address.create.vat_help_note') }}</div>
                        <div class="invalid-feedback">{{ $errors->has('vat_id') ? $errors->first('vat_id') : "Vat ID is required" }}</div>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.vat_id.after') !!}

                    <div class="col-12">
                        <label for="address1">{{ __('shop::app.customer.account.address.create.street-address') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('address1[]') is-invalid @enderror" name="address1[]" value="{{ old('address1') }}" id="address1" required>
                        <div class="invalid-feedback">{{ $errors->has('address1[]') ? $errors->first('address1[]') : "Address is required" }}</div>
                    </div>

                    @if (core()->getConfigData('customer.settings.address.street_lines') && core()->getConfigData('customer.settings.address.street_lines') > 1)
                        <div class="col-12">
                            @for ($i = 1; $i < core()->getConfigData('customer.settings.address.street_lines'); $i++)
                                <input type="text" class="form-control @error('address1['.$i.']') is-invalid @enderror" name="address1[{{ $i }}]" id="address_{{ $i }}" required>
                            @endfor
                        </div>
                    @endif

                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.street-address.after') !!}

                    <div class="col-12">
                        <label for="country">{{ __('shop::app.customer.account.address.create.country') }} <span class="text-danger">*</span></label>
                        <select class="form-select" id="country" name="country" required>
                            <option value=""></option>
                            @foreach (core()->countries() as $country)
                                <option {{ $country->code === $defaultCountry ? 'selected' : '' }}  value="{{ $country->code }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">{{ $errors->has('country') ? $errors->first('country') : "Country is required" }}</div>
                    </div>

                    <div class="col-12">
                        <label for="state">{{ __('shop::app.customer.account.address.create.state') }} <span class="text-danger">*</span></label>
                        <input value="{{ old('state') }}" type="text" class="form-control @error('state') is-invalid @enderror" name="state" required>
                        <div class="invalid-feedback">{{ $errors->has('state') ? $errors->first('state') : "State is required" }}</div>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.country-state.after') !!}

                    <div class="col-12">
                        <label for="city">{{ __('shop::app.customer.account.address.create.city') }} <span class="text-danger">*</span></label>
                        <input value="{{ old('city') }}" type="text" class="form-control @error('city') is-invalid @enderror" name="city" required>
                        <div class="invalid-feedback">{{ $errors->has('city') ? $errors->first('city') : "City is required" }}</div>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.city.after') !!}

                    <div class="col-12">
                        <label for="postcode">{{ __('shop::app.customer.account.address.create.postcode') }} <span class="text-danger">*</span></label>
                        <input value="{{ old('postcode') }}" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" required>
                        <div class="invalid-feedback">{{ $errors->has('postcode') ? $errors->first('postcode') : "Postcode is required" }}</div>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.postcode.after') !!}

                    <div class="col-12">
                        <label for="phone">{{ __('shop::app.customer.account.address.create.phone') }} <span class="text-danger">*</span></label>
                        <input value="{{ old('phone') }}" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required>
                        <div class="invalid-feedback">{{ $errors->has('phone') ? $errors->first('phone') : "Phone is required" }}</div>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.address.create_form_controls.after') !!}

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary text-white">{{ __('shop::app.customer.account.address.create.submit') }}</button>
                    </div>
                </form>

                {!! view_render_event('bagisto.shop.customers.account.address.create.after') !!}
            </div>
        </div>
        <!-- Right Side Content End -->
    </div>
</div>
<div class="py-5"></div>
@endsection