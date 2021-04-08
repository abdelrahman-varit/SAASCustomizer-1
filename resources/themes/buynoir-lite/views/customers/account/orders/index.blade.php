@extends('shop::customers.account.index')

@section('page_title')
    {{ __('shop::app.customer.account.order.index.page-title') }}
@endsection

@section('page-detail-wrapper')

     <div class="col-12 bg-light p-5 mb-3">
        <span class="account-heading ">
             {{ __('shop::app.customer.account.order.index.title') }} 
            <sub><i class="material-icons">chevron_right</i></sup>
        </span>
    </div>


    {!! view_render_event('bagisto.shop.customers.account.orders.list.before') !!}

        <div class="account-items-list">
            <div class="account-table-content">

                {!! app('Webkul\Shop\DataGrids\OrderDataGrid')->render() !!}

            </div>
        </div>

    {!! view_render_event('bagisto.shop.customers.account.orders.list.after') !!}
@endsection