<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RewardTier;
use App\Models\Reward;
use App\Models\Donor;
use App\Models\DonorReward;

class RewardManagementController extends Controller
{
    public function index()
    {
        
        $rewardTiers = RewardTier::all();
    
        
        $rewards = Reward::all();
    
        
        $donors = Donor::all();
    
     
        $donorRewards = DonorReward::all();
    
        
        $redeemedRewards = DonorReward::whereNotNull('claimed_at')->get();
    
        return view('blood.donor_management.reward_management', compact('rewardTiers', 'rewards', 'donors', 'donorRewards', 'redeemedRewards'));
    }

    public function updateLifelinePoints(Request $request)
    {
        
        $validated = $request->validate([
            'donor_id' => 'required|exists:donors,id',
            'total_donations' => 'required|integer|min:1',
        ]);

       
        $donor = Donor::findOrFail($validated['donor_id']);

        // Calculate the tier and points to add based on total donations
        $totalDonations = $validated['total_donations'];
        $tier = $this->getTier($totalDonations);
        $pointsToAdd = $this->calculatePointsToAdd($tier);

        // Update the donor's total points
        $donor->total_points += $pointsToAdd;
        $donor->save();

        // Redirect back to the reward management page with a success message
        return redirect()->route('reward_management.index')->with('success', 'Points updated successfully for donor ID ' . $donor->id);
    }

    // Helper method to determine the tier based on total donations
    private function getTier($totalDonations)
    {
        if ($totalDonations >= 10) {
            return 'Gold';
        } elseif ($totalDonations >= 5) {
            return 'Silver';
        } else {
            return 'Bronze';
        }
    }

    // Helper method to calculate points to add based on tier
    private function calculatePointsToAdd($tier)
    {
        switch ($tier) {
            case 'Gold':
                return 100;
            case 'Silver':
                return 50;
            case 'Bronze':
            default:
                return 10;
        }
    }

    public function redemptionTracking()
    {
        // Retrieve redeemed rewards
        $redeemedRewards = DonorReward::with(['donor', 'reward'])
                            ->whereNotNull('claimed_at')
                            ->orderBy('claimed_at', 'desc')
                            ->get();

        return view('reward.redemption_tracking', compact('redeemedRewards'));
    }
    public function storeTier(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'benefits' => 'required|string',
        'criteria' => 'required|string',
    ]);

    // Create a new RewardTier instance
    $rewardTier = new RewardTier();
    $rewardTier->name = $validatedData['name'];
    $rewardTier->benefits = $validatedData['benefits'];
    $rewardTier->criteria = $validatedData['criteria'];
    $rewardTier->save();
    return redirect()->route('reward_management.index')->with('success', 'Reward tier added successfully.');
}
public function destroyTier($id)
{
    $rewardTier = RewardTier::find($id);

    if ($rewardTier) {
        $rewardTier->delete();
        return redirect()->route('reward_management.index')->with('success', 'Reward tier deleted successfully.');
    } else {
        return redirect()->route('reward_management.index')->with('error', 'Reward tier not found.');
    }
}
public function updateTier(Request $request, $id)
{
    $tier = RewardTier::findOrFail($id);
    $tier->name = $request->input('name');
    $tier->benefits = $request->input('benefits');
    $tier->criteria = $request->input('criteria');
    $tier->save();

    return redirect()->route('reward_management.index')->with('success', 'Reward tier updated successfully');
}




}
