<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'donor_id', 
        'message', 
        'is_read'
    ];

    public function user()
    {
        return $this->belongsTo(Donor::class);
    }
}
