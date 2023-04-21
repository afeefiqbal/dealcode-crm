<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductListingReview extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'rating',
        'review',
        'title',
        'product_listing_id',
        'approved_at',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }


}
