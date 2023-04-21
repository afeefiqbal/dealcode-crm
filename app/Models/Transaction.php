<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{

    protected $fillable = [
        'product_listing_id',
        'purchase_price',
        'sale_price',
        'buyer_name',
        'buyer_email',
        'sold_date',
        'notes',
        'user_id',
    ];
protected $dates = ['sold_date'];
    public function productListing(): BelongsTo
    {
        return $this->belongsTo(ProductListing::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
