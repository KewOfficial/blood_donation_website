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
        // Retrieving upcoming events from the database
        $upcomingEvents = Event::where('date', '>', now())->get();

        return view('donors.donor_dashboard', compact('upcomingEvents'));
    }
    public function scheduleAppointment()
    {


        return view('donors.schedule_appointment');
    }
    public function loyaltyProgram()
    {
        $loyaltyPoints = 100;
        $badges = Badge::where('user_id', Auth::id())->get();

        // Calculating progress percentage
        $progressPercentage = 50;

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

}
