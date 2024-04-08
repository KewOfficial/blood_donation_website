<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'donor_id',
        'event_id',
        'type',
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
