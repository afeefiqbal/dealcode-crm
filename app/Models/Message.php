<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = ['text', 'user_id', 'receiver_id', 'read_at', 'file', 'extension', 'file_name'];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    protected $appends = [
        'formatted_date',
        'formatted_time'
    ];

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id')->select('id', 'name', 'email', 'photo', 'created_at');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'email', 'photo', 'created_at');
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    public function getFormattedTimeAttribute()
    {
        return $this->created_at->format('h:i A');
    }

    public function receiverD(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
    
}
