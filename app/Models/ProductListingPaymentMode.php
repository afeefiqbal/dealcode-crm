<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductListingPaymentMode extends Model
{
    protected $fillable = [
        'product_listing_id',
        'payment_method_id',
    ];

    public function productListing()
    {
        return $this->belongsTo(ProductListing::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
