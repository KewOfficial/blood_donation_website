<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BloodBankDonor extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'blood_type', 'phone', 'donation_date'];

    /**
     * Get the donations for the blood bank donor.
     */
    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }
}
