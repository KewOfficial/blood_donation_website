<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\BloodBankEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    public function dashboard()
    {
        $donor = auth()->user();

        $donorInformation = [
            'name' => $donor->full_name,
            'email' => $donor->email,
            'phone' => $donor->phone,
            'blood_type' => $donor->blood_type,
            'tier' => $this->calculateTier($donor->total_points),
        ];

        $appointments = Appointment::where('donor_id', $donor->id)
            ->whereDate('appointment_date', '>=', now())
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->get();

        // Fetch blood bank events
        $bloodBankEvents = BloodBankEvent::where('date', '>=', now())->get();

        return view('donors.donor_dashboard', compact('appointments', 'donorInformation', 'bloodBankEvents'));
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
    $validatedData = $request->validate([
        'appointment_date' => 'required|date',
        'appointment_time' => 'required',
    ]);

    // Get the authenticated donor's ID
    $donorId = auth()->user()->id;

    Appointment::create([
        'donor_id' => $donorId,
        'appointment_date' => $validatedData['appointment_date'],
        'appointment_time' => $validatedData['appointment_time'],
    ]);

    return redirect()->route('donor.dashboard')->with('success', 'Appointment scheduled successfully');
}

}
