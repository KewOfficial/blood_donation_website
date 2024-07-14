<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'blood_type',
        'quantity',
        'urgency',
        'status',
         'hospital_id',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
