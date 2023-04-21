<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequirementAlternativeTo extends Model
{
    use HasFactory;
    protected $fillable = ['requirement_id', 'alternative_to_id'];

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }

    public function alternativeTo()
    {
        return $this->belongsTo(AlternativeTo::class);
    }
}
