<?php

namespace BuyNoir\StripeConnect\Models;


use Illuminate\Database\Eloquent\Model;
use BuyNoir\StripeConnect\Contracts\StripePlanCart as StripePlanCartContract;
use Webkul\StripeConnect\Models\StripeConnect as StripeConnectModel;
use Company;

class StripePlanCart extends Model implements  StripePlanCartContract
{
    protected $table = 'stripe_plan_cart';

    protected $fillable = [
        'recurring_profile_id', 'stripe_token'
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