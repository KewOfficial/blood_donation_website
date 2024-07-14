@extends('layouts.adminltee')

@section('content')
<div class="container">
    <h1>Payments</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Hospital</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->invoice->invoice_number }}</td>
                    <td>{{ $payment->hospital->name }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payment_method }}</td>
                    <td>{{ $payment->status }}</td>
                    <td>{{ $payment->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
