<?php

return [
    [
        'key' => 'general',
        'name' => 'saas::app.super-user.config.system.general',
        'sort' => 1,
    ],  [
        'key' => 'general.design',
        'name' => 'saas::app.super-user.config.system.design',
        'sort' => 1,
    ], [
        'key' => 'general.design.super',
        'name' => 'saas::app.super-user.config.system.admin-logo',
        'sort' => 1,
        'fields' => [
            [
                'name' => 'logo_image',
                'title' => 'saas::app.super-user.config.system.logo-image',
                'type' => 'image',
                'channel_based' => true,
                'validation' => 'mimes:jpeg,bmp,png,jpg'
            ]
        ]
    ],

    [
        'key' => 'general.design.webfont',
        'name' => 'Google Fonts',
        'sort' => 2,
        'fields' => [
            [
                'name' => 'webfont',
                'title' => 'webfont::app.webfont-api',
                'type' => 'text',
                'channel_based' => false,
                'locale_based' => false
            ]
        ]
    ],  


    [
        'key' => 'general.design.promo-code',
        'name' => 'Promo Code Settings',
        'sort' => 2,
        'fields' => [
            [
                'name' => 'promo-enable',
                'title' => 'Promo Enable',
                'type' => 'boolean',
                'channel_based' => false,
                'locale_based' => false
            ],
            [
                'name' => 'promo-code',
                'title' => 'Promo Code',
                'type' => 'text',
                'channel_based' => false,
                'locale_based' => false
            ]
        ]
    ],  


    [
        'key' => 'general.agent',
        'name' => 'saas::app.super-user.config.system.super-agent',
        'sort' => 1,
    ], [
        'key' => 'general.agent.super',
        'name' => 'saas::app.super-user.config.system.email-address',
        'sort' => 1,
        'fields' => [
            [
                'name' => 'email',
                'title' => 'saas::app.super-user.config.system.email-address',
                'type' => 'text',
                'channel_based' => true,
                'validation' => 'required|email'
            ]
        ]
    ],  [
        'key' => 'general.content',
        'name' => 'saas::app.super-user.config.system.content',
        'sort' => 2,
    ], [
        'key' => 'general.content.footer',
        'name' => 'saas::app.super-user.config.system.footer',
        'sort' => 1,
        'fields' => [
            [
                'name' => 'footer_content',
                'title' => 'saas::app.super-user.config.system.footer-content',
                'type' => 'text',
                'channel_based' => true,
                'locale_based' => true
            ], [
                'name' => 'footer_toggle',
                'title' => 'saas::app.super-user.config.system.footer-toggle',
                'type' => 'select',
                'options' => [
                    [
                        'title' => 'True',
                        'value' => 1
                    ], [
                        'title' => 'False',
                        'value' => 0
                    ]
                ],
                'locale_based' => true,
                'channel_based' => true,
            ]
        ]    
    ],  [
        'key'  => 'sales',
        'name' => 'saas::app.super-user.config.system.sales',
        'sort' => 2,
    ], [
        'key'  => 'sales.carriers',
        'name' => 'saas::app.super-user.config.system.shipping-methods',
        'sort' => 1,
    ]
];