<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaasAgencyProduct extends Model
{
    use HasFactory;

    protected $fillable = ['saas_agency_id', 'product_id'];

    public function sassAgency()
    {
        return $this->belongsTo(SaasAgency::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
