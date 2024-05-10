<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Donor extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'blood_type',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //  appointments relationship
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function badges()
    {
        return $this->hasMany(Badge::class);
    }
}
