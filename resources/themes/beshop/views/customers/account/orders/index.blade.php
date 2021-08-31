@extends('shop::layouts.master')

@section('activeItem')
    <i class="fas fa-shopping_cart me-2"></i> Orders
@endsection

@section('page_title')
    {{ __('shop::app.customer.account.order.index.page-title') }}
@endsection

@section('content-wrapper')
<div class="py-5"></div>
<div class="container">
    <div class="row">
        @include('shop::customers.account.partials.sidemenu')

        <!-- Right Side Content Start -->
        <div class="col-lg-8 col-xl-9">
            <h4 class="mt-3 m-lg-0 text-primary">{{ __('shop::app.customer.account.order.index.title') }}</h4>

            <div class="user-orders-wrapper mt-4">

                {!! view_render_event('bagisto.shop.customers.account.orders.list.before') !!}

                {!! app('Webkul\Shop\DataGrids\OrderDataGrid')->render() !!}

                {!! view_render_event('bagisto.shop.customers.account.orders.list.after') !!}
            </div>
        </div>
        <!-- Right Side Content End -->
    </div>
</div>
<div class="py-5"></div>
@endsection