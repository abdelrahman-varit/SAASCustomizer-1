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
        include __DIR__ . '/../Http/routes-plan-buynoir.php';
        // include __DIR__ . '/../Helpers/Helper.php';

        $this->app->concord->registerModel(
            \Webkul\StripeConnect\Contracts\StripeConnect::class, \BuyNoir\StripeConnect\Models\StripeConnect::class
        );

        $this->app->register(ModuleServiceProvider::class);

        
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
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