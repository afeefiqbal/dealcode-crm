<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductListing extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'user_id',
        'deal_type_id',
        'category_id',
        'tier_id',
        'price',
        'negotiable',
        'currency_id',
        'notes',
        'deal_url',
        'product_url',
        'additional_description',
        'approved_at',
        'status',
        'views',
        'transaction_type',
        'to_user',
        'date',
        'at_price',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dealType()
    {
        return $this->belongsTo(DealType::class);
    }

    public function dealTrend()
    {
        return $this->belongsTo(DealTrend::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsTo(Tag::class);
    }
    public function bookmark()
    {
        return $this->belongsTo(Bookmark::class, 'id', 'product_listing_id')
            ->where('user_id', auth()->user()->id ?? 0);
    }
    public function tiers()
    {
        return $this->belongsTo(Tier::class, 'tier_id');
    }
}
