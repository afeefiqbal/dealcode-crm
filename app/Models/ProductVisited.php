<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVisited extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ip',
        'product_listing_id',
    ];
}
