<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'blood_type',
        'rh_factor',
        'units',
        'expiry_date',
    ];
    protected $casts = [
        'expiry_date' => 'datetime',
    ];
}
