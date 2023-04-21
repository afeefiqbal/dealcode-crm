<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaasAgencyCategory extends Model
{
    use HasFactory;

    protected $fillable = ['saas_agency_id', 'category_id'];

    public function sassAgency()
    {
        return $this->belongsTo(SaasAgency::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
