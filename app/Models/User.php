<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_name',
        'email',
        'password',
        'role',
        'photo',
        'website',
        'profession_id',
        'email_verified_at',
        'auth_provider',
        'auth_provider_id',
        'terms_accepted_at',
        'status',
        'last_seen_at',
    ];

    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;

    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class)->latest();
    }

    public function notifications()
    {
        return $this->hasMany(Message::class, 'receiver_id', 'id')->where('user_id', auth()->user()->id);
    }

    public function lastMessage()
    {
        return $this->hasOne(Message::class, 'receiver_id', 'id')->where('user_id', auth()->user()->id);
    }

}
