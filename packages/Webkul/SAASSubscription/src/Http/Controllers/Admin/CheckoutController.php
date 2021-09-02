<?php

namespace Webkul\SAASSubscription\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Webkul\SAASSubscription\Http\Controllers\Controller;
use Webkul\SAASSubscription\Repositories\PlanRepository;
use Webkul\SAASSubscription\Helpers\Subscription;
use Webkul\SAASSubscription\Repositories\RecurringProfileRepository;
use Company;

class CheckoutController extends Controller
{
    /**
     * PlanRepository object
     *
     * @var \Webkul\SAASSubscription\Repositories\PlanRepository
     */
    protected $planRepository;

    protected $subscriptionHelper;
    
    
    protected $recurringProfileRepository;
    
    /**
     * Paypal object
     *
     * @var \Webkul\SAASSubscription\Helpers\Paypal
     */
    protected $paypalHelper;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASSubscription\Repositories\PlanRepository  $planRepository
     * @return void
     */
    public function __construct(PlanRepository $planRepository, Subscription $subscriptionHelper, RecurringProfileRepository $recurringProfileRepository)
    {
        $this->planRepository = $planRepository;
        
        $this->subscriptionHelper = $subscriptionHelper;

        $this->recurringProfileRepository = $recurringProfileRepository;

        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $plans = $this->planRepository->all();

        return view($this->_config['view'], compact('plans'));
    }

    public function indexPromo($promo_plan_id=null)
    {
        $plans = $this->planRepository->all();

        return view($this->_config['view'], compact('plans','promo_plan_id'));
    }



    /**
     * Proceed to purchase selected plan
     *
     * @return \Illuminate\Http\Response
     */
    public function purchase()
    {
        $data = request()->all();

        $plan = $this->planRepository->findOrFail(request('plan'));

        $company = Company::getCurrent();
        $promo_code_company = $company->promo_code;
        $promo_code_validate = $company->promo_code_validate;
        $promo_code_super_enable = company()->getSuperConfigData('general.design.promo-code.promo-enable');
        $promo_code_super_admin = company()->getSuperConfigData('general.design.promo-code.promo-code');
        $base_price = $data['period_unit'] == 'month' ? $plan->monthly_amount : $plan->yearly_amount * 12;
        $price_subtotal = $base_price;

        $doEC = [];
        $company = Company::getCurrent();
        $promo_code = request()->get('promo_code');
        
        if(empty($promo_code) || strtolower($promo_code) != strtolower($promo_code_super_admin) || !empty($promo_code_validate)){
            return redirect()->route('admin.subscription.checkout.index')->withErrors(['promo_code'=>'The promo code you entered is invalid!']);
        }else{
            return $this->purchasePromo($data, $plan);

        }

        
         
        $data = array_merge($data, [
            'plan'             => $plan,
            'type'             => $data['payment_method']?$data['payment_method']:'',
            'cycle_expired_on' => Carbon::now(),
            'amount'           => $price_subtotal,
        ]);

        session()->put('subscription_cart', $data);

        $payment_data = request()->all();
        $payment_method = $payment_data['payment_method'];



        if ($payment_method == 'paypal') {
            return redirect()->route('admin.subscription.paypal.start');
        }elseif ($payment_method == 'stripe') {
            return redirect()->route('admin.subscription.stripe.start');
        }

        
    }


    public function purchasePromo($data, $plan)
    {
         
        $doEC = [];
        $company = Company::getCurrent();
        $promo_code = request()->get('promo_code');
        
        
        $promo_code_validate = $company->promo_code_validate;
        $promo_code_super_admin = company()->getSuperConfigData('general.design.promo-code.promo-code');
        
        if(empty($promo_code) || strtolower($promo_code) != strtolower($promo_code_super_admin) && !empty($promo_code_validate)){
            return redirect()->route('admin.subscription.checkout.index')->withErrors(['promo_code'=>'The promo code you entered is invalid!']);
        }
        $data = array_merge($data, [
            'plan'             => $plan,
            'type'             => '',
            'period_unit'=>'infinite',
            'state'=>'Active',
            //'cycle_expired_on' => Carbon::now(),
            'amount'           => 0,
        ]);

        session()->put('subscription_cart', $data);

        $payment_data = request()->all();
        if (strtolower($promo_code) == strtolower($promo_code_super_admin)) {
 
            $doEC = [
                'PROFILESTATUS'=>'ActiveProfile',
                'PROFILEID'=>'',
                'period_unit'=>'infinite',
                'state'=>'Active',
                'company'       => $company
            ];
            
            $recurringProfile = $this->subscriptionHelper->createRecurringProfile($doEC);

            $nextDueDate = $this->subscriptionHelper->getNextDueDate($recurringProfile);

            $invoice = $this->subscriptionHelper->createInvoice([
                'recurring_profile'                      => $recurringProfile,
                'saas_subscription_purchased_plan_id'    => $recurringProfile->purchased_plan->id,
                'saas_subscription_recurring_profile_id' => $recurringProfile->id,
                'grand_total'                            => $recurringProfile->amount,
                
                'customer_email'                         => $recurringProfile->company->email,
                'customer_name'                          => $recurringProfile->company->username,
                'payment_method'                         => 'Stripe',
                'status'                                 => 'Success',
            ]);

            $this->recurringProfileRepository->update([
                'saas_subscription_invoice_id' => $invoice->id,
            ], $recurringProfile->id);


 
             session()->forget('subscription_cart');
 
             session()->flash('success', trans('saassubscription::app.super-user.plans.profile-created-success'));
 
             return redirect()->route('admin.subscription.plan.index');
         } else {
             session()->flash('error', 'The promo code you entered is invalid');
 
             return redirect()->route('admin.subscription.plan.index');
         }

        
    }

}