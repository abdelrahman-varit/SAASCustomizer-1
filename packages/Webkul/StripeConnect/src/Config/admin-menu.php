<?php

return [
    [
        'key' => 'payments',
        'name' => 'Payments',
        'route' => 'admin.stripe.seller',
        'sort' => 6,
        'icon-class' => 'stripe-icon',
    ],
    [
        'key' => 'payments.stripe',
        'name' => 'Stripe',
        'route' => 'admin.configuration.paymentmethod-stripe',
        'sort' => 1,
        'icon-class' => '',
    ],
    [
        'key' => 'payments.paypal',
        'name' => 'Paypal',
        'route' =>  'admin.configuration.paymentmethod-paypal',
        'sort' => 12,
        'icon-class' => '',
    ],
    [
        'key' => 'payments.paymentmethod',
        'name' => 'Payment Method',
        'route' =>  'admin.configuration.paymentmethod-paymentmethod',
        'sort' => 12,
        'icon-class' => '',
    ]
];