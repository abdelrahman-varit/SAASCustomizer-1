<?php

namespace BuyNoir\StripeConnect\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class StripeConnectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        include __DIR__ . '/../Http/routes.php';
        include __DIR__ . '/../Http/Helpers/Helper.php';

        $this->app->concord->registerModel(
            \Webkul\StripeConnect\Contracts\StripeConnect::class, \BuyNoir\StripeConnect\Models\StripeConnect::class
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         
    }

}