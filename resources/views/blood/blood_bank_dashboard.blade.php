@extends('layouts.adminltee')

@section('title', 'Blood Bank Management')

@section('content_header')
    <div class="jumbotron jumbotron-fluid bg-primary text-white">
        <div class="container">
            <h1 class="display-4">Blood Bank Management</h1>
            <p class="lead">Efficiently manage all blood-related activities here.</p>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <!-- Upcoming Events Card -->
        <div class="col-lg-4">
            <div class="card bg-info text-white mb-4">
                <div class="card-header">
                    <h3 class="card-title">Upcoming Events</h3>
                </div>
                <div class="card-body">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Events</span>
                            <span class="info-box-number">{{ $bloodBankEvents->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Units Card -->
        <div class="col-lg-4">
            <div class="card bg-success text-white mb-4">
                <div class="card-header">
                    <h3 class="card-title">Total Units</h3>
                </div>
                <div class="card-body">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-tint"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Units</span>
                            <span class="info-box-number">{{ $totalUnits }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Donors Table -->
        <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header">
                    <h3 class="card-title">Top Donors</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            @foreach($topDonors as $donor)
                                <tr>
                                    <td>{{ $donor->full_name }}</td>
                                    <td><span class="badge badge-pill">{{ $donor->donations_count }} Donations</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scheduled Appointments and Calendar -->
    <div class="row">
        <!-- Scheduled Appointments -->
        <div class="col-lg-8">
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

        <!-- Calendar -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Calendar</h3>
                </div>
                <div class="card-body">
                    <div id="calendar">
                        <div class="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/dashboard-charts.js"></script>
@stop
