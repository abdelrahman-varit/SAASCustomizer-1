<?php
       

    
        Route::get('/en', 'BuyNoir\SuperLandPage\Http\Controllers\SuperLandPageController@index')
        ->defaults('_config', ['view' => 'superlandpage_view::superlandpage.index'])
        ->name('buynoir.home.index');
        Route::get('/privacy-policy', 'BuyNoir\SuperLandPage\Http\Controllers\SuperLandPageController@privacyPolicy')
        ->defaults('_config', ['view' => 'superlandpage_view::superlandpage.privacy-policy'])
        ->name('buynoir.home.privacypolicy');
        Route::get('/contact-us', 'BuyNoir\SuperLandPage\Http\Controllers\SuperLandPageController@contactUs')
        ->defaults('_config', ['view' => 'superlandpage_view::superlandpage.contact-us'])
        ->name('buynoir.home.contactus');

        Route::get('/cookies-more', 'BuyNoir\SuperLandPage\Http\Controllers\SuperLandPageController@cookiesMore')
        ->defaults('_config', ['view' => 'superlandpage_view::superlandpage.cookies-more'])
        ->name('buynoir.home.cookiesmore');

    Route::group(['middleware' => ['web', 'company-locale']], function () {
        

        // company registration routes
        Route::prefix('company')->group(function() {

            Route::get('/register', 'Webkul\SAASCustomizer\Http\Controllers\Company\CompanyController@create')->defaults('_config', [
                'view' => 'superlandpage_view::superlandpage.registration'
            ])->name('company.create.index');
            Route::get('/signin', 'Webkul\SAASCustomizer\Http\Controllers\Company\CompanyController@create')->defaults('_config', [
                'view' => 'superlandpage_view::superlandpage.signin'
            ])->name('buynoir.signin.index');

            //Store front home
            // Route::get('/landingpage', 'BuyNoir\LandingPage\Http\Controllers\LandingPageController@index')
            //         ->defaults('_config', [
            //                     'view' => 'landingpage_view::landingpage.index'
            //                 ])->name('buynoir.landingpage.index');
    
          });
    });

