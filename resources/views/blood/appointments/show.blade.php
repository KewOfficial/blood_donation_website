@extends('layouts.adminlte')

@section('title', 'Appointment Details')

@section('content_header')
    <h1>Appointment Details</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $appointment->id }}</p>
            <p><strong>Donor Name:</strong> {{ $appointment->donor->full_name }}</p>
            <p><strong>Date:</strong> {{ $appointment->appointment_datetime->format('Y-m-d') }}</p>
            <p><strong>Time:</strong> {{ $appointment->appointment_datetime->format('H:i A') }}</p>
            <!-- Add more details as needed -->
        </div>
    </div>
@stop
