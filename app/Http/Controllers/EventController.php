<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodBankEvent;

class EventController extends Controller
{
    public function listUpcomingEvents()
    {
        // Fetch upcoming events from the database
        $upcomingEvents = BloodBankEvent::where('date', '>=', now())->get();
    
        // Pass the upcoming events to the view
        return view('donors.upcoming_events', compact('upcomingEvents'));
    }
    
}
