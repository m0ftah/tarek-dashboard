<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'subtitle',
        'title',
        'description',
        'person_name',
        'person_description',
        'images',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'images' => 'array', // JSON cast for images array
    ];

    // Scope for active about
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}