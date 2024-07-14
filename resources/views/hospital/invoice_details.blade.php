@extends('layouts.hospital')

@section('title', 'Invoice Details')

@section('content')
<div class="container">
    <h1>Invoice Details</h1>
    <div class="card">
        <div class="card-header">
            Invoice #{{ $invoice->invoice_number }}
        </div>
        <div class="card-body">
            <p><strong>Amount:</strong> ${{ $invoice->total_amount }}</p>
            <p><strong>Status:</strong> {{ $invoice->status }}</p>
            <p><strong>Blood Request ID:</strong> {{ $invoice->blood_request_id }}</p>
            <p><strong>Created At:</strong> {{ $invoice->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $invoice->updated_at }}</p>
        </div>
    </div>
</div>
@endsection
