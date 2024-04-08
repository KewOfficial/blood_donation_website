<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BloodDashboardController extends Controller
{
    /**
     * Display the blood bank dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Add your logic here to fetch data or perform any necessary operations
        
        // Return the view for the blood bank dashboard
        return view('bloodbank.bloodbankdashboard');
    }
}
