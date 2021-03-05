<?php

namespace BuyNoir\StripeConnect\Http\Controllers;

use Webkul\StripeConnect\Http\Controllers\Controller;
use Webkul\Checkout\Facades\Cart;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\StripeConnect\Repositories\StripeCartRepository as StripeCart;
use Webkul\StripeConnect\Repositories\StripeRepository;
use Stripe\Stripe as Stripe;
use Webkul\StripeConnect\Helpers\Helper;
use BuyNoir\StripeConnect\Helpers\Helper as BuyNoirHelper;
use Webkul\StripeConnect\Repositories\StripeConnectRepository as StripeConnect;
use Company;

/**
 * StripeConnect Controller
 *
 * @author  Vivek Sharma <viveksh047@webkul.com> @vivek-webkul
 * @author  shaiv roy <shaiv.roy361@webkul.com>
 * @copyright 2019 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ExtendStripeConnectController extends Controller
{
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
     * Helper object
     *
     * @var object
     */
    protected $helper;
    protected $buynoir_helper;

    /**
     * Stripe Connect Repository Instance holder
    */
    protected $stripeConnect;


    protected $appName;

    /**
     * Create a new controller instance.
     *
     * @param  Webkul\Attribute\Repositories\OrderRepository  $orderRepository
     * @param  Webkul\StripeConnect\Repositories\StripeCartRepository  $stripeCart
     * @param  Webkul\StripeConnect\Repositories\StripeRepository  $stripeRepository
     * @param  Webkul\StripeConnect\Helpers\Helper  $helper
     * 
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository,
        StripeCart $stripeCart,
        stripeRepository $stripeRepository,
        Helper $helper,
        BuyNoirHelper $buynoir_helper,
        StripeConnect $stripeConnect
    )
    {
        $this->helper = $helper;
        $this->buynoir_helper = $buynoir_helper;

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


    /**
     * Collect stripe token from client side
     *
     * @return json
    */
    public function collectToken()
    {
        $company    = Company::getCurrent();
        
        $stripeConnect = $this->stripeConnect->findOneWhere([
            'company_id' => $company->id
            ]);

        if ( isset($stripeConnect->id) ) {
            $sellerUser = $stripeConnect->stripe_user_id;
            $sellerUserId = [
                'company'=>$company, 
                'sellerUser'=>$stripeConnect
            ];
        } else {
            session()->flash('warning', 'Stripe unavailable for this tenant.');

            return redirect()->route('shop.checkout.success');
        }

        $stripeId   = '';
        $payment    = $this->helper->productDetail();

        $stripeToken = $this->stripeCart->findOneWhere([
            'cart_id'   => Cart::getCart()->id,
        ])->first()->stripe_token;  

        $decodeStripeToken = json_decode($stripeToken);

        $customerId =  NULL;

        $paymentMethodId = $decodeStripeToken->attachedCustomer->id;

        $intent = $this->buynoir_helper->stripePayment($payment, $stripeId, $paymentMethodId, $customerId, $sellerUserId);

        if ( $intent ) {
            return response()->json(['client_secret' => $intent->client_secret]);
        } else {
            return response()->json(['success' => 'false'], 400);
        }
    }


}
