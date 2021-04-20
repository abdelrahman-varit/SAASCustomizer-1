<?php

namespace BuyNoir\StripeConnect\Models;


use Illuminate\Database\Eloquent\Model;
use Webkul\StripeConnect\Contracts\StripeConnect as StripeConnectContract;
use Webkul\StripeConnect\Models\StripeConnect as StripeConnectModel;
use Company;

class StripeConnect extends StripeConnectModel
{
    protected $table = 'stripe_plan_cart';

    protected $fillable = [
        'access_token', 'refresh_token', 'stripe_publishable_key', 'stripe_user_id', 'company_id'
    ];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        $company = Company::getCurrent();

        if (auth()->guard('super-admin')->check() || ! isset($company->id)) {
            return new \Illuminate\Database\Eloquent\Builder($query);
        } else {
            return new \Illuminate\Database\Eloquent\Builder($query->where('stripe_companies' . '.company_id', $company->id));
        }
    }
}