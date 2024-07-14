@extends('layouts.hospital')

@section('title', 'Submit Blood Request')

@section('content_header')
    <h1>Submit Blood Request</h1>
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('hospital.blood-request.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="blood_type">Blood Type</label>
                <input type="text" id="blood_type" name="blood_type" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="urgency">Urgency</label>
                <select id="urgency" name="urgency" class="form-control" required>
                    <option value="urgent">Urgent</option>
                    <option value="routine">Routine</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display invoice information if available -->
        @if(isset($bloodRequest) && $bloodRequest->invoice)
            <h2>Invoice Details</h2>
            <p>Invoice Number: {{ $bloodRequest->invoice->invoice_number }}</p>
            <p>Total Amount: ${{ $bloodRequest->invoice->total_amount }}</p>
        @endif
    </div>
@endsection
