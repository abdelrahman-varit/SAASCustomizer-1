<?php

namespace BuyNoir\StripeConnect\Http\Controllers;

use Webkul\Checkout\Facades\Cart;
use Company;
use Webkul\StripeConnect\Http\Controllers\StripeConnectController as BaseController;

class StripeConnectController extends BaseController
{

    public function collectToken()
    {
        $company    = Company::getCurrent();

        $stripeConnect = $this->stripeConnect->findOneWhere([
            'company_id' => $company->id
            ]);

        if ( isset($stripeConnect->id) ) {
            $sellerUserId = $stripeConnect->stripe_user_id;

            $sellerUser = [
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

        $intent = $this->helper->stripePayment($payment, $stripeId, $paymentMethodId, $customerId, $sellerUser, $sellerUserId);

        if ( $intent ) {
            return response()->json(['client_secret' => $intent->client_secret]);
        } else {
            return response()->json(['success' => 'false'], 400);
        }
    }

    
}
