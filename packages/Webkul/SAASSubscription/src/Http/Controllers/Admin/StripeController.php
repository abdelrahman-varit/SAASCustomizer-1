<?php

namespace Webkul\SAASSubscription\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Webkul\SAASSubscription\Http\Controllers\Controller;
use Webkul\SAASSubscription\Helpers\Subscription;
// use Webkul\SAASSubscription\Helpers\Paypal;              // Use Steipe's Library

class StripeController extends Controller
{
    /**
     * Subscription object
     *
     * @var \Webkul\SAASSubscription\Helpers\Subscription
     */
    protected $subscriptionHelper;

    /**
     * Paypal object
     *
     * @var \Webkul\SAASSubscription\Helpers\Paypal
     */
    // protected $paypalHelper;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASSubscription\Helpers\Subscription  $subscriptionHelper
     * @param  \Webkul\SAASSubscription\Helpers\Paypal  $paypalHelper
     * @return void
     */
    public function __construct(
        Subscription $subscriptionHelper
        // Paypal $paypalHelper
    )
    {
        $this->subscriptionHelper = $subscriptionHelper;

        // $this->paypalHelper = $paypalHelper;

        $this->_config = request('_config');
    }

    /**
     * Payment review controller action
     *
     * @return \Illuminate\Http\Response
     */
    public function review()
    {
        
    }

    /**
     * Payment cancel controller action
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        session()->flash('warning', trans('saassubscription::app.super-user.plans.payment-cancel'));

        return redirect()->route($this->_config['redirect']);
    }

    /**
     * This action is responsible for praparing the SetExpressCheckout paypal method
     * 
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
        
    }

    /**
     * This action is responsible for creating paypal recurring profile if success
     * 
     * @return \Illuminate\Http\Response
     */
    public function createProfile()
    {
        
    }
}