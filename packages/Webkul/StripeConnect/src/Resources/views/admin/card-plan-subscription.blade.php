<?php  $cart = (Object)session()->get('subscription_cart'); ?>

@if ($cart)
    @if(request()->is('checkout/redirect/stripeplan'))
        <html>
            <head>
                <title>Stripe Payment - Buynoir</title>
                <script src="https://js.stripe.com/v3/"></script>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <link href="{{ asset('vendor/webkul/stripe/assets/css/stripe.css') }}" rel="stylesheet"/>
                <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}">
                <link rel="stylesheet" href="{{ asset('themes/default/assets/css/shop.css') }}">
                <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

                <style>
                    .spinner {
                        margin:auto;
                        top:20%;
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        margin-left: -50px;
                        margin-top: -50px;
                      }
                        .badge.badge-md {
                            padding: 13px 10px;
                        }
                </style>
            </head>

            <body>
                 <?php
                        // Set your secret key. Remember to switch to your live secret key in production.
                        // See your keys here: https://dashboard.stripe.com/apikeys
                        \Stripe\Stripe::setApiKey('sk_test_51FVW6nAo1CUCqESm1Mr7yZdWS0jyKXCGmqrCR6drUbDpbWtqRJ3uMqyJDcoboIW6TEQKQPtur3LH6yRGGn19qYHv00B7q0dhMf');

                        // The price ID passed from the front end.
                        //   $priceId = $_POST['priceId'];
                        $priceId = '{{PRICE_ID}}';

                        $session = \Stripe\Checkout\Session::create([
                        'success_url' => 'https://storebd.sellnoir.devs/success.html?session_id={CHECKOUT_SESSION_ID}',
                        'cancel_url' => 'https://example.com/canceled.html',
                        'payment_method_types' => ['card'],
                        'mode' => 'subscription',
                        'line_items' => [[
                            'price' => "price_1JBKHzAo1CUCqESmhIUHZv5v",
                            // For metered billing, do not pass quantity
                            'quantity' => 1,
                        ]],
                        ]);

                        // Redirect to the URL returned on the Checkout Session.
                        // With vanilla PHP, you can redirect with:
                        //   header("HTTP/1.1 303 See Other");
                        //   header("Location: " . $session->url);
                 ?>
                <div class="cp-spinner cp-round spinner" id="loader"> </div>
            </body>
             <script>
                var stripe = Stripe('pk_test_zl0yVr06Ox50XOoSubzVztv3006tFUiXdu');
                var session_id = "<?php echo $session['id'];?>";
                stripe.redirectToCheckout({sessionId:session_id}).then(result=>{
                    console.log(result);
                }).catch(error=>{
                    console.log(error);
                })
                $('.cp-spinner').css({'display': 'none'});
             </script>
        </html>
    @endif
@endif
