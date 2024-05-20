<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodBankEvent;
use App\Models\BloodUnit;
use App\Models\Donor;
use App\Models\Appointment;
use App\Models\DeferralReason;

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

    public function manageInventory()
    {
        return view('blood.manage_inventory');
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

        // Return success response
        return response()->json(['message' => 'Blood unit saved successfully'], 200);
    }

    public function showAddDonorForm()
    {
        return view('blood.add_donor');
    }

    public function addDonor(Request $request)
    {
        // Validation
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:donors',
            'phone' => 'required|string',
            'blood_type' => 'required|string',
            // Add validation rules for other fields here
        ]);

        // Create and save the donor
        $donor = Donor::create($request->all());

        // Update Lifeline Points for the donor
        $this->updateLifelinePoints($donor);

        return redirect()->route('blood.bank.donors')->with('success', 'Donor added successfully');
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

    public function showAllDonors()
    {
        $donors = Donor::all();
        return view('blood.all_donors', compact('donors'));
    }

    public function showDonorDetails($id)
    {
        $donor = Donor::findOrFail($id);
        $totalDonations = $donor->donations->count();
        $estimatedTier = $this->getTier($totalDonations);
        return view('blood.donor_details', compact('donor', 'totalDonations', 'estimatedTier'));
    }

    public function searchDonors(Request $request)
    {
        $query = $request->input('query');
        $donors = Donor::where('full_name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('blood_type', 'like', "%$query%")
            ->get();
        return view('blood.search_donors', compact('donors', 'query'));
    }
}
