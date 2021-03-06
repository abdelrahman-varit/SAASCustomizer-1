<?php

return [
    'default' => 'default',

    'themes' => [
        // 'default' => [
        //     'views_path' => 'resources/themes/default/views',
        //     'assets_path' => 'public/themes/default/assets',
        //     'image_path' => '/themes/default/assets/themes/default.jpg',
        //     'name' => 'Default'
        // ],

        // 'bliss' => [
        //     'views_path' => 'resources/themes/bliss/views',
        //     'assets_path' => 'public/themes/bliss/assets',
        //     'name' => 'Bliss',
        //     'parent' => 'default'
        // ]

        // 'velocity' => [
        //     'views_path' => 'resources/themes/velocity/views',
        //     'assets_path' => 'public/themes/velocity/assets',
        //     'name' => 'Velocity',
        //     'parent' => 'default'
        // ],

        // 'buynoir-lite' => [
        //     'views_path' => 'resources/themes/buynoir-lite/views',
        //     'assets_path' => 'public/themes/buynoir-lite/assets',
        //     'name' => 'Buynoir-lite',
        //     'parent' => 'default'
        // ],

        

        'aretha-franklin' => [
            'views_path' => 'resources/themes/aretha-franklin/views',
            'assets_path' => 'public/themes/aretha-franklin/assets',
            'image_path' => '/themes/thumbnails/aretha-franklin.jpg',
            'name' => 'Aretha Franklin',
            'parent' => 'default'
        ],

        'pattie-labelle' => [
            'views_path' => 'resources/themes/pattie-labelle/views',
            'assets_path' => 'public/themes/pattie-labelle/assets',
            'image_path' => '/themes/thumbnails/pattie-labelle.jpg',
            'name' => 'Pattie LaBelle',
            'parent' => 'default'
        ],

        'toni-braxton' => [
            'views_path' => 'resources/themes/toni-braxton/views',
            'assets_path' => 'public/themes/toni-braxton/assets',
            'image_path' => '/themes/thumbnails/toni-braxton.jpg',
            'name' => 'Toni Braxton',
            'parent' => 'default'
        ],
    ],

    'admin-default' => 'buynoir-admin',

    'admin-themes' => [
        'default' => [
            'views_path' => 'resources/admin-themes/default/views',
            'assets_path' => 'public/admin-themes/default/assets',
            'name' => 'Default'
        ],
        'buynoir-admin' => [
            'views_path' => 'resources/admin-themes/buynoir-admin/views',
            'assets_path' => 'public/admin-themes/buynoir-admin/assets',
            'name' => 'buynoir-admin'
          ]
    ]
];