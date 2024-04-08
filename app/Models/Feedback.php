<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'donor_id',
        'event_id',
        'feedback_text',
        'rating',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
