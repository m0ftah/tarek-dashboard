<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'language',
        'value',
        'group',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope for active translations
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for specific language
    public function scopeLanguage($query, $language)
    {
        return $query->where('language', $language);
    }

    // Scope for specific group
    public function scopeGroup($query, $group)
    {
        return $query->where('group', $group);
    }

    // Static method to get translation
    public static function get($key, $language = 'en', $default = null)
    {
        $translation = static::where('key', $key)
            ->where('language', $language)
            ->where('is_active', true)
            ->first();
        
        return $translation ? $translation->value : $default;
    }
}