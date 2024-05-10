@extends('layouts.adminlte')

@section('title', 'Donor Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <!-- Welcome & Upcoming Events Section -->
    <div class="col-md-12 mb-4">
        <div class="card bg-primary text-white rounded">
            <div class="card-body">
                <h2>Welcome back, {{ Auth::guard('donor')->user()->name }}!</h2>
                <p>You've potentially saved <span id="livesSavedCounter">0</span> lives through your donations.</p>
                <h3 class="mt-4">Upcoming Events</h3>
                <ul class="list-group mt-3 upcoming-events">
                    @foreach($bloodBankEvents as $event)
                        <li class="list-group-item">{{ $event->name }} - {{ $event->date }}</li>
                    @endforeach
                </ul>
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
                <p>Blood Type: <strong>{{ Auth::guard('donor')->user()->blood_type }}</strong></p>
                <p>Demand Indicator: <strong>{{ Auth::guard('donor')->user()->demandIndicator }}</strong></p>
                <p>Total earned this month: <strong>${{ $totalEarnedThisMonth }}</strong></p>
                <p>Year-to-date earnings: <strong>${{ $yearToDateEarnings }}</strong></p>
                <p>Average earnings per donation: <strong>${{ $averageEarningsPerDonation }}</strong></p>
                <a href="{{ route('schedule_appointment') }}" class="btn btn-info">Schedule Appointment</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Performance Chart Section -->
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Earnings & Performance</h3>
            </div>
            <div class="card-body">
                <!-- Include interactive charts for performance metrics -->
                <canvas id="performanceChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Loyalty Program & Call to Action Section -->
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h3 class="card-title">Loyalty Program Progress</h3>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-star-half-alt text-warning fs-2 me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Silver Tier: 300 points required for benefits like exclusive discounts. Expires in 3 months."></i>
                    <div>
                        <p class="mb-0">Silver Tier</p>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $loyaltyPoints }}%;" aria-valuenow="{{ $loyaltyPoints }}" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $loyaltyPoints }}% complete ({{ $loyaltyPoints }} points earned)"></div>
                        </div>
                        <div class="text-muted small">{{ $loyaltyPoints }}% complete ({{ $loyaltyPoints }} points)</div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-trophy text-muted me-2"></i>
                    <p class="mb-0">Early Appointment Scheduling</p>
                </div>
                <div class="d-flex align-items-center">
                    <i class="fas fa-star text-muted me-2"></i>
                    <p class="mb-0">Next Tier: Gold (1000 points) - Earn exclusive rewards!</p>
                </div>
                <a href="{{ route('claim_bonus') }}" class="btn btn-warning mt-3">Claim Bonus</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Badges Earned Section -->
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h3 class="card-title">Badges</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($allBadges as $badge)
                        <div class="col-md-3 mb-3">
                            <div class="badge-card rounded">
                                <img src="{{ asset('images/badges/' . $badge->image) }}" alt="{{ $badge->name }}" class="img-fluid">
                                <p class="badge-name">{{ $badge->name }}</p>
                                <p class="badge-description">{{ $badge->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Convert Points to Badges Button -->
                <a href="{{ route('convert_points_to_badges') }}" class="btn btn-secondary">Unlock Badges with Points</a>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Counter animation for lives saved
        $({ Counter: 0 }).animate({ Counter: 1000 }, {
            duration: 3000,
            easing: 'swing',
            step: function () {
                $('#livesSavedCounter').text(Math.ceil(this.Counter));
            }
        });

        // Chart.js for Performance Chart
        var ctx = document.getElementById('performanceChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Monthly Earnings',
                    data: [200, 400, 600, 800, 1000, 1200],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        // Initialize Bootstrap tooltips
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.btn-claim-bonus').click(function () {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("claim_bonus") }}',
                    dataType: 'json',
                    success: function (response) {
                        // Handle success message or any other action
                        alert(response.message);
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@stop
@section('styles')
    @parent
    <style>
        /* Custom styles for enhanced card design */
        .card {
            border-radius: 10px;
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        /* Typography enhancements */
        h2, h3 {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            font-size: 1.5rem;
        }

        p {
            font-family: 'Arial', sans-serif;
            font-size: 1rem;
        }

        .btn {
            font-family: 'Arial', sans-serif;
        }

        /* Font color for upcoming events */
        .upcoming-events li {
            color: black; 
        }
    </style>
@stop
