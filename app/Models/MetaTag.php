<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetaTag extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'referable_type',
        'referable_id',
    ];

    public function referable(){
        $this->morphOne();
    }


}
