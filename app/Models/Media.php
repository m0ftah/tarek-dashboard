<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'original_name',
        'path',
        'mime_type',
        'size',
        'type',
        'alt_text',
        'mediable_type',
        'mediable_id'
    ];

    // Polymorphic relationship
    public function mediable()
    {
        return $this->morphTo();
    }

    // Scope for images
    public function scopeImages($query)
    {
        return $query->where('type', 'image');
    }

    // Scope for videos
    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    // Get full URL
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }
}