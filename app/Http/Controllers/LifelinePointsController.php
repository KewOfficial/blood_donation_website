<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Donation;
use App\Models\DonorReward;
use App\Models\HealthCheckupVoucher;
use Illuminate\Http\Request;
class LifelinePointsController extends Controller
{
    public function index()
    {
        $donor = auth()->guard('donor')->user();

        $donorInformation = [
            'name' => $donor->full_name,
            'email' => $donor->email,
            'total_points' => $donor->total_points,
            'tier' => $this->calculateTier($donor->total_points),
        ];

        $donationHistory = $donor->donations()->with('bloodBankEvent')->latest()->get();

        $availableRewards = $this->getAvailableRewards($donor->total_points);

        return view('donors.lifeline_points.index', compact('donorInformation', 'donationHistory', 'availableRewards'));
    }

    private function calculateTier($totalPoints)
    {
        if ($totalPoints >= 10) {
            return 'Gold';
        } elseif ($totalPoints >= 5) {
            return 'Silver';
        } else {
            return 'Bronze';
        }
    }

    private function getAvailableRewards($totalPoints)
    {
        $rewards = [];

        if ($totalPoints >= 2) {
            $rewards[] = 'Free basic health checkup voucher';
        }

        if ($totalPoints >= 5) {
            $rewards[] = '$20 cash reward';
        }

        if ($totalPoints >= 10) {
            $rewards[] = '$50 cash reward';
            $rewards[] = 'Discounted comprehensive health checkup voucher';
        }

        return $rewards;
    }

    public function claimReward(Request $request)
    {
        $donor = auth()->guard('donor')->user();

        $tier = $this->calculateTier($donor->total_points);

        if ($tier === 'Bronze' && $donor->total_points >= 2) {
            $this->updateRewardClaim($donor->id, 'Free basic health checkup voucher');
            $this->generateHealthCheckupVoucher($donor->id);
            $this->displayRecognitionMessage($donor->id);
        } elseif ($tier === 'Silver' && $donor->total_points >= 5) {
            $this->updateRewardClaim($donor->id, '$20 cash reward');
            $this->issueCashReward($donor->id, 20);
            $this->scheduleSocialMediaFeature($donor->id);
            $this->displayRecognitionMessage($donor->id);
        } elseif ($tier === 'Gold' && $donor->total_points >= 10) {
            $this->updateRewardClaim($donor->id, '$50 cash reward and discounted comprehensive health checkup voucher');
            $this->issueCashReward($donor->id, 50);
            $this->scheduleWebsiteFeature($donor->id);
            $this->generateDiscountedHealthCheckupVoucher($donor->id);
            $this->displayRecognitionMessage($donor->id);
        } else {
            return redirect()->back()->with('error', 'You are not eligible to claim a reward yet.');
        }

        return redirect()->route('dashboard')->with('success', 'Reward claimed successfully.');
    }

    private function updateRewardClaim($donorId, $reward)
    {
        DonorReward::create([
            'donor_id' => $donorId,
            'reward' => $reward,
            'claimed_at' => now(),
        ]);
    }

    private function generateHealthCheckupVoucher($donorId)
    {
        $uniqueCode = uniqid();
        HealthCheckupVoucher::create([
            'donor_id' => $donorId,
            'voucher_code' => $uniqueCode,
        ]);
    }

    private function displayRecognitionMessage($donorId)
    {
        // Implement logic to display a recognition message on the donor portal
    }

    private function issueCashReward($donorId, $amount)
    {
        // Implement logic to issue a cash reward to the donor
    }

    private function scheduleSocialMediaFeature($donorId)
    {
        // Implement logic to automatically generate and schedule social media posts
    }

    private function scheduleWebsiteFeature($donorId)
    {
        // Implement logic to schedule a website feature for the donor
    }

    private function generateDiscountedHealthCheckupVoucher($donorId)
    {
        $uniqueCode = uniqid();
        HealthCheckupVoucher::create([
            'donor_id' => $donorId,
            'voucher_code' => $uniqueCode,
            'discount' => 50, // Assuming a 50% discount
        ]);
    }
}


