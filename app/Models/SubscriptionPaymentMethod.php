<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        'payment_method_id',
    ];
}
