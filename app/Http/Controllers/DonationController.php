<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Donor;
class DonationController extends Controller
{
    public function recordBloodDonationForm()
    {
        $donors = Donor::all();
        
        return view('blood.donor_management.record_blood_donation', compact('donors'));
    }

    public function recordBloodDonation(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'donor_id' => 'required',
            'full_name' => 'required',
            'blood_type' => 'required',
            'phone' => 'required',
            'donation_date' => 'required|date',
            'number_of_donations' => 'required|integer|min:1',
        ]);

     
        $donation = Donation::create($validatedData);

       
        return redirect()->route('donation.record_form')->with('success', 'Blood donation recorded successfully!');
    }
    public function getDonorDetails(Request $request)
{
    $donor = Donor::find($request->id);
    return response()->json($donor);
}

}
