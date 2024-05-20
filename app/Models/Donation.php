<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    protected $fillable = ['donor_id', 'blood_bank_event_id', 'donation_date'];

    public function donor(): BelongsTo
    {
        return $this->belongsTo(Donor::class);
    }

    public function bloodBankEvent(): BelongsTo
    {
        return $this->belongsTo(BloodBankEvent::class);
    }
}
