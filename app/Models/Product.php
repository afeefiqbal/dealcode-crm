<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SwapnealDev\LaravelHasUuid\HasUuid;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes, HasUuid;

    protected $guarded = [];
    // protected $fillable = [
    //     'title',
    //     'category_id',
    //     'image',
    //     'description',
    // ];

    public string $uuidKey = 'uuid';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function dealProvider()
    {
        return $this->belongsTo(DealProvider::class);
    }

    public function tags()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public function productListing()
    {
        return $this->hasMany(ProductListing::class,  'product_id','id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($product) {
            $product->productListing()->delete();
        });
    }


}
