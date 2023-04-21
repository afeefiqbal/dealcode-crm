<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReports extends Model
{
    use HasFactory;

    public function product_listing()
    {
        return $this->belongsTo(ProductListing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report_type()
    {
        return $this->belongsTo(ReportType::class);
    }
}
