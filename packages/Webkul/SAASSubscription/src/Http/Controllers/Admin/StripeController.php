<?php

namespace Webkul\SAASSubscription\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Webkul\SAASSubscription\Http\Controllers\Controller;
use Webkul\SAASSubscription\Helpers\Subscription;
use Webkul\Payment\Facades\Payment;
use Webkul\Checkout\Facades\Cart;
use Webkul\SAASSubscription\Repositories\RecurringProfileRepository;
use Company;
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
     * RecurringProfileRepository object
     *
     * @var \Webkul\SAASSubscription\Repositories\RecurringProfileRepository
     */
    protected $recurringProfileRepository;
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
        Subscription $subscriptionHelper,
        RecurringProfileRepository $recurringProfileRepository
        // Paypal $paypalHelper
    )
    {
        $this->subscriptionHelper = $subscriptionHelper;

        // $this->paypalHelper = $paypalHelper;

        $this->_config = request('_config');

        $this->recurringProfileRepository = $recurringProfileRepository;
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
    

     public function createProfilePlan()
     {
         $cart = session()->get('subscription_cart');
   
         if (! $cart) {
             return redirect()->route('admin.subscription.plan.index');
         }
 
        
     
        if ($cart['payment_status']=="success") {


            $company = Company::getCurrent();
            $doEC = [
                'PROFILESTATUS'=>$cart['profile_status'],
                'PROFILEID'=>$cart['payment_id'],
                'company'       => $company
            ];
             $recurringProfile = $this->subscriptionHelper->createRecurringProfile($doEC);

            $nextDueDate = $this->subscriptionHelper->getNextDueDate($recurringProfile);

            $invoice = $this->subscriptionHelper->createInvoice([
                'recurring_profile'                      => $recurringProfile,
                'saas_subscription_purchased_plan_id'    => $recurringProfile->purchased_plan->id,
                'saas_subscription_recurring_profile_id' => $recurringProfile->id,
                'grand_total'                            => $recurringProfile->amount,
                'cycle_expired_on'                       => $nextDueDate,
                'customer_email'                         => $recurringProfile->company->email,
                'customer_name'                          => $recurringProfile->company->username,
                'payment_method'                         => 'Stripe',
                'status'                                 => 'Success',
            ]);

            $this->recurringProfileRepository->update([
                'saas_subscription_invoice_id' => $invoice->id,
                'cycle_expired_on'             => $nextDueDate,
                'next_due_date'                => $nextDueDate,
            ], $recurringProfile->id);


 
             session()->forget('subscription_cart');
 
             session()->flash('success', trans('saassubscription::app.super-user.plans.profile-created-success'));
 
             return response()->json([
                'data' => [
                    'route' => route("admin.subscription.plan.index"),
                    'success' => true
                ]
            ]);

         } else {
             session()->flash('error', 'The promo code you entered is invalid!');
 
             return redirect()->route('admin.subscription.plan.index');
         }
     }
}