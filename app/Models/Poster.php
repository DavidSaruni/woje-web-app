<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active poster
     */
    public static function getActive()
    {
        return static::where('is_active', true)->first();
    }

    /**
     * Get the image URL attribute
     */
    public function getImageUrlAttribute()
    {
        return asset($this->image_path);
    }
}
