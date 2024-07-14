<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodRequest;
use App\Models\BloodUnit;
use App\Models\Invoice;

class HospitalDashboardController extends Controller
{
    public function index()
    {
       
        $bloodRequests = BloodRequest::where('hospital_id', auth()->id())->get();
        $invoices = Invoice::where('hospital_id', auth()->id())->get();
        $bloodUnits = BloodUnit::all(); 

        return view('hospital.dashboard', compact('bloodRequests', 'invoices', 'bloodUnits'));
    }
    public function showInvoices()
    {
        $invoices = Invoice::where('hospital_id', auth()->id())->get();
        return view('hospital.invoices', compact('invoices'));
    }


    /**
     * Show the form for creating a new blood request.
     *
     * @return \Illuminate\View\View
     */
    public function showBloodRequestForm()
    {
        return view('hospital.create_blood_request');
    }

    /**
     * Store a newly created blood request in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeBloodRequest(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'blood_type' => 'required|string',
            'quantity' => 'required|integer',
            'urgency' => 'required|string',
        ]);

        // Create a new blood request
        $bloodRequest = BloodRequest::create([
            'blood_type' => $validated['blood_type'],
            'quantity' => $validated['quantity'],
            'urgency' => $validated['urgency'],
            'status' => 'pending',
            'hospital_id' => $request->hospital()->id, 
        ]);

        // Calculate total cost (example calculation, adjust as per your logic)
        $totalCost = $bloodRequest->quantity * 100;

        // Create a new invoice for this blood request
        $invoice = new Invoice([
            'invoice_number' => 'INV-' . uniqid(),
            'total_amount' => $totalCost,
            'hospital_id' => $request->user()->id, 
            'blood_request_id' => $bloodRequest->id,
        ]);

        // Save the invoice related to this blood request
        $invoice->save();

        // Redirect back with success message
        return redirect()->route('hospital.blood-request')->with('success', 'Blood request submitted successfully.');
    }

    /**
     * Display the specified invoice details.
     *
     * @param  int  $invoice
     * @return \Illuminate\View\View
     */
    public function showInvoiceDetails($invoice)
    {
        $invoice = Invoice::findOrFail($invoice);

        return view('hospital.invoice_details', compact('invoice'));
    }
}
