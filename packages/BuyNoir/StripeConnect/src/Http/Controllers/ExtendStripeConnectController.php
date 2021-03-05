<?php

namespace BuyNoir\StripeConnect\Http\Controllers;

use Webkul\StripeConnect\Http\Controllers\Controller;
use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\StripeConnect\Repositories\StripeCartRepository as StripeCart;
use Webkul\StripeConnect\Repositories\StripeRepository;
use Stripe\Stripe as Stripe;
use BuyNoir\StripeConnect\Helpers\Helpers;
use Webkul\StripeConnect\Repositories\StripeConnectRepository as StripeConnect;
use Webkul\StripeConnect\Http\Controllers\StripeConnectController as WebkulStripeConnect;
use Company;

/**
 * StripeConnect Controller
 *
 * @author  Vivek Sharma <viveksh047@webkul.com> @vivek-webkul
 * @author  shaiv roy <shaiv.roy361@webkul.com>
 * @copyright 2019 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ExtendStripeConnectController extends WebkulStripeConnect
{
    private $helpers;
    protected $cart;

    protected $order;

    /**
     * OrderRepository object
     *
     * @var array
     */
    protected $orderRepository;

    /**
     * StripeRepository object
     *
     * @var array
     */
    protected $stripeRepository;

    /**
     * To hold the Test stripe secret key
     */
    protected $stripeSecretKey = null;

    /**
     * Determine test mode
     */
    protected $testMode;

    /**
     * Determine if Stripe is active or Not
     */
    protected $active;

    /**
     * Statement descriptor string
     */
    protected $statementDescriptor;

    /**
     * Stripe Cart Repository Instance holder
     */
    protected $stripeCart;

     /**
     * InvoiceRepository object
     *
     * @var object
     */
    protected $invoiceRepository;

    /**
     * Stripe Connect Repository Instance holder
    */
    protected $stripeConnect;


    protected $appName;

    public function __construct(
        OrderRepository $orderRepository,
        StripeCart $stripeCart,
        stripeRepository $stripeRepository,
        Helpers $helpers,
        StripeConnect $stripeConnect
    )
    {
        $this->helpers = $helpers;

        $this->orderRepository = $orderRepository;

        $this->stripeRepository = $stripeRepository;

        $this->stripeCart = $stripeCart;

        $this->stripeConnect = $stripeConnect;

        if ( company()->getSuperConfigData('sales.paymentmethods.stripe.active') == 1 ) {
            $this->appName      = 'Webkul Bagisto Stripe Payment Gateway';
            $this->partner_Id   = 'pp_partner_FLJSvfbQDaJTyY';

            Stripe::setApiVersion("2019-12-03");

            Stripe::setAppInfo(
                $this->appName,
                env('APP_VERSION'),
                env('APP_URL'),
                $this->partner_Id
            );

            if ( company()->getSuperConfigData('sales.paymentmethods.stripe.mode') == 1 ) {
                $this->stripeSecretKey = company()->getSuperConfigData('sales.paymentmethods.stripe.live_secret_key');
            } else {
                $this->stripeSecretKey = company()->getSuperConfigData('sales.paymentmethods.stripe.test_secret_key');
            }

            stripe::setApiKey($this->stripeSecretKey);
        }
    }


    public function collectToken()
    {
        $company    = Company::getCurrent();
        $stripeConnect = $this->stripeConnect->findOneWhere([
            'company_id' => $company->id
            ]);
        if ( isset($stripeConnect->id) ) {
            $sellerUser = [
                'company'=>$company, 
                'sellerUser'=>$stripeConnect
            ];
            
        } else {
            session()->flash('warning', 'Stripe unavailable for this tenant.');
            return redirect()->route('shop.checkout.success');
        }

        $stripeId   = '';
        $payment    = $this->helpers->productDetail();
        $stripeToken = $this->stripeCart->findOneWhere([
            'cart_id'   => Cart::getCart()->id,
        ])->first()->stripe_token;  
        $decodeStripeToken = json_decode($stripeToken);
        $customerId =  NULL;
        $paymentMethodId = $decodeStripeToken->attachedCustomer->id;
        $intent = $this->helpers->stripePayment($payment, $stripeId, $paymentMethodId, $customerId, $sellerUser);
        // dd($intent);
        if ( $intent ) {
            return response()->json(['client_secret' => $intent->client_secret]);
        } else {
            return response()->json(['success' => 'false'], 400);
        }
    }

    
}
