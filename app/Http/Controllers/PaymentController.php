<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function create($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        return view('hospital.payment.create', compact('invoice'));
    }

    public function store(Request $request, $invoiceId)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        $invoice = Invoice::findOrFail($invoiceId);

        Payment::create([
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'completed', // Update based on actual payment status
            'invoice_id' => $invoice->id,
            'hospital_id' => $request->user()->id,
        ]);

        return redirect()->route('hospital.invoices')->with('success', 'Payment completed successfully.');
    }
}
