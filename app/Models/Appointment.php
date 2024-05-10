<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'donor_id',
        'appointment_datetime',
        'status',
        'notes',
    ];

    // donor relationship
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}