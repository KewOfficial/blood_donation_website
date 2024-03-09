@extends('layouts.adminlte')

@section('title', 'Donor Loyalty Program')

@section('content_header')
    <h1>Donor Loyalty Program</h1>
@stop

@section('content')
    <div class="row">
        <!-- Loyalty Points Display -->
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Loyalty Points</h3>
                </div>
                <div class="card-body">
                    <p class="mb-1">Current Points: <strong>{{ $loyaltyPoints }}</strong></p>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progressPercentage }}%;" aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-muted">Your progress towards the next level</small>
                </div>
            </div>
        </div>

        <!-- Badge Showcase -->
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Badge Showcase</h3>
                </div>
                <div class="card-body">
                    @forelse ($badges as $badge)
                        <div class="badge mb-3">
                            <i class="{{ $badge->icon }}"></i>
                            <p class="mb-0">{{ $badge->name }} - {{ $badge->description }}</p>
                        </div>
                    @empty
                        <p>No badges earned yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Earn Points Section -->
        <div class="col-md-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Earn Points</h3>
                </div>
                <div class="card-body">
                    <p class="mb-1">Earn points by participating in events, Donating Blood etc, etc.</p>
                    <a href="{{ route('view_activities') }}" class="btn btn-sm btn-info">View Activities</a>
                </div>
            </div>
        </div>

        <!-- Redemption Options -->
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Redemption Options</h3>
                </div>
                <div class="card-body">
                    <p class="mb-1">Redeem your points for exciting rewards!</p>
                    <a href="{{ route('view_rewards') }}" class="btn btn-sm btn-warning">View Rewards</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification System  -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="notificationToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-bell"></i>
                <strong class="me-auto">Notification</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="notificationMessage"></div>
        </div>
    </div>

    <script>
        // Notification Logic
        document.getElementById('earnPointsBtn').addEventListener('click', function () {
            showNotification('Earn Points', 'You earned 50 points for participating in an event!');
        });

        document.getElementById('redeemPointsBtn').addEventListener('click', function () {
            showNotification('Redeem Points', 'You redeemed 100 points for a special reward!');
        });

        function showNotification(title, message) {
            document.getElementById('notificationMessage').innerText = message;
            var toast = new bootstrap.Toast(document.getElementById('notificationToast'));
            toast.show();
        }
    </script>
@stop

@section('sidebar')
@stop

@section('scripts')
   
@stop
