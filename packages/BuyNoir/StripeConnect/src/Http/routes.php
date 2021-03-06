<?php

 
Route::group(['middleware' => ['web', 'locale', 'theme', 'currency']], function () {
    Route::prefix('checkout')->group(function () {
 
        // Route::get('/sendtoken', 'BuyNoir\StripeConnect\Http\Controllers\ExtendStripeConnectController@collectToken')->name('stripe.get.token');



    	Route::get('/redirect/stripe', 'BuyNoir\StripeConnect\Http\Controllers\StripeConnectController@redirect')->name('stripe.standard.redirect');

        Route::post('/save/card', 'BuyNoir\StripeConnect\Http\Controllers\StripeConnectController@saveCard')->name('stripe.save.card');

        Route::get('/sendtoken', 'BuyNoir\StripeConnect\Http\Controllers\StripeConnectController@collectToken')->name('stripe.get.token');

        Route::get('/create/charge', 'BuyNoir\StripeConnect\Http\Controllers\StripeConnectController@createCharge')->name('stripe.make.payment');

        Route::get('/stripe', 'BuyNoir\StripeConnect\Http\Controllers\StripeConnectController@collectCard')->defaults('_config', [
            'view' => 'stripe_saas::checkout.card'
        ])->name('stripe.cardcollect');

        Route::get('/stripe/card/check', 'BuyNoir\StripeConnect\Http\Controllers\StripeConnectController@checkCard')->name('stripe.check.card.unique');

        Route::get('/stripe/card/delete', 'BuyNoir\StripeConnect\Http\Controllers\StripeConnectController@deleteCard')->name('stripe.delete.saved.cart');

        Route::post('/saved/card/payment', 'BuyNoir\StripeConnect\Http\Controllers\StripeConnectController@savedCardPayment')->name('stripe.saved.card.payment');

        Route::get('/payment/cancel', 'BuyNoir\StripeConnect\Http\Controllers\StripeConnectController@paymentCancel')->name('stripe.payment.cancel');


        
    });
});