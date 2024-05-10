<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRecord extends Model
{
    protected $fillable = [
        'donor_id',
        'quantity_donated',
        'donation_date',
        'event_id',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function bloodBankEvent()
    {
        return $this->belongsTo(BloodBankEvent::class, 'event_id');
    }

    public function donorEvent()
    {
        return $this->belongsTo(DonorEvent::class, 'event_id');
    }
}
