<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorEvent extends Model
{
    protected $fillable = ['name', 'date', 'event_time', 'location', 'blood_bank_event_id'];

    public function bloodBankEvent()
    {
        return $this->belongsTo(BloodBankEvent::class);
    }
}

