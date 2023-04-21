<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'product_name',
        'price',
        'notes',
        'tier',
        'reseller',
    ];

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
