<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HealthCheckupVoucher extends Model
{
    use HasFactory;

    protected $fillable = ['donor_id', 'voucher_code', 'discount'];

    public function donor(): BelongsTo
    {
        return $this->belongsTo(Donor::class);
    }
}
