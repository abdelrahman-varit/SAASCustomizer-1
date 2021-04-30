@extends('shop::customers.account.index')

@section('page_title')
    {{ __('shop::app.customer.account.downloadable_products.title') }}
@endsection

@section('page-detail-wrapper')
   
     <div class="col-12 bg-light p-5 mb-3">

        <span class="account-heading ">
             {{ __('shop::app.customer.account.downloadable_products.title') }}
            <sub><i class="material-icons">chevron_right</i></sup>
        </span>

       

    </div>



    {!! view_render_event('bagisto.shop.customers.account.downloadable_products.list.before') !!}

        <div class="account-items-list">
            <div class="account-table-content">

                {!! app('Webkul\Shop\DataGrids\DownloadableProductDataGrid')->render() !!}

            </div>
        </div>

    {!! view_render_event('bagisto.shop.customers.account.downloadable_products.list.after') !!}
@endsection