<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodBankEvent;
use App\Models\BloodUnit;
use App\Models\Donor;
use App\Models\Appointment;
use App\Models\Donation;
use App\Models\Notification;
use App\Models\BloodRequest;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class BloodBankDashboardController extends Controller
{
    public function index()
    {
        
        $bloodBankEvents = BloodBankEvent::all();

       
        $donors = Donor::all();

       
        $appointments = Appointment::whereDate('appointment_date', '>=', now())
                                    ->orderBy('appointment_time')
                                    ->get();

       
        $bloodTypes = BloodUnit::distinct()->pluck('blood_type')->toArray();
        $rhFactors = BloodUnit::distinct()->pluck('rh_factor')->toArray();
        $bloodInventory = [];

        foreach ($bloodTypes as $bloodType) {
            $bloodInventory[$bloodType] = [];
            foreach ($rhFactors as $rhFactor) {
                $totalUnits = BloodUnit::where('blood_type', $bloodType)
                                        ->where('rh_factor', $rhFactor)
                                        ->sum('units');

                if ($totalUnits > 0) {
                    $bloodInventory[$bloodType][$rhFactor] = $totalUnits;
                }
            }
        }

        $totalUnits = collect($bloodInventory)->flatten()->sum();

        // Fetch top donors
        $topDonors = Donor::withCount('donations')
                          ->orderByDesc('donations_count')
                          ->take(4)
                          ->get();

        // Fetch blood requests with their associated hospitals
        $bloodRequests = BloodRequest::with('hospital')->latest()->get();

        return view('blood.blood_bank_dashboard', compact('bloodBankEvents', 'donors', 'appointments', 'totalUnits', 'topDonors', 'bloodRequests'));
    }
    
    public function filter(Request $request)
    {
        $status = $request->input('status');
        $urgency = $request->input('urgency');

        $bloodRequests = BloodRequest::when($status, function ($query) use ($status) {
            return $query->where('status', $status);
        })->when($urgency, function ($query) use ($urgency) {
            return $query->where('urgency', $urgency);
        })->latest()->get();

        return view('blood.blood_bank_dashboard', compact('bloodRequests'));
    }

    public function updateStatus(Request $request, BloodRequest $bloodRequest)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,fulfilled,cancelled',
        ]);

        $bloodRequest->update([
            'status' => $validatedData['status'],
        ]);

        return redirect()->back()->with('success', 'Blood request status updated successfully.');
    }

    public function viewUpcomingEvents()
    {
        $bloodBankEvents = BloodBankEvent::where('date', '>=', now())->get();

        return view('blood.upcoming-events', ['bloodBankEvents' => $bloodBankEvents]);
    }

    public function manageInventory()
    {
        $bloodTypes = BloodUnit::distinct()->pluck('blood_type')->toArray();
        $rhFactors = BloodUnit::distinct()->pluck('rh_factor')->toArray();
        $bloodInventory = [];
    
        foreach ($bloodTypes as $bloodType) {
            $bloodInventory[$bloodType] = [];
            foreach ($rhFactors as $rhFactor) {
                $totalUnits = BloodUnit::where('blood_type', $bloodType)
                                        ->where('rh_factor', $rhFactor)
                                        ->sum('units');
                if ($totalUnits > 0) {
                    $bloodInventory[$bloodType][$rhFactor] = $totalUnits;
                }
            }
        }
    
        $totalUnitsAll = collect($bloodInventory)->flatten()->sum();
        $topDonors = Donor::withCount('donations')
                      ->orderByDesc('donations_count')
                      ->take(4)
                      ->get();
    
        return view('blood.manage_inventory', compact('bloodInventory', 'totalUnitsAll'));
    }

    public function saveBloodUnit(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'bloodType' => 'required|string',
            'rhFactor' => 'required|string',
            'units' => 'required|integer',
            'expiryDate' => 'required|date',
        ]);
        $bloodUnit = new BloodUnit();
        $bloodUnit->blood_type = $validatedData['bloodType'];
        $bloodUnit->rh_factor = $validatedData['rhFactor'];
        $bloodUnit->units = $validatedData['units'];
        $bloodUnit->expiry_date = $validatedData['expiryDate'];
        $bloodUnit->save();

        return redirect()->back()->with('success', 'Blood unit added successfully');
    }

    public function listAppointments()
    {
        // Fetch all appointments
        $appointments = Appointment::with('donor')->get();

        return view('blood.donor_management.appointments_list', compact('appointments'));
    }

    public function confirmAppointment(Appointment $appointment)
    {
        $appointment->update(['status' => 'Confirmed']);
    
        $donorName = $appointment->donor->full_name;
    
        Notification::create([
            'donor_id' => $appointment->donor_id,
            'message' => "Dear $donorName, thank you for scheduling your appointment. We are pleased to inform you that your appointment on " . $appointment->appointment_date . ' at ' . $appointment->appointment_time . ' has been confirmed.',
            'is_read' => false,
        ]);
    
        return redirect()->route('appointments.list')->with('success', 'Appointment confirmed successfully.');
    }
    public function recordDonation(Request $request)
    {
        $donor = Donor::find($request->donor_id);

        if (!$donor) {
            $donor = Donor::create([
                'full_name' => $request->input('full_name'),
                'blood_type' => $request->input('blood_type'),
                'phone' => $request->input('phone'),
            ]);
        } else {
            if ($request->input('phone')) {
                $donor->phone = $request->input('phone');
                $donor->save();
            }
        }

        // Record the donation
        $donation = new Donation();
        $donation->donor_id = $donor->id;
        $donation->blood_type = $request->input('blood_type');
        $donation->phone = $request->input('phone');
        $donation->donation_date = $request->input('donation_date');
        $donation->notes = $request->input('notes');
        $donation->save();
        $donor->increment('donation_count');
        $this->updateLifelinePoints($donor);

        return redirect()->route('blood.donation.record')->with('success', 'Donation recorded successfully.');
    }

    private function updateLifelinePoints(Donor $donor)
    {
        
        $totalDonations = $donor->donations()->count();

        $tier = $this->getTier($totalDonations);
        switch ($tier) {
            case 'Bronze':
                $donor->total_points += 1;
                break;
            case 'Silver':
                $donor->total_points += 2;
                break;
            case 'Gold':
                $donor->total_points += 3;
                break;
        }
        $donor->save();
    }

    private function getTier($totalDonations)
    {
        if ($totalDonations >= 10) {
            return 'Gold';
        } elseif ($totalDonations >= 5) {
            return 'Silver';
        } else {
            return 'Bronze';
        }
    }
    public function showRecordDonationForm()
    {
        $donors = Donor::all(); 
        return view('blood.donor_management.record_blood_donation', compact('donors'));
    }
    public function showPayments()
    {
        $payments = Payment::with('invoice', 'hospital')->get();
        return view('blood.payments.index', compact('payments'));
    }
}
