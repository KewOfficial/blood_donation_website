<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'tier_id', 
    ];

    public function tier()
    {
        return $this->belongsTo(RewardTier::class);
    }
}
