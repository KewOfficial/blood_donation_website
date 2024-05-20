<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EarningPerformance;
use App\Models\BloodBankEvent;

class DonorController extends Controller
{
    public function dashboard()
    {
        $donor = auth()->user();

        // Prepare donor information
        $donorInformation = [
            'name' => $donor->full_name,
            'email' => $donor->email,
            'phone' => $donor->phone,
            'blood_type' => $donor->blood_type,
            'tier' => $this->calculateTier($donor->total_points),
        ];

        // Fetch upcoming blood bank events
        $bloodBankEvents = BloodBankEvent::where('date', '>=', now())->get();

        // Pass data to the view
        return view('donors.donor_dashboard', compact('donorInformation', 'bloodBankEvents'));
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
}
