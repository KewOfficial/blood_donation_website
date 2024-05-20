<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Donor extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $fillable = ['full_name', 'email', 'phone', 'blood_type', 'password', 'unique_id', 'total_points'];

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    public function donorEvents(): HasMany
    {
        return $this->hasMany(DonorEvent::class);
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
