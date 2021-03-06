@extends('admin::layouts.master')

@section('css')
    @include ('saassubscription::admin.layouts.style')
@stop

@section('page_title')
    {{ __('saassubscription::app.admin.overview.title') }}
@stop

@section('content-wrapper')
    <div class="content full-page">

        <div class="page-header">
            <div class="page-title">
                <h1>
                    {{ __('saassubscription::app.admin.overview.title') }}
                </h1>
            </div>
        </div>

        <div class="page-content dashboard">

            @include('saassubscription::admin.layouts.tabs')

            <div class="sale-container">

                <div class="sale-section">
                    <div class="secton-title">
                        <span>{{ __('saassubscription::app.admin.overview.plan-info') }}</span>
                    </div>

                    <div class="section-content">
                        <div class="row">
                            <span class="title">
                                {{ __('Profile Plan ID') }}
                            </span>
                          
                            <span class="value">
                                {{ $recurringProfile->id }} 
                            </span>
                        </div>

                        <div class="row">
                            <span class="title">
                                {{ __('saassubscription::app.admin.overview.plan') }}
                            </span>

                            <span class="value">
                                @if ($recurringProfile->type == 'trial')
                                    {{ __('saassubscription::app.admin.invoices.plan-name', ['plan' => $recurringProfile->schedule_description]) }}
                                @else
                                    {{ $recurringProfile->schedule_description }}
                                @endif
                            </span>
                        </div>

                        


                        @if ($recurringProfile->type != 'free')
                            <div class="row">
                                <span class="title">
                                    {{ __('saassubscription::app.admin.overview.expiration-date') }}
                                </span>

                                <span class="value">
                                    {{ $recurringProfile->cycle_expired_on }}
                                </span>
                            </div>
                        @endif

                        @if ($recurringProfile->type != 'trial')
                            <div class="row">
                                <span class="title">
                                    {{ __('saassubscription::app.admin.overview.billing-amount') }}
                                </span>

                                <span class="value">
                                    {{ core()->formatPrice($recurringProfile->amount, config('app.currency')) }}
                                </span>
                            </div>

                            @if ($recurringProfile->type != 'free')
                                <div class="row">
                                    <span class="title">
                                        {{ __('saassubscription::app.admin.overview.billing-cycle') }}
                                    </span>

                                    <span class="value">
                                        @if ($recurringProfile->period_unit == 'month')
                                            {{ __('saassubscription::app.admin.overview.monthly') }}
                                        @else
                                            {{ __('saassubscription::app.admin.overview.annual') }}
                                        @endif
                                    </span>
                                </div>

                                <div class="row">
                                    <span class="title">
                                        {{ __('saassubscription::app.admin.overview.profile-id') }}
                                    </span>

                                    <span class="value">
                                        {{ $recurringProfile->reference_id }}
                                    </span>
                                </div>

                                @if ($recurringProfile->tin != '')
                                    <div class="row">
                                        <span class="title">
                                            {{ __('saassubscription::app.admin.overview.tin') }}
                                        </span>

                                        <span class="value">
                                            {{ $recurringProfile->tin }}
                                        </span>
                                    </div>
                                @endif

                                <div class="row">
                                    <span class="title">
                                        {{ __('saassubscription::app.admin.overview.profile-state') }}
                                    </span>

                                    <span class="value">
                                        {{ $recurringProfile->state }}
                                    </span>
                                </div>

                                @if ($recurringProfile->state == 'Active')
                                    <div class="row">
                                        <span class="title">
                                            {{ __('saassubscription::app.admin.overview.next-billing-date') }}
                                        </span>

                                        <span class="value">
                                            {{ $recurringProfile->next_due_date }}
                                        </span>
                                    </div>

                                    <div class="row">
                                        <span class="title">
                                            {{ __('saassubscription::app.admin.overview.payment-status') }}
                                        </span>

                                        <span class="value">
                                            {{ $recurringProfile->payment_status }}
                                        </span>
                                    </div>
                                @endif
                            @endif
                        @endif

                    </div>
                </div>

                <div class="sale-section">
                    <div class="secton-title">
                        <span>{{ __('saassubscription::app.admin.overview.features') }}</span>
                    </div>

                    <div class="section-content">

                        <div class="row">
                            <span class="title">
                                {!! __('saassubscription::app.admin.plans.allowed-products', ['count' => '<b>' . $recurringProfile->purchased_plan->allowed_products . '</b>']) !!}
                            </span>
                        </div>

                        <div class="row">
                            <span class="title">
                                {!! __('saassubscription::app.admin.plans.allowed-categories', ['count' => '<b>' . $recurringProfile->purchased_plan->allowed_categories . '</b>']) !!}
                            </span>
                        </div>

                        <div class="row">
                            <span class="title">
                                {!! __('saassubscription::app.admin.plans.allowed-attributes', ['count' => '<b>' . $recurringProfile->purchased_plan->allowed_attributes . '</b>']) !!}
                            </span>
                        </div>

                        <div class="row">
                            <span class="title">
                                {!! __('saassubscription::app.admin.plans.allowed-attribute-families', ['count' => '<b>' . $recurringProfile->purchased_plan->allowed_attribute_families . '</b>']) !!}
                            </span>
                        </div>

                        <div class="row">
                            <span class="title">
                                {!! __('saassubscription::app.admin.plans.allowed-channels', ['count' => '<b>' . $recurringProfile->purchased_plan->allowed_channels . '</b>']) !!}
                            </span>
                        </div>

                        <div class="row">
                            <span class="title">
                                {!! __('saassubscription::app.admin.plans.allowed-orders', ['count' => '<b>' . $recurringProfile->purchased_plan->allowed_orders . '</b>']) !!}
                            </span>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
@stop