<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function listUpcomingEvents()
    {
        $upcomingEvents = Event::where('date', '>', now())->get();

        return view('donors.list_upcoming_events', compact('upcomingEvents'));
    }

    public function eventDetails($id)
    {
        
        $event = Event::find($id);

        return view('donors.event_details', compact('event'));
    }

    public function registrationParticipation()
    {
       

        return view('donors.registration_participation');
    }

    public function countdownTimer($id)
    {
       
        $event = Event::find($id);

        return view('donors.countdown_timer', compact('event'));
    }
}
