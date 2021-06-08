<?php

namespace Webkul\Velocity\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Velocity\Contracts\VelocityMetadata as VelocityMetadataContract;

class VelocityMetadata extends Model implements VelocityMetadataContract
{
    protected $table = 'velocity_meta_data';

    protected $guarded = [];

    protected $fillable = [
        'locale',
        'channel',
        'sidebar_category_count',
        'header_content_count',
        'featured_product_count',
        'new_products_count',
        'home_page_content',
        'product_policy',
        'subscription_bar_content',
        'footer_left_content',
        'footer_middle_content',
        'advertisement'
    ];
 
}