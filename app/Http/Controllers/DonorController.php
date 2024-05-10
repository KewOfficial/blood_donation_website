<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Appointment;
use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EarningPerformance;
use App\Models\BloodBankEvent;

class DonorController extends Controller
{
    public function dashboard()
    {
        $donor = auth()->user(); 

        // Fetch all badges available
        $allBadges = Badge::all();

        // Fetch the badges earned by the donor
        $badges = $donor->badges ?? [];

        // Fetch or create the earning performance record for the donor
        $earningPerformance = EarningPerformance::firstOrCreate(
            ['donor_id' => $donor->id],
            ['total_earned_this_month' => 0, 'year_to_date_earnings' => 0, 'average_earnings_per_donation' => 0]
        );

        // Calculate metrics
        $totalEarnedThisMonth = EarningPerformance::calculateTotalEarnedThisMonth($donor->id);
        $yearToDateEarnings = EarningPerformance::calculateYearToDateEarnings($donor->id);
        $averageEarningsPerDonation = EarningPerformance::calculateAverageEarningsPerDonation($donor->id);

        // Fetch loyalty points
        $loyaltyPoints = $donor->loyalty_points ?? 0; // Default to 0 if no points available

        // Fetch upcoming blood bank events
        $bloodBankEvents = BloodBankEvent::where('date', '>=', now())->get();

        // Pass data to the view
        return view('donors.donor_dashboard', compact('allBadges', 'badges', 'totalEarnedThisMonth', 'yearToDateEarnings', 'averageEarningsPerDonation', 'loyaltyPoints', 'bloodBankEvents'));
    }
    
private function createBadgesForUser($donor)
{
    $badgeData = [
        [
            'name' => 'Regular Donor',
            'image' => 'recognition.jpg', // Image path relative to the public directory
            'description' => 'Awarded to regular blood donors',
        ],
        [
            'name' => 'Top Donor',
            'image' => 'cash.jpg', // Image path relative to the public directory
            'description' => 'Awarded to top blood donors',
        ],
    ];

    foreach ($badgeData as $data) {
        $badge = new Badge();
        $badge->fill($data);
        $badge->donor_id = $donor->id;
        $badge->save();
    }
}
    public function scheduleAppointment()
    {
        return view('donors.schedule_appointment');
    }
    public function submitAppointment(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i', 
        ]);
        $appointment_datetime = $validated['appointment_date'] . ' ' . $validated['appointment_time'];
    
        // Create a new appointment instance
        $appointment = new Appointment();
        $appointment->donor_id = auth()->id(); 
        $appointment->appointment_datetime = $appointment_datetime;
        $appointment->status = 'pending'; 
        $appointment->notes = 'Created from web form'; 
        $appointment->save();
        return redirect()->route('donors.schedule_appointment')->with('success', 'Appointment scheduled successfully');
    }
    

    public function loyaltyProgram()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to login to access the loyalty program.');
        }

        $donor = Auth::user();
        $loyaltyPoints = $donor->loyalty_points ?? 0;
        $badges = $donor->badges ?? [];
        $progressPercentage = ($loyaltyPoints > 0) ? ($loyaltyPoints / 1000) * 100 : 0; 

        return view('donors.donor_loyalty_program', compact('loyaltyPoints', 'badges', 'progressPercentage'));
    }

    public function viewActivities()
    {
        return view('donors.view_activities');
    }

    public function viewRewards()
    {
        return view('donors.view_rewards');
    }
    public function convertPointsToBadges()
    {
        // Fetch the authenticated donor along with related data
        $donor = auth()->user();
    
        // Ensure that the donor exists
        if (!$donor) {
            return redirect()->route('donors.loyalty_program')->with('error', 'Failed to convert points to badges. Donor not found.');
        }
    
        // Check the current loyalty points of the donor
        $loyaltyPoints = $donor->loyalty_points ?? 0;
    
        // Define the logic to convert loyalty points to badges
        // For example, you can award a badge for every 100 loyalty points
        $badgeCount = floor($loyaltyPoints / 100); // Calculate the number of badges earned
    
        // Award badges based on the calculated count
        for ($i = 0; $i < $badgeCount; $i++) {
            // Create a new badge instance and save it to the donor
            $badge = new Badge();
            $badge->name = 'Loyalty Badge';
            $badge->description = 'Awarded for loyalty points redemption';
            $badge->image = 'path_to_badge_image'; // Replace with the actual path to the badge image
            $badge->donor_id = $donor->id;
            $badge->save();
        }
    
        // Reset the loyalty points of the donor after conversion
        $donor->loyalty_points = 0;
        $donor->save();
        return redirect()->route('donors.loyalty_program')->with('success', 'Points successfully converted to badges.');
    }
    
    public function claimBonus()
{
    
    $donor = auth()->user()->load('loyaltyProgram');

    if (!$donor) {
        return redirect()->route('donor.loyaltyProgram')->with('error', 'Failed to claim bonus. Donor not found.');
    }

    //bonus points
    $bonusPoints = 100;
    $donor->loyalty_points += $bonusPoints;
    $donor->save();
    return redirect()->route('donor.loyaltyProgram')->with('success', 'Bonus claimed successfully. You have earned ' . $bonusPoints . ' points!');
}
}
