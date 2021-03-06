<?php

return [
    'super-user' => [
        'layouts' => [
            'left-menu' => [
                'subscription' => 'Subscription',
                'plans' => 'Plans',
                'purchased-plans' => 'Purchased Plans',
                'invoices' => 'Invoices'
            ]
        ],

        'datagrid' => [
            'id' => 'Id',
            'code' => 'Code',
            'name' => 'Name',
            'monthly-amount' => 'Monthly Amount',
            'yearly-amount' => 'Yearly Amount',
            'status' => 'Status',
            'active' => 'Active',
            'inactive' => 'Inactive',
            'edit' => 'Edit',
            'delete' => 'Delete',
            'view' => 'View',
            'customer-email' => 'Customer Email',
            'customer-name' => 'Customer Name',
            'total' => 'Total',
            'expired-on' => 'Expired On',
            'created-at' => 'Created At',
            'company-name' => 'Company Name',
            'plan-name' => 'Plan',
            'amount' => 'Amount',
            'period-unit' => 'Period Unit',
            'profile-state' => 'Profile State',
        ],

        'config' => [
            'system' => [
                'subscription' => 'Subscription',
                'payment' => 'Payment',
                'general' => 'General',
                'allow-trial' => 'Allow Trial',
                'trial-days' => 'Trial Days',
                'trial-plan' => 'Trial Plan',
                'paypal' => 'Paypal Setting',
                'sandbox-mode' => 'Sandbox Mode',
                'merchant-paypal-id' => 'Merchant Paypal Id',
                'user-name' => 'User Name',
                'password' => 'Password',
                'signature' => 'Signature',
            ]
        ],

        'plans' => [
            'title' => 'Subscription Plans',
            'add-title' => 'Add Plan',
            'edit-title' => 'Edit Plan',
            'create-success' => 'Plan created successfully.',
            'update-success' => 'Plan updateed successfully.',
            'delete-success' => 'Plan deleted successfully.',
            'save-btn-title' => 'Save Plan',
            'general' => 'General',
            'code' => 'Code',
            'name' => 'Name',
            'description' => 'Description',
            'billing-amount' => 'Billing Amount',
            'monthly-amount' => 'Monthly Amount',
            'yearly-amount' => 'Yearly Amount (Month by Month)',
            'plan-limitation' => 'Plan Limitation',
            'allowed-products' => 'Allowed Products [0 =  Unlimited]',
            'allowed-categories' => 'Allowed Categories [0 =  Unlimited]',
            'allowed-attributes' => 'Allowed Attributes [0 =  Unlimited]',
            'allowed-attribute-families' => 'Allowed Attribute Families [0 =  Unlimited]',
            'allowed-channels' => 'Allowed Channels [0 =  Unlimited]',
            'allowed-orders' => 'Allowed Orders [0 =  Unlimited]',
            'name-too-long-error' => 'Subscriber name is too long.',
            'description-too-long-error' => 'Subscriber description is too long.',
            'payment-cancel' => 'You have canceled the payment.',
            'generic-error' => 'Something went wrong, please try again later.',
            'profile-created-success' => 'Recurring profile created successfully.',
            'assign-plan' => 'Assign Plan',
            'assign' => 'Assign',
            'plan' => 'Plan',
            'period-unit' => 'Period Unit',
            'month' => 'Monthly',
            'year' => 'Yearly',
            'plan-activated' => 'Plan activated successfully.',
            'plan-cancelled-message' => 'Plan cancelled successfully.',
            'general-error' => 'Something went wrong, try again later.',
            'cancel-plan' => 'Cancel Plan',
            'cancel-confirm-msg' => 'Are you sure you want to cancel this plan ?'
        ],

        'recurring-profiles' => [
            'title' => 'Purchased Plans',
            'view-title' => 'Purchased Plan #:recurring_profile_id',
        ],

        'invoices' => [
            'title' => 'Subscription Invoices',
            'add-title' => 'Add Invoice',
            'create-success' => 'Invoice created successfully.',
            'update-success' => 'Invoice updateed successfully.',
            'delete-success' => 'Invoice deleted successfully.',
            'save-btn-title' => 'Save Invoice',
            'plan' => 'Plan',
            'customer-name' => 'Customer Name',
            'view-title' => 'Invoice #:invoice_id',
            'invoice-and-account' => 'Invoice and Account',
            'invoice-info' => 'Invoice Information',
            'invoice-id' => 'Invoice Id',
            'profile-id' => 'Profile Id',
            'invoice-date' => 'Invoice Date',
            'invoice-status' => 'Invoice Status',
            'account-info' => 'Account Information',
            'customer-email' => 'Customer Email',
            'plan-info' => 'Plan Information',
            'sku' => 'SKU',
            'expiration-date' => 'Expiration Date',
            'subtotal' => 'Subtotal',
            'plan-name' => ':plan - (Trial)',
            'grand-total' => 'Grand Total',
        ]
    ],

    'admin' => [
        'layouts' => [
            'subscription' => 'Subscription',
            'overview' => 'Overview',
            'plans' => 'Plans',
            'invoices' => 'Invoices',
            'purchase-plan-heading' => 'Purchase plan to proceed',
            'purchase-plan-notification' => 'Please purchase any plan to continue using service.',
            'trial-expired-heading' => 'Your trial has expired',
            'trial-expired-notification' => 'Your trial plan has been expired on :date, Please click on the button below to choose your plan.',
            'choose-plan' => 'Choose Plan',
            'subscription-stopped-heading' => 'Your subscription has stopped',
            'subscription-stopped-notification' => 'Your subscription has been stopped on :date. Subscribe to new plan for continue your services. Please click on the button below to choose your plan.',
            'subscription-suspended-heading' => 'Your subscription has suspended',
            'subscription-suspended-notification' => 'Your subscription has been suspended because we were unable to process your payment. Please contact us to continue your services or you can subscribe to new plan.',
            'payment-due-heading' => 'Billing payment due',
            'payment-due-notification' => 'Your subscription billing payment is due. Upgrade plan, Change Plan or Contact us to continue your services.',
        ],

        'overview' => [
            'title' => 'Plan Overview',
            'plan-info' => 'Plan Information',
            'plan' => 'Plan',
            'plan-name' => ':plan - (Trial)',
            'expiration-date' => 'Expiration Date',
            'billing-amount' => 'Billing Amount',
            'billing-cycle' => 'Billing Cycle',
            'monthly' => 'Monthly',
            'annual' => 'Annual',
            'profile-id' => 'Profile Id',
            'profile-status' => 'Profile Status',
            'tin' => 'TIN',
            'next-billing-date' => 'Next Billing Date',
            'profile-state' => 'Profile State',
            'payment-status' => 'Payment Status',
            'features' => 'Features',
        ],

        'plans' => [
            'title' => 'Subscription Plans',
            'allowed-products' => ':count Product(s)',
            'allowed-categories' => ':count Category(s)',
            'allowed-attributes' => ':count Attribute(s)',
            'allowed-attribute-families' => ':count Attribute Family(s)',
            'allowed-channels' => ':count Channel(s)',
            'allowed-orders' => ':count Order(s)',
            'purchase' => 'Purchase',
            'plan-description' => 'Charged per year when billed Annualy or :amount Month to Month',
            'product-left-notification' => ':remaining products left out of :purchased, upgrade your plan for more products.',
            'category-left-notification' => ':remaining categories left out of :purchased, upgrade your plan for more categories.',
            'attribute-left-notification' => ':remaining attributes left out of :purchased, upgrade your plan for more attributes.',
            'attribute-family-left-notification' => ':remaining attribute families left out of :purchased, upgrade your plan for more attribute families.',
            'channel-left-notification' => ':remaining channels left out of :purchased, upgrade your plan for more channels.',
            'order-left-notification' => ':remaining orders left out of :purchased, upgrade your plan for more orderss.',
            'resource-limit-error' => 'This plan only allows :allowed :entity_name, you have already created :used :entity_name.',
            'free-plan-activated' => 'Free plan activated successfully.',
            'products' => 'Products',
            'categories' => 'Categories',
            'attributes' => 'Attributes',
            'attribute_families' => 'Attribute Families',
            'channels' => 'Channels',
            'orders' => 'Orders',
        ],

        'checkout' => [
            'title' => 'Checkout',
            'billing-address' => 'Billing Address',
            'tin' => 'TIN',
            'first-name' => 'First Name',
            'last-name' => 'Last Name',
            'email' => 'Email',
            'address1' => 'Address 1',
            'address2' => 'Address 2',
            'city' => 'City',
            'postcode' => 'Postcode',
            'state' => 'State',
            'select-state' => 'Select state/region',
            'country' => 'Country',
            'payment-information' => 'Payment Information',
            'summary' => 'Summary',
            'billing-cycle' => 'Billing Cycle',
            'month' => 'Month',
            'year' => 'Year',
            'annual' => 'Annual',
            'plan' => 'Plan',
            'subtotal' => 'Subtotal (Including Taxes)',
            'plan-option-label' => ':plan - :amount Per Month'
        ],

        'invoices' => [
            'title' => 'Invoices',
            'id' => 'Id',
            'plan' => 'Plan',
            'customer-name' => 'Customer Name',
            'total' => 'Total',
            'status' => 'Status',
            'date' => 'Purchased On',
            'action' => 'Action',
            'view-title' => 'Invoice #:invoice_id',
            'invoice-and-account' => 'Invoice and Account',
            'invoice-info' => 'Invoice Information',
            'invoice-id' => 'Invoice Id',
            'profile-id' => 'Profile Id',
            'invoice-date' => 'Invoice Date',
            'invoice-status' => 'Invoice Status',
            'account-info' => 'Account Information',
            'customer-email' => 'Customer Email',
            'plan-info' => 'Plan Information',
            'sku' => 'SKU',
            'expiration-date' => 'Expiration Date',
            'subtotal' => 'Subtotal',
            'plan-name' => ':plan - (Trial)',
            'grand-total' => 'Grand Total',
        ]
    ]
];