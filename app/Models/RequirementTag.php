<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementTag extends Model
{
    use HasFactory;
    protected $fillable = ['requirement_id', 'tag_id'];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
