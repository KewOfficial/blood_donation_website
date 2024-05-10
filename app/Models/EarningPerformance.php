<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EarningPerformance extends Model
{
    protected $fillable = [
        'donor_id',
        'total_earned_this_month',
        'year_to_date_earnings',
        'average_earnings_per_donation',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    /**
    
     */
    public static function calculateTotalEarnedThisMonth($donorId)
    {
       
        return DonationRecord::where('donor_id', $donorId)
            ->whereMonth('donation_date', now()->month)
            ->sum('quantity_donated'); 
    }

    /**
     * Calculate the year-to-date earnings for a donor.
     */
    public static function calculateYearToDateEarnings($donorId)
    {
        return DonationRecord::where('donor_id', $donorId)
            ->whereYear('donation_date', now()->year)
            ->sum('quantity_donated'); 
    }

    /**
     *
     */
    public static function calculateAverageEarningsPerDonation($donorId)
    {
        $donationsCount = DonationRecord::where('donor_id', $donorId)->count();
        if ($donationsCount > 0) {
            $totalEarnings = DonationRecord::where('donor_id', $donorId)->sum('quantity_donated'); // Assuming quantity_donated represents earnings
            return $totalEarnings / $donationsCount;
        } else {
            return 0;
        }
    }
}
