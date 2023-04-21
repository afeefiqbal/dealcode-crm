<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeTo extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'link',
        'hashtag'
    ];
}
