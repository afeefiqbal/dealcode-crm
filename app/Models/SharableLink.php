<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharableLink extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'link', 'user_id', 'product_listing_id'];
}
