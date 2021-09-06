@extends('admin::layouts.master')

@section('css')
    @include ('saassubscription::admin.layouts.style')
@stop

@section('page_title')
    {{ __('saassubscription::app.admin.plans.title') }}
@stop

@section('content-wrapper')
    <div class="content full-page">

        <div class="page-header">
            <div class="page-title">
                <h1>
                    {{ __('saassubscription::app.admin.plans.title') }}
                </h1>
            </div>
        </div>

        <div class="page-content dashboard">

            @include('saassubscription::admin.layouts.tabs')

            <div class="plan-list">
                @foreach ($plans as $plan)
                    @php
                        $promo_code = company()->getSuperConfigData('general.design.promo-code.promo-code');
                        $promo_code_enable = company()->getSuperConfigData('general.design.promo-code.promo-enable');
                        if((!$promo_code_enable || !$promo_code) && $plan->name=="Promo Code Plan"){
                            continue;
                        }
                    @endphp

                    <div class="card">
                        <div class="card-title">
                            {{ $plan->name }}
                        </div>

                        <div class="card-info">
                            <form action="{{ route('admin.subscription.plan.add-to-cart', $plan->id) }}" method="post">
                                @csrf()

                                <h2>{{ core()->formatPrice($plan->yearly_amount, config('app.currency')) }}</h2>
                                @if($plan->name=="Promo Code Plan")
                                    <p>Promo Code</p>
                                    <h2 style='text-transform:uppercase'>{{company()->getSuperConfigData('general.design.promo-code.promo-code')}}</h2>
                                @endif
                                <p>{{$plan->description}}</p>
                                
                                <ul>
                                    <li>{!! __('saassubscription::app.admin.plans.allowed-attributes', ['count' => '<b>' . ($plan->allowed_attributes==0?'Unlimited':$plan->allowed_attributes) . '</b>']) !!}</li>
                                    <li>{!! __('saassubscription::app.admin.plans.allowed-attribute-families', ['count' => '<b>' . ($plan->allowed_attribute_families==0?"Unlimited":$plan->allowed_attribute_families) . '</b>']) !!}</li>
                                    <li>{!! __('saassubscription::app.admin.plans.allowed-channels', ['count' => '<b>' . ($plan->allowed_channels==0?'Unlimited':$plan->allowed_channels) . '</b>']) !!}</li>
                                    <li>{!! __('saassubscription::app.admin.plans.allowed-orders', ['count' => '<b>' . ($plan->allowed_orders==0?'Unlimited':$plan->allowed_orders) . '</b>']) !!}</li>
                                </ul>

                                
                                @inject('subscriptionHelper', 'Webkul\SAASSubscription\Helpers\Subscription')
                                <?php
                                    $isServiceStopped = $subscriptionHelper->isServiceStopped();
                                ?>


                             
                                
                                    @if($plan->yearly_amount>0)
                                        @if($isServiceStopped)
                                            <button class="btn btn-lg  btn-primary" {{isset($recurringProfile->schedule_description)&&(($recurringProfile->schedule_description===$plan->name) && !$isServiceStopped)?' disabled ':' '}}>
                                                {{ __('saassubscription::app.admin.plans.purchase') }}  
                                            </button>
                                        @else
                                            @if(isset($recurringProfile->schedule_description)&&($recurringProfile->schedule_description===$plan->name ))
                                            <button class="btn btn-lg " {{isset($recurringProfile->schedule_description)&&(($recurringProfile->schedule_description===$plan->name) && !$isServiceStopped)?' disabled ':' '}}>
                                                {{ __('saassubscription::app.admin.plans.purchase') }}  
                                            </button>
                                            @else
                                            <button class="btn btn-lg btn-primary" {{isset($recurringProfile->schedule_description)&&(($recurringProfile->schedule_description===$plan->name) && !$isServiceStopped)?' disabled ':' '}}>
                                                {{ __('saassubscription::app.admin.plans.purchase') }}  
                                            </button>
                                            @endif
                                            
                                        @endif
                                    @else
                                    <!-- <button class="btn btn-lg btn-danger" {{isset($recurringProfile->schedule_description)&&($recurringProfile->schedule_description===$plan->name)?'  ':''}}>
                                        {{ __('saassubscription::app.admin.plans.purchase') }}  
                                        
                                    </button> -->
                                    @endif
 
                            </form>
                        </div>
                    </div>
                @endforeach


            </div><!-- end plan list -->

        </div>

    </div>
@stop