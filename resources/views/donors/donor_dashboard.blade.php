@extends('layouts.adminlte')

@section('title', 'Donor Dashboard')

@section('content_header')
    <h1>Donor Dashboard</h1>
@stop

@section('content')
<div class="row">
 
    <!-- Earnings & Performance -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Earnings & Performance</h3>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <p>Total Earned This Month: <strong>$XX</strong></p>
                    <p>Lifetime Earnings: <strong>$XXX</strong></p>
                </div>
                <div class="mb-4">
                    <p>Average Donation Amount: <strong>$XX</strong></p>
                    <p>Most Recent Donation Amount: <strong>$XX</strong></p>
                </div>
                <div class="mb-4">
                    <p>Donation Frequency: <strong>XX times/month</strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Blood Type & Demand -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h3 class="card-title">Blood Type & Demand</h3>
            </div>
            <div class="card-body">
                <p>Blood Type: <strong>A+</strong></p>
                <p>Demand Indicator: <strong>High</strong> <span class="badge bg-success">High</span></p>
            </div>
        </div>
    </div>

    <!-- Donation History & Trends -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h3 class="card-title">Donation History & Trends</h3>
            </div>
            <div class="card-body">
                <p>Total Donations Made: <strong>XX</strong></p>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Blood Type Donated</th>
                                <th>Amount Earned</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Donation records will be inserted here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress & Gamification -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <!-- Loyalty Program Progress -->
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h3 class="card-title">Loyalty Program Progress</h3>
                    </div>
                    <div class="card-body">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Badges Earned -->
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h3 class="card-title">Badges Earned</h3>
                    </div>
                    <div class="card-body">
                        <!-- Badges will be displayed here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('styles')
    <!-- Custom styles -->
    <style>
        /* Additional custom styles */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            border-radius: 10px 10px 0 0;
        }

        .card-body p {
            margin-bottom: 10px;
        }

        .table-responsive {
            max-height: 300px;
            overflow-y: auto;
        }

        .progress {
            height: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .progress-bar {
            font-weight: bold;
            border-radius: 5px;
        }

        .badge {
            font-size: 0.8rem;
            margin-left: 5px;
            border-radius: 5px;
            padding: 3px 8px;
        }
    </style>
@stop

@section('scripts')
    <!-- Custom scripts -->
    <script>
        // JS for charts and other interactive elements
    </script>
@stop
