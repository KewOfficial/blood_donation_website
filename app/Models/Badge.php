<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'donor_id', 
    ];

    protected static function boot()
    {
        parent::boot();

        // Add a saving event listener
        static::saving(function ($badge) {
            // Modify the image path to be relative to the public directory
            $badge->image = 'images/badges/' . $badge->image;
        });
    }

    // Define relationships if needed
}
