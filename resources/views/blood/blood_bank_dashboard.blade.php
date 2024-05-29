@extends('layouts.adminltee')

@section('title', 'Blood Bank Management')

@section('content_header')
    <div class="jumbotron jumbotron-fluid bg-primary text-white">
        <div class="container">
            <h1 class="display-4">Blood Bank Management</h1>
            <p class="lead">Efficiently manage all blood-related activities in here.</p>
        </div>
    </div>
@stop

@section('content')
    <!-- Dashboard Overview -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-4">
            <!-- Key Metrics and Alerts -->
            <div class="card bg-gradient-primary text-white mb-4">
                <div class="card-header">
                    <h3 class="card-title">Blood Bank Activity</h3>
                </div>
                <div class="card-body">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Upcoming Events</span>
                            <span class="info-box-number">{{ $bloodBankEvents->count() }}</span>
                        </div>
                    </div>
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-tint"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Units</span>
                            <span class="info-box-number">{{ $totalUnits }}</span> <!-- Updated variable name -->
                        </div>
                    </div>
                    
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="fas fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Recent Donor Activity</span>
                            <span class="info-box-number">20 donors</span>
                        </div>
                    </div>
                    <div class="card bg-gradient-danger mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Blood Shortage Alerts</h5>
                            <p class="card-text"><i class="fas fa-exclamation-triangle"></i> Type O Negative - Urgently needed!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Column -->
        <div class="col-lg-8">
            <!-- Search Bar -->
            <div class="d-flex justify-content-end mb-4">
                <form class="form-inline" method="GET" action="{{ route('blood.bank.dashboard') }}">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            
            <!-- Scheduled Appointments -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Scheduled Appointments</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Donor Name</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->donor->full_name }}</td>
                                    <td>{{ $appointment->appointment_date }}</td>
                                    <td>{{ $appointment->appointment_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/dashboard-charts.js"></script>
@stop
