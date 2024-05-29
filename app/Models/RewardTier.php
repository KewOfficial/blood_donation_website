<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardTier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'criteria',
    ];

    public function rewards()
    {
        return $this->hasMany(Reward::class);
    }
}
