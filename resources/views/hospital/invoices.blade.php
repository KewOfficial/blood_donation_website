@extends('layouts.hospital')

@section('title', 'Invoices')

@section('content')
<div class="container">
    <h1>Invoices</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>${{ $invoice->total_amount }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{ $invoice->created_at }}</td>
                    <td>
                        <a href="{{ route('hospital.invoice.details', $invoice->id) }}" class="btn btn-primary">View Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
