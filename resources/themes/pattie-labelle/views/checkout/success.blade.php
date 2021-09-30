@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.checkout.success.title') }}
@stop

@section('content-wrapper')

<div style="background-image: url({{ asset('themes/pattie-labelle/assets/images/order_status_bg.png') }}); padding: 6rem 0">
    <div class="main-container-wrapper">

        <div class="order-success-content">
            <img src="{{ asset('themes/pattie-labelle/assets/images/order-success-icon.svg') }}" alt="">
            
            <h1>{{ __('shop::app.checkout.success.thanks') }}</h1>
    
            <p>{{ __('shop::app.checkout.success.order-id-info', ['order_id' => $order->increment_id]) }}</p>
    
            <p>{{ __('shop::app.checkout.success.info') }}</p>
    
            {{ view_render_event('bagisto.shop.checkout.continue-shopping.before', ['order' => $order]) }}
    
            <div class="misc-controls">
                <a href="{{ route('shop.home.index') }}" class="btn btn-lg btn-black">
                    {{ __('shop::app.checkout.cart.continue-shopping') }}
                </a>
            </div>
            
            {{ view_render_event('bagisto.shop.checkout.continue-shopping.after', ['order' => $order]) }}
            
        </div>
    </div>
</div>
@endsection