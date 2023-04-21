<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'tag_id',
    ];
}
