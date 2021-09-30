<?php

return [
    [
        'key'        => 'dashboard',
        'name'       => 'admin::app.layouts.dashboard',
        'route'      => 'admin.dashboard.index',
        'sort'       => 1,
        'icon-class' => 'dashboard-icon',
    ], [
        'key'        => 'sales',
        'name'       => 'admin::app.layouts.sales',
        'route'      => 'admin.sales.orders.index',
        'sort'       => 2,
        'icon-class' => 'sales-icon',
    ], [
        'key'        => 'sales.orders',
        'name'       => 'admin::app.layouts.orders',
        'route'      => 'admin.sales.orders.index',
        'sort'       => 1,
        'icon-class' => '',
    ], [
        'key'        => 'sales.shipments',
        'name'       => 'admin::app.layouts.shipments',
        'route'      => 'admin.sales.shipments.index',
        'sort'       => 2,
        'icon-class' => '',
    ], [
        'key'        => 'sales.invoices',
        'name'       => 'admin::app.layouts.invoices',
        'route'      => 'admin.sales.invoices.index',
        'sort'       => 3,
        'icon-class' => '',
    ], [
        'key'        => 'sales.refunds',
        'name'       => 'admin::app.layouts.refunds',
        'route'      => 'admin.sales.refunds.index',
        'sort'       => 4,
        'icon-class' => '',
    ], [
        'key'        => 'catalog',
        'name'       => 'admin::app.layouts.catalog',
        'route'      => 'admin.catalog.products.index',
        'sort'       => 3,
        'icon-class' => 'catalog-icon',
    ], [
        'key'        => 'catalog.products',
        'name'       => 'admin::app.layouts.products',
        'route'      => 'admin.catalog.products.index',
        'sort'       => 1,
        'icon-class' => '',
    ], [
        'key'        => 'catalog.categories',
        'name'       => 'admin::app.layouts.categories',
        'route'      => 'admin.catalog.categories.index',
        'sort'       => 2,
        'icon-class' => '',
    ], [
        'key'        => 'catalog.attributes',
        'name'       => 'admin::app.layouts.attributes',
        'route'      => 'admin.catalog.attributes.index',
        'sort'       => 3,
        'icon-class' => '',
    ], [
        'key'        => 'catalog.families',
        'name'       => 'admin::app.layouts.attribute-families',
        'route'      => 'admin.catalog.families.index',
        'sort'       => 4,
        'icon-class' => '',
    ], [
        'key'        => 'customers',
        'name'       => 'admin::app.layouts.customers',
        'route'      => 'admin.customer.index',
        'sort'       => 4,
        'icon-class' => 'customer-icon',
    ], [
        'key'        => 'customers.customers',
        'name'       => 'admin::app.layouts.customers',
        'route'      => 'admin.customer.index',
        'sort'       => 1,
        'icon-class' => '',
    ], [
        'key'        => 'customers.groups',
        'name'       => 'admin::app.layouts.groups',
        'route'      => 'admin.groups.index',
        'sort'       => 2,
        'icon-class' => '',
    ], [
        'key'        => 'customers.reviews',
        'name'       => 'admin::app.layouts.reviews',
        'route'      => 'admin.customer.review.index',
        'sort'       => 3,
        'icon-class' => '',
    ], [
        'key'        => 'customers.subscribers',
        'name'       => 'admin::app.layouts.newsletter-subscriptions',
        'route'      => 'admin.customers.subscribers.index',
        'sort'       => 4,
        'icon-class' => '',
    ], 
    [
        'key'        => 'configuration',
        'name'       => 'admin::app.layouts.configure',
        'route'      => 'admin.configuration.index',
        'sort'       => 7,
        'icon-class' => 'configuration-icon',
    ],
    [
        'key'        => 'configuration.general',
        'name'       => 'admin::app.layouts.configure',
        'route'      => 'admin.configuration.index',
        'sort'       => 1,
        'icon-class' => 'configuration-icon',
    ], 
    
    [
        'key'        => 'configuration.catalog',
        'name'       => 'admin::app.layouts.catalog',
        'route'      => 'admin.configuration.index',
        'sort'       => 5,
        'icon-class' => 'configuration-icon',
    ],
    [
        'key'        => 'configuration.customer',
        'name'       => 'admin::app.layouts.customer',
        'route'      => 'admin.configuration.index',
        'sort'       => 5,
        'icon-class' => 'configuration-icon',
    ],
    [
        'key'        => 'configuration.sales',
        'name'       => 'admin::app.layouts.sales',
        'route'      => 'admin.configuration.index',
        'sort'       => 5,
        'icon-class' => 'configuration-icon',
    ],

    [
        'key'        => 'configuration.emails',
        'name'       => 'admin::app.layouts.emails',
        'route'      => 'admin.configuration.index',
        'sort'       => 5,
        'icon-class' => 'configuration-icon',
    ],

    [
        'key'        => 'settings',
        'name'       => 'admin::app.layouts.settings',
        'route'      => 'admin.locales.index',
        'sort'       => 6,
        'icon-class' => 'settings-icon',
    ], [
        'key'        => 'settings.locales',
        'name'       => 'admin::app.layouts.locales',
        'route'      => 'admin.locales.index',
        'sort'       => 1,
        'icon-class' => '',
    ], [
        'key'        => 'settings.currencies',
        'name'       => 'admin::app.layouts.currencies',
        'route'      => 'admin.currencies.index',
        'sort'       => 2,
        'icon-class' => '',
    ], [
        'key'        => 'settings.exchange_rates',
        'name'       => 'admin::app.layouts.exchange-rates',
        'route'      => 'admin.exchange_rates.index',
        'sort'       => 3,
        'icon-class' => '',
    ], [
        'key'        => 'settings.inventory_sources',
        'name'       => 'admin::app.layouts.inventory-sources',
        'route'      => 'admin.inventory_sources.index',
        'sort'       => 4,
        'icon-class' => '',
    ], 
    
    // [
    //     'key'        => 'settings.channels',
    //     'name'       => 'admin::app.layouts.channels',
    //     'route'      => 'admin.channels.index',
    //     'sort'       => 5,
    //     'icon-class' => '',
    // ], 
    
    [
        'key'        => 'settings.users',
        'name'       => 'admin::app.layouts.users',
        'route'      => 'admin.users.index',
        'sort'       => 6,
        'icon-class' => '',
    ], [
        'key'        => 'settings.users.users',
        'name'       => 'admin::app.layouts.users',
        'route'      => 'admin.users.index',
        'sort'       => 1,
        'icon-class' => '',
    ], [
        'key'        => 'settings.users.roles',
        'name'       => 'admin::app.layouts.roles',
        'route'      => 'admin.roles.index',
        'sort'       => 2,
        'icon-class' => '',
    ], [
        'key'        => 'settings.sliders',
        'name'       => 'admin::app.layouts.sliders',
        'route'      => 'admin.sliders.index',
        'sort'       => 7,
        'icon-class' => '',
    ], [
        'key'        => 'settings.taxes',
        'name'       => 'admin::app.layouts.taxes',
        'route'      => 'admin.tax-categories.index',
        'sort'       => 8,
        'icon-class' => '',
    ], [
        'key'        => 'settings.taxes.tax-categories',
        'name'       => 'admin::app.layouts.tax-categories',
        'route'      => 'admin.tax-categories.index',
        'sort'       => 1,
        'icon-class' => '',
    ], [
        'key'        => 'settings.taxes.tax-rates',
        'name'       => 'admin::app.layouts.tax-rates',
        'route'      => 'admin.tax-rates.index',
        'sort'       => 2,
        'icon-class' => '',
    ], [
        'key'        => 'promotions',
        'name'       => 'admin::app.layouts.promotions',
        'route'      => 'admin.catalog-rules.index',
        'sort'       => 4,
        'icon-class' => 'promotion-icon',
    ], [
        'key'        => 'promotions.catalog-rules',
        'name'       => 'admin::app.promotions.catalog-rules.title',
        'route'      => 'admin.catalog-rules.index',
        'sort'       => 1,
        'icon-class' => '',
    ], [
        'key'        => 'promotions.cart-rules',
        'name'       => 'admin::app.promotions.cart-rules.title',
        'route'      => 'admin.cart-rules.index',
        'sort'       => 2,
        'icon-class' => '',
    ], [
        'key'        => 'cms',
        'name'       => 'admin::app.layouts.cms',
        'route'      => 'admin.cms.index',
        'sort'       => 5,
        'icon-class' => 'cms-icon',
    ], [
        'key'        => 'cms.pages',
        'name'       => 'admin::app.layouts.cms-pages',
        'route'      => 'admin.cms.index',
        'sort'       => 1,
        'icon-class' => '',
    ],

    [
        'key'        => 'cms.header',
        'name'       => 'velocity::app.admin.layouts.header-content',
        'route'      => 'velocity.admin.content.index',
        'sort'       => 4,
        'icon-class' => '',
    ],

    [
        'key'        => 'cms.theme',
        'name'       => 'admin::app.admin.my-shop.theme',
        'route'      => 'admin.theme.index',
        'sort'       => 1,
        'icon-class' => 'catalog-icon',
    ],

    [
        'key'        => 'my-shop',
        'name'       => 'admin::app.admin.my-shop.index',
        'route'      => 'admin.channels.index',
        'sort'       => 4,
        'icon-class' => 'catalog-icon',
    ],
    [
        'key'        => 'my-shop.meta-data',
        'name'       => 'velocity::app.admin.layouts.meta-data',
        'route'      => 'velocity.admin.meta-data',
        'sort'       => 3,
        'icon-class' => '',
    ],
    
    // [
    //     'key'        => 'my-shop.theme-selection',
    //     'name'       => 'admin::app.admin.my-shop.index',
    //     'route'      => 'admin.channels.index',
    //     'sort'       => 3,
    //     'icon-class' => 'catalog-icon',
    // ],

  

];