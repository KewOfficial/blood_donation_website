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
@stop
