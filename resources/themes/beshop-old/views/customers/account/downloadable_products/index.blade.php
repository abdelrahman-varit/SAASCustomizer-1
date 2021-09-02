@extends('shop::layouts.master')

@section('activeItem')
    <i class="fas fa-cloud_download me-2"></i> Downloadable Products
@endsection

@section('page_title')
    {{ __('shop::app.customer.account.downloadable_products.title') }}
@endsection

@section('content-wrapper')
<div class="py-5"></div>
<div class="container">
    <div class="row">
        @include('shop::customers.account.partials.sidemenu')

        <!-- Right Side Content Start -->
        <div class="col-lg-8 col-xl-9">
            <h4 class="mt-3 m-lg-0 text-primary">{{ __('shop::app.customer.account.downloadable_products.title') }}</h4>

            <div class="user-orders-wrapper mt-4">

                {!! view_render_event('bagisto.shop.customers.account.downloadable_products.list.before') !!}

                {!! app('Webkul\Shop\DataGrids\DownloadableProductDataGrid')->render() !!}

                {!! view_render_event('bagisto.shop.customers.account.downloadable_products.list.after') !!}
            </div>
        </div>
        <!-- Right Side Content End -->
    </div>
</div>
<div class="py-5"></div>
@endsection