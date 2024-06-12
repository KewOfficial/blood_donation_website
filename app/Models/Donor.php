<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donor extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $fillable = ['full_name', 'email', 'phone', 'blood_type', 'password', 'unique_id', 'total_points', 'donation_count', 'status', 'reward_tier_id'];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function donorEvents(): HasMany
    {
        return $this->hasMany(DonorEvent::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function donorRewards(): HasMany
    {
        return $this->hasMany(DonorReward::class);
    }

    public function rewardTier(): BelongsTo
    {
        return $this->belongsTo(RewardTier::class);
    }

    public function getAuthIdentifierName()
    {
        return 'email';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
