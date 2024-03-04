<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class DonorController extends Controller
{
    public function dashboard()
    {
        // Retrieve upcoming events from the database
        $upcomingEvents = Event::where('date', '>', now())->get();

        return view('donors.donor_dashboard', compact('upcomingEvents'));
    }
}
