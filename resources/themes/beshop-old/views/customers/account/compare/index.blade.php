@extends('shop::layouts.master')

@include('shop::guest.compare.compare-products')

@section('activeItem')
    <i class="fas fa-compare me-2"></i> Compare
@endsection

@section('page_title')
    {{ __('shop::app.customer.compare.compare_similar_items') }}
@endsection

@section('content-wrapper')
<div class="py-5"></div>
<div class="container">
    <div class="row">
        @include('shop::customers.account.partials.sidemenu')

        <!-- Right Side Content Start -->
        <div class="col-lg-8 col-xl-9">
            <h4 class="mt-3 m-lg-0 text-primary">Comparison</h4>

            <div class="user-orders-wrapper mt-4">

                {!! view_render_event('bagisto.shop.customers.account.comparison.list.before') !!}

                <compare-product></compare-product>

                {!! view_render_event('bagisto.shop.customers.account.comparison.list.after') !!}
            </div>
        </div>
        <!-- Right Side Content End -->
    </div>
</div>
<div class="py-5"></div>
@endsection
