<?php
namespace App\Http\Controllers;

use App\Models\Badge;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    public function dashboard()
    {
        // Retrieve upcoming events from the database
        $upcomingEvents = Event::where('date', '>', now())->get();

        // Retrieve donor's donation history for the table
        $donationHistory = Auth::user()->donations()->latest()->get();

        // Calculate total donations made
        $totalDonations = $donationHistory->count();

        return view('donors.donor_dashboard', compact('upcomingEvents', 'donationHistory', 'totalDonations'));
    }

    public function scheduleAppointment()
    {
        return view('donors.schedule_appointment');
    }

    public function loyaltyProgram()
{
    if (Auth::check()) {
        $user = Auth::user();
        $loyaltyPoints = $user->loyalty_points;
        $badges = $user->badges;
        $progressPercentage = 50;

        return view('donors.donor_loyalty_program', compact('loyaltyPoints', 'badges', 'progressPercentage'));
    }

    return redirect()->route('login')->with('error', 'You need to login to access the loyalty program.');
}


    public function viewActivities()
    {
        return view('donors.view_activities');
    }

    public function viewRewards()
    {
        return view('donors.view_rewards');
    }
}
