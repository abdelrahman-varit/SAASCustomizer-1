<?php 

namespace BuyNoir\SuperLandPage\Providers;

 use Illuminate\Support\ServiceProvider;
 use Illuminate\Support\Facades\Event;

 
 class SuperLandPageServiceProvider extends ServiceProvider
 {
     /**
     * Bootstrap services.
     *
     * @return void
     */
     public function boot()
     {
		  $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
          $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'superlandpage_view');
          $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'superlandpage_lang');
          $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'saas');
          $this->publishes([
            __DIR__ . '/../Resources/public/assets' => public_path('buynoir/superlandpage/assets'),
        ], 'public');

     }

     /**
     * Register services.
     *
     * @return void
     */
     public function register()
     {
        //   $this->mergeConfigFrom(dirname(__DIR__) . '/Config/menu.php', 'menu.admin');
        //   $this->mergeConfigFrom(dirname(__DIR__) . '/Config/acl.php', 'acl');
     }
 }