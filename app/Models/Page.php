<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    const PAGE_ABOUT = 'about-us';
    const PAGE_PRIVACY = 'privacy-page';
    const PAGE_ANTISCAM = 'anti-scam';
    const PAGE_FAQS = 'faqs';
    const PAGE_TERMS = 'terms-and-conditions';
    const PAGE_COOKIE = 'cookie';
}
