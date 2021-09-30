@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@section('content-wrapper')
<div class="main-container-wrapper">
    <div class="account-content">

        @include('shop::customers.account.partials.sidemenu')

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

            <div class="account-table-content">

                @if(!empty($customer))
                    <div class="account-profile-info">
                        {!! view_render_event('bagisto.shop.customers.account.profile.view.table.before', ['customer' => $customer]) !!}

                        <p><strong>{{ __('shop::app.customer.account.profile.fname') }}:</strong> {{ empty($customer->first_name) ?'':$customer->first_name }}</p>
                        {!! view_render_event('bagisto.shop.customers.account.profile.view.table.first_name.after', ['customer' => $customer]) !!}

                        <p><strong>{{ __('shop::app.customer.account.profile.lname') }}:</strong> {{ $customer->last_name }}</p>
                        {!! view_render_event('bagisto.shop.customers.account.profile.view.table.last_name.after', ['customer' => $customer]) !!}

                        <p><strong>{{ __('shop::app.customer.account.profile.gender') }}:</strong> {{ __($customer->gender) }}</p>
                        {!! view_render_event('bagisto.shop.customers.account.profile.view.table.gender.after', ['customer' => $customer]) !!}

                        <p><strong>{{ __('shop::app.customer.account.profile.dob') }}:</strong> {{ $customer->date_of_birth }}</p>
                        {!! view_render_event('bagisto.shop.customers.account.profile.view.table.date_of_birth.after', ['customer' => $customer]) !!}

                        <p><strong>{{ __('shop::app.customer.account.profile.email') }}:</strong> {{ $customer->email }}</p>

                        <button type="submit" @click="showModal('deleteProfile')" class="btn btn-md btn-black">{{ __('shop::app.customer.account.address.index.delete') }}</button>

                        {{-- @if ($customer->subscribed_to_news_letter == 1)
                            <p><strong>{{ __('shop::app.footer.subscribe-newsletter') }}:</strong> <a class="btn btn-sm btn-primary" href="{{ route('shop.unsubscribe', $customer->email) }}">{{ __('shop::app.subscription.unsubscribe') }} </a></p>
                        @endif --}}                        

                        {!! view_render_event('bagisto.shop.customers.account.profile.view.table.after', ['customer' => $customer]) !!}
                    </div>

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

                @endif
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.view.after', ['customer' => $customer]) !!}
        </div>
    </div>
</div>
@endsection
