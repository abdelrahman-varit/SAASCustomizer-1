<?php

namespace Webkul\SAASSubscription\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Webkul\SAASSubscription\Http\Controllers\Controller;
use Webkul\SAASSubscription\Repositories\PlanRepository;
use Company;

class CheckoutController extends Controller
{
    /**
     * PlanRepository object
     *
     * @var \Webkul\SAASSubscription\Repositories\PlanRepository
     */
    protected $planRepository;

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
    public function __construct(PlanRepository $planRepository)
    {
        $this->planRepository = $planRepository;

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
        $promo_code = $company->promo_code;
        $promo_code_validate = $company->promo_code_validate;
        $promo_code_company = company()->getSuperConfigData('general.design.promo-code.promo-code');
        $base_price = $data['period_unit'] == 'month' ? $plan->monthly_amount : $plan->yearly_amount * 12;
        $price_subtotal = $base_price;
        if(!empty($promo_code) && strtolower($promo_code) == strtolower($promo_code_company) && empty($promo_code_validate)){
            $price_tenth = $base_price * 0.10;
            $price_subtotal = $base_price - $price_tenth;
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
}