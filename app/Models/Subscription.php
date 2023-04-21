<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'user_id', 'deal_provider_id', 'payment_at', 'billing_cycle_count', 'billing_cycle_type',
        'price', 'currency_id', 'folder', 'refund_days', 'expired_at', 'payment_method_id',
        'support_email', 'deal_url', 'product_id'
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function dealProvider()
    {
        return $this->belongsTo(DealProvider::class);
    }
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
