<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'donor_id',
        'event_id',
        'appointment_datetime',
        'status',
        'notes',
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
