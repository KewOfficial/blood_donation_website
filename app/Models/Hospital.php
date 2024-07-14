<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Hospital extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function bloodRequests()
{
    return $this->hasMany(BloodRequest::class); 
}
public function invoices()
{
    return $this->hasMany(Invoice::class, 'hospital_id');
}
}
