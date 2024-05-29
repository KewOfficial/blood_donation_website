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
        <div class="card">
            <div class="card-header bg-info text-white">
                <h3 class="card-title">Donor Profile</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('schedule_appointment') }}" class="btn btn-info">Schedule Appointment</a>
                <!-- Button for Reward Claim -->
                @if ($donorInformation['tier'] === 'Bronze' || $donorInformation['tier'] === 'Silver' || $donorInformation['tier'] === 'Gold')
                    <a href="{{ route('claim_reward') }}" class="btn btn-success">Claim Reward</a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Additional Content Here -->
</div>
@stop
