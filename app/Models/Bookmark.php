<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookmark extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_listing_id',
    ];


    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function productListing()
    {
        $this->belongsTo(ProductListing::class);
    }
}
