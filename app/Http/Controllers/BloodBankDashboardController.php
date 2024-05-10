<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodBankEvent;

class BloodBankDashboardController extends Controller
{
    public function index()
    {
        $bloodBankEvents = BloodBankEvent::all();
        return view('blood.blood_bank_dashboard', ['bloodBankEvents' => $bloodBankEvents]);
    }
    public function viewUpcomingEvents()
    {
        $bloodBankEvents = BloodBankEvent::where('date', '>=', now())->get();
    
        return view('blood.upcoming-events')->with('bloodBankEvents', $bloodBankEvents);
    }
    
    

}
