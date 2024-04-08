<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $fillable = [
        'donor_id',
        'event_id',
        'status',
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
