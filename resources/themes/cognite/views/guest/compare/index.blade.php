@extends('shop::layouts.master')

@include('shop::guest.compare.compare-products')

@section('page_title')
    {{ __('shop::app.customer.compare.compare_similar_items') }}
@endsection

@section('content-wrapper')
    <div class="main-container-wrapper">
        <div class="guest-compare-products">
            <compare-product></compare-product>
        </div>
    </div>
@endsection