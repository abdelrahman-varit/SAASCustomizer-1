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
        include __DIR__ . '/../Helpers/Helpers.php';
        //$this->loadViewsFrom(__DIR__ . '/../Resources/views', 'stripe_view');

        //$this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'customer_lang');

        //$this->loadMigrationsFrom(__DIR__ .'/../Database/Migrations');

        // $this->publishes([
        //     _DIR_ . '/../Resources/views' => resource_path('views/vendor'),
        // ]);

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

    /**
     * Merge the stripe connect's configuration with the admin panel
     */
    public function registerConfig()
    {
        
      
    }
}