@extends('shop::customers.account.index')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@push('css')
    <style>
        .account-head {
            height: 50px;
        }
    </style>
@endpush


@section('page-detail-wrapper')
    

    {!! view_render_event('bagisto.shop.customers.account.profile.view.before', ['customer' => $customer]) !!}

    <div class="account-table-content profile-page-content">
        <div class="row d-flex">
            <div class="col-12 bg-light p-5">
                <span class="account-heading ">
                    {{ __('shop::app.customer.account.profile.index.title') }}
                    <sub><i class="material-icons">chevron_right</i></sup>
                </span>
            </div>
            <div class=" col-6 p-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     <span class="account-heading ">
                        {{ __('shop::app.customer.account.profile.index.title') }}
                    </span>

                    <span class="account-action pull-right">
                        <a href="{{ route('customer.profile.edit') }}" class="btn btn-light border unset ">
                            <i class="material-icons">edit</i>
                            {{ __('shop::app.customer.account.profile.index.edit') }}
                        </a>
                    
                        <button
                            type="submit"
                            class="btn btn-dark mb20" @click="showModal('deleteProfile')" >
                            <i class="material-icons">delete_outline</i>
                            {{ __('shop::app.customer.account.address.index.delete') }}
                        </button>
                    </span>

                    </div>
                    <div class="panel-body">
                        <table class="table ">
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
                                    <td>{{ $customer->gender ?? '-' }}</td>
                                </tr>

                                {!! view_render_event('bagisto.shop.customers.account.profile.view.table.gender.after', ['customer' => $customer]) !!}

                                <tr>
                                    <td>{{ __('shop::app.customer.account.profile.dob') }}</td>
                                    <td>{{ $customer->date_of_birth ?? '-' }}</td>
                                </tr>

                                {!! view_render_event('bagisto.shop.customers.account.profile.view.table.date_of_birth.after', ['customer' => $customer]) !!}

                                <tr>
                                    <td>{{ __('shop::app.customer.account.profile.email') }}</td>
                                    <td>{{ $customer->email }}</td>
                                </tr>

                                {!! view_render_event(
                                'bagisto.shop.customers.account.profile.view.table.after', ['customer' => $customer])
                                !!}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 ">

            </div>
        </div>
      

        <form method="POST" action="{{ route('customer.profile.destroy') }}" @submit.prevent="onSubmit">
            @csrf

            <modal id="deleteProfile" :is-open="modalIds.deleteProfile">
                <h3 slot="header">{{ __('shop::app.customer.account.address.index.enter-password') }}
                </h3>
                <i class="rango-close"></i>

                <div slot="body">
                    <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                        <label for="password" class="required">{{ __('admin::app.users.users.password') }}</label>
                        <input type="password" v-validate="'required|min:6|max:18'" class="control" id="password" name="password" data-vv-as="&quot;{{ __('admin::app.users.users.password') }}&quot;"/>
                        <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                    </div>

                    <div class="page-action">
                        <button type="submit"  class="theme-btn mb20">
                        {{ __('shop::app.customer.account.address.index.delete') }}
                        </button>
                    </div>
                </div>
            </modal>
        </form>
    </div>

    {!! view_render_event('bagisto.shop.customers.account.profile.view.after', ['customer' => $customer]) !!}
@endsection