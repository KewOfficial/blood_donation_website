<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'payment_method',
        'status',
        'invoice_id',
        'hospital_id',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
