<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_ar',
        'tags',
        'image',
        'video_url',
        'size',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'tags' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
