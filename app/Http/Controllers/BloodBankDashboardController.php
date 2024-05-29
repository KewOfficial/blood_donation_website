<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodBankEvent;
use App\Models\BloodUnit;
use App\Models\Donor;
use App\Models\Appointment;


class BloodBankDashboardController extends Controller
{
    public function index()
{
    // Fetch all blood bank events
    $bloodBankEvents = BloodBankEvent::all();

    // Fetch all donors
    $donors = Donor::all();

    // Fetch scheduled appointments
    $appointments = Appointment::whereDate('appointment_date', '>=', now())
                                ->orderBy('appointment_time')
                                ->get();

    // Calculate blood inventory
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

    return view('blood.blood_bank_dashboard', compact('bloodBankEvents', 'donors', 'appointments', 'totalUnits'));
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

        // Create a new BloodUnit instance and save to the database
        $bloodUnit = new BloodUnit();
        $bloodUnit->blood_type = $validatedData['bloodType'];
        $bloodUnit->rh_factor = $validatedData['rhFactor'];
        $bloodUnit->units = $validatedData['units'];
        $bloodUnit->expiry_date = $validatedData['expiryDate'];
        $bloodUnit->save();

        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'Blood unit added successfully');
    }
    private function updateLifelinePoints(Donor $donor)
    {
        // Retrieve the donor's total donations
        $totalDonations = $donor->donations->count(); 

        // Determine the tier based on the total donations
        $tier = $this->getTier($totalDonations);

        // Update the donor's Lifeline Points based on the tier
        switch ($tier) {
            case 'Bronze':
                $donor->total_points += 1; // Update points for Bronze tier
                break;
            case 'Silver':
                $donor->total_points += 2; // Update points for Silver tier
                break;
            case 'Gold':
                $donor->total_points += 3; // Update points for Gold tier
                break;
            // Add more cases for additional tiers if needed
        }

        // Save the updated donor
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

    
}
