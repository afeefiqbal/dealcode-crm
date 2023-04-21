<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellerList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'fb_user_profule',
        'fb_group',
    ];
}
