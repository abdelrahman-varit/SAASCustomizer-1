<?php

namespace BuyNoir\StripeConnect\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \BuyNoir\StripeConnect\Models\StripePlanCart::class,
    ];
}