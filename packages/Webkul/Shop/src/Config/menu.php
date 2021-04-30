<?php

return [
    [
        'key'   => 'account',
        'icon'   => 'home',
        'name'  => 'shop::app.layouts.my-account',
        'route' =>'customer.profile.index',
        'sort'  => 1,
    ], [
        'key'   => 'account.profile',
        'icon'   => 'people',
        'name'  => 'shop::app.layouts.profile',
        'route' =>'customer.profile.index',
        'sort'  => 1,
    ], [
        'key'   => 'account.address',
        'icon'   => 'contact_mail',
        'name'  => 'shop::app.layouts.address',
        'route' =>'customer.address.index',
        'sort'  => 2,
    ], [
        'key'   => 'account.reviews',
        'icon'   => 'rate_review',
        'name'  => 'shop::app.layouts.reviews',
        'route' =>'customer.reviews.index',
        'sort'  => 3,
    ], [
        'key'   => 'account.wishlist',
        'icon'   => 'playlist_add_check',
        'name'  => 'shop::app.layouts.wishlist',
        'route' =>'customer.wishlist.index',
        'sort'  => 4,
    ], [
        'key'   => 'account.compare',
        'icon'   => 'compare',
        'name'  => 'shop::app.customer.compare.text',
        'route' =>'velocity.customer.product.compare',
        'sort'  => 5,
    ], [
        'key'   => 'account.orders',
        'icon'   => 'shopping_cart',
        'name'  => 'shop::app.layouts.orders',
        'route' =>'customer.orders.index',
        'sort'  => 6,
    ], [
        'key'   => 'account.downloadables',
        'icon'   => 'cloud_download',
        'name'  => 'shop::app.layouts.downloadable-products',
        'route' =>'customer.downloadable_products.index',
        'sort'  => 7,
    ]
];

?>