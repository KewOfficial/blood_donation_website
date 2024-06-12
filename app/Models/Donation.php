<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'full_name',
        'blood_type',
        'phone',
        'donation_date',
        'number_of_donations',
        'notes',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function bloodBankEvent()
    {
        return $this->belongsTo(BloodBankEvent::class);
    }
}
