<?php

namespace Webkul\SAASSubscription\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Webkul\SAASSubscription\Http\Controllers\Controller;
use Webkul\SAASSubscription\Helpers\Subscription;
use Webkul\Payment\Facades\Payment;
use Webkul\Checkout\Facades\Cart;
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
        $cart = session()->get('subscription_cart');
        if(empty($cart)){

        }else{
            return redirect()->route("stripeplan.standard.redirect"); //Webkul/StripeConnect
        }
    }

    /**
     * This action is responsible for creating paypal recurring profile if success
     * 
     * @return \Illuminate\Http\Response
     */
    //  public function createProfile()
    //  {
    //      $cart = session()->get('subscription_cart');
 
    //      if (! $cart) {
    //          return redirect()->route('admin.subscription.plan.index');
    //      }
 
    //      $doEC = [
    //          'PROFILESTATUS'=>'ActiveProfile',
    //          'PROFILEID'=>'I-T2HYXXMJTS1T'
    //      ];
     
    //     //  if ($doEC['ACK'] == "Success") {
    //          $this->subscriptionHelper->createRecurringProfile($doEC);
 
    //          session()->forget('subscription_cart');
 
    //          session()->flash('success', trans('saassubscription::app.super-user.plans.profile-created-success'));
 
    //          return redirect()->route($this->_config['redirect']);
    //     //  } else {
    //     //      session()->flash('error', $doEC['L_LONGMESSAGE0']);
 
    //     //      return redirect()->route('admin.subscription.plan.index');
    //     //  }
    //  }

     public function createProfilePlan()
     {
         $cart = session()->get('subscription_cart');
   
         if (! $cart) {
             return redirect()->route('admin.subscription.plan.index');
         }
 
         $doEC = [
             'PROFILESTATUS'=>$cart['profile_status'],
             'PROFILEID'=>$cart['payment_id']
         ];
     
        if ($cart['payment_status']=="success") {
             $this->subscriptionHelper->createRecurringProfile($doEC);
 
             session()->forget('subscription_cart');
 
             session()->flash('success', trans('saassubscription::app.super-user.plans.profile-created-success'));
 
             return response()->json([
                'data' => [
                    'route' => route("admin.subscription.plan.index"),
                    'success' => true
                ]
            ]);

         } else {
             session()->flash('error', $doEC['L_LONGMESSAGE0']);
 
             return redirect()->route('admin.subscription.plan.index');
         }
     }
}