<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'total_amount',
        'blood_request_id',
        'hospital_id',
    ];

    public function bloodRequest()
    {
        return $this->belongsTo(BloodRequest::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

