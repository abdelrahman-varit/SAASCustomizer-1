@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@section('content-wrapper')

<div class="py-5"></div>

<div class="container">
    <div class="row">
        
        @include('shop::customers.account.partials.sidemenu')

        <!-- Right Side Content Start -->
        <div class="col-lg-8 col-xl-9">
            <div class="user-profile-wrapper d-flex flex-column flex-lg-row mt-4">
                <div class="col-lg-4 p-4 text-lg-center">
                    <img src="{{ asset('themes/beshop/img/demo/User.png') }}" alt="Mohammad Wahid" width="100" height="100" class="rounded-circle mb-3">
                    <h4 class="m-0 text-black">Mohammad Wahid</h4>
                </div>
                <div class="col-lg-8 p-4">
                    <h4 class="mb-4 text-primary border-bottom border-primary d-inline-block">Personal Details</h4>
                    <p class="mb-2"><strong>Gender:</strong> Male</p>
                    <p class="mb-2"><strong>Date of Birth:</strong> 12-12-2012</p>
                    <p class="mb-4"><strong>Email:</strong> wahid.rootnext@gmail.com</p>
                    <a href="#" class="btn btn-primary text-white fw-bold rounded-pill" style="width: 120px">Edit</a>
                </div>
            </div>
        </div>
        <!-- Right Side Content End -->
    </div>
</div>

<div class="py-5"></div>














<div class="main-container-wrapper d-none">
    <div class="account-content">

        

        <div class="account-layout">

            <div class="account-head">

                <span class="back-icon"><a href="{{ route('customer.profile.index') }}"><i class="icon icon-menu-back"></i></a></span>

                <span class="account-heading">{{ __('shop::app.customer.account.profile.index.title') }}</span>

                <span class="account-action">
                    <a href="{{ route('customer.profile.edit') }}">{{ __('shop::app.customer.account.profile.index.edit') }}</a>
                </span>

                <div class="horizontal-rule"></div>
            </div>

             {!! view_render_event('bagisto.shop.customers.account.profile.view.before', ['customer' => $customer]) !!}

            <div class="account-table-content" style="width: 50%;">
                <table style="color: #5E5E5E;">
                    <tbody>
                        {!! view_render_event(
                        'bagisto.shop.customers.account.profile.view.table.before', ['customer' => $customer])
                        !!}
                        <tr>
                            <td>{{ __('shop::app.customer.account.profile.fname') }}</td>
                            <td>{{ $customer->first_name }}</td>
                        </tr>

                        {!! view_render_event('bagisto.shop.customers.account.profile.view.table.first_name.after', ['customer' => $customer]) !!}

                        <tr>
                            <td>{{ __('shop::app.customer.account.profile.lname') }}</td>
                            <td>{{ $customer->last_name }}</td>
                        </tr>

                        {!! view_render_event('bagisto.shop.customers.account.profile.view.table.last_name.after', ['customer' => $customer]) !!}

                        <tr>
                            <td>{{ __('shop::app.customer.account.profile.gender') }}</td>
                            <td>{{ __($customer->gender) }}</td>
                        </tr>

                        {!! view_render_event('bagisto.shop.customers.account.profile.view.table.gender.after', ['customer' => $customer]) !!}

                        <tr>
                            <td>{{ __('shop::app.customer.account.profile.dob') }}</td>
                            <td>{{ $customer->date_of_birth }}</td>
                        </tr>

                        {!! view_render_event('bagisto.shop.customers.account.profile.view.table.date_of_birth.after', ['customer' => $customer]) !!}

                        <tr>
                            <td>{{ __('shop::app.customer.account.profile.email') }}</td>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        {!! view_render_event(
                        'bagisto.shop.customers.account.profile.view.table.after', ['customer' => $customer])
                        !!}

                        {{-- @if ($customer->subscribed_to_news_letter == 1)
                            <tr>
                                <td> {{ __('shop::app.footer.subscribe-newsletter') }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('shop.unsubscribe', $customer->email) }}">{{ __('shop::app.subscription.unsubscribe') }} </a>
                                </td>
                            </tr>
                        @endif --}}
                    </tbody>
                </table>


                <button type="submit" @click="showModal('deleteProfile')" class="btn btn-lg btn-primary mt-10">
                    {{ __('shop::app.customer.account.address.index.delete') }}
                </button>

                <form method="POST" action="{{ route('customer.profile.destroy') }}" @submit.prevent="onSubmit">
                    @csrf

                    <modal id="deleteProfile" :is-open="modalIds.deleteProfile">
                        <h3 slot="header">{{ __('shop::app.customer.account.address.index.enter-password') }}</h3>

                        <div slot="body">
                            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                                <label for="password" class="required">{{ __('admin::app.users.users.password') }}</label>
                                <input type="password" v-validate="'required|min:6|max:18'" class="control" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.users.password') }}&quot;"/>
                                <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                            </div>

                            <div class="page-action">
                                <button type="submit"  class="btn btn-lg btn-primary mt-10">
                                {{ __('shop::app.customer.account.address.index.delete') }}
                                </button>
                            </div>
                        </div>
                    </modal>
                </form>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.view.after', ['customer' => $customer]) !!}
        </div>
    </div>
</div>
@endsection
