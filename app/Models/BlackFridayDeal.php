<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlackFridayDeal extends Model
{
    use SoftDeletes, Prunable;

    protected $fillable = [
        'deal_name',
        'url',
        'from_date',
        'to_date',
        'year',
        'discount',
        'coupon_code',
        'deal_details',
        'tier_1',
        'tier_2',
        'tier_3',
    ];
}
