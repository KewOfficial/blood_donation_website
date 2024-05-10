<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBankEvent extends Model
{
    protected $fillable = ['name', 'date', 'event_time', 'location'];

    public function donorEvents()
    {
        return $this->hasMany(DonorEvent::class);
    }
}
