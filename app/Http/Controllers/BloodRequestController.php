<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodRequest;
use App\Models\Invoice;

class BloodRequestController extends Controller
{
    public function create()
    {
        return view('blood.blood_requests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hospital_id' => 'required|exists:hospitals,id',
            'blood_type' => 'required|string',
            'quantity' => 'required|integer',
            'urgency' => 'required|string',
        ]);

        $bloodRequest = BloodRequest::create([
            'hospital_id' => $request->hospital_id,
            'blood_type' => $request->blood_type,
            'quantity' => $request->quantity,
            'urgency' => $request->urgency,
            'status' => 'pending',
        ]);

        // Generate Invoice
        $pricePerUnit = 100; 
        $invoice = Invoice::create([
            'blood_request_id' => $bloodRequest->id,
            'amount' => $bloodRequest->quantity * $pricePerUnit,
        ]);

        return redirect()->route('payments.show', $invoice->id)->with('success', 'Blood request submitted successfully');
    }
    public function fulfill(Request $request, BloodRequest $bloodRequest)
{
    $bloodRequest->update(['status' => 'fulfilled']);
   
}

}
