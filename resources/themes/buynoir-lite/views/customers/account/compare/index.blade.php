@extends('shop::customers.account.index')

@include('velocity::guest.compare.compare-products')

@section('page_title')
    {{ __('velocity::app.customer.compare.compare_similar_items') }}
@endsection

@push('css')
    <style>
        .compare-products .col, .compare-products .col-2 {
            max-width: 25%;
        }
    </style>
@endpush

@section('page-detail-wrapper')
     <div class="col-12 bg-light p-5 mb-3">
        <span class="account-heading ">
             {{ __('Compare ') }}
            <sub><i class="material-icons">chevron_right</i></sup>
        </span>
    </div>
    <compare-product></compare-product>
@endsection
