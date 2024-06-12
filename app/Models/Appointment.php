<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $fillable = [
        'donor_id',
        'appointment_date',
        'appointment_time',
        'status',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}

