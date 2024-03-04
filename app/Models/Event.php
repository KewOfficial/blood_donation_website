<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'date',
        'time',
        'location',
      
    ];
    public function scopeUpcoming($query)
    {
        return $query->where('date', '>', now());
    }
}
