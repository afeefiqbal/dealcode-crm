<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFbGroup extends Model
{
    protected $fillable = [
        'user_id',
        'link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
