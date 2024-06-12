@extends('layouts.adminlte')

@section('title', 'Donor Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <!-- Welcome Section -->
    <div class="col-md-12 mb-4">
        <div class="card bg-primary text-white rounded">
            <div class="card-body">
                <h2>Welcome back, {{ Auth::guard('donor')->user()->name }}!</h2>
                <p>You've potentially saved <span id="livesSavedCounter">0</span> lives through your donations.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Donor Profile Section -->
    <div class="col-md-12 mb-4">
        <div class="card rounded">
            <div class="card-header bg-info text-white">
                <h3 class="card-title">Donor Profile</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('schedule_appointment') }}" class="btn btn-info">Schedule Appointment</a>
                @if ($donorInformation['tier'] === 'Bronze' || $donorInformation['tier'] === 'Silver' || $donorInformation['tier'] === 'Gold')
                    <a href="{{ route('claim_reward') }}" class="btn btn-success">Claim Reward</a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Notifications Section -->
    <div class="col-md-12 mb-4">
        <div class="card rounded">
            <div class="card-header bg-warning text-white">
                <h3 class="card-title">Notifications</h3>
            </div>
            <div class="card-body">
                @if($notifications->isEmpty())
                    <p>No new notifications.</p>
                @else
                    <ul class="list-group">
                        @foreach($notifications as $notification)
                            <li class="list-group-item {{ $notification->is_read ? 'list-group-item-light' : 'list-group-item-info' }}">
                                {{ $notification->message }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Appointments Section -->
    <div class="col-md-12 mb-4">
        <div class="card rounded">
            <div class="card-header bg-success text-white">
                <h3 class="card-title">Your Appointments</h3>
            </div>
            <div class="card-body">
                @if($appointments->isEmpty())
                    <p>No upcoming appointments.</p>
                @else
                    <ul class="list-group">
                        @foreach($appointments as $appointment)
                            <li class="list-group-item">
                                <strong>Date:</strong> {{ $appointment->appointment_date }}<br>
                                <strong>Time:</strong> {{ $appointment->appointment_time }}<br>
                                <strong>Status:</strong> {{ $appointment->status ?? 'Pending' }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
