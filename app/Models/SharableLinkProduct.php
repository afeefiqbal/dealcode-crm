<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharableLinkProduct extends Model
{
    use HasFactory;

    protected $fillable = ['sharable_link_id', 'product_listing_id'];

    public function sharableLink()
    {
        return $this->belongsTo(SharableLink::class);
    }

    public function productListing()
    {
        return $this->belongsTo(ProductListing::class);
    }

}
