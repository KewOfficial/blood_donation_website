@extends('layouts.adminlte')

@section('title', 'Lifeline Points')

@section('content_header')
    <h1>Lifeline Points</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">Donor Information</h3>
                </div>
                <div class="card-body">
                    <p class="lead">Name: {{ $donorInformation['name'] }}</p>
                    <p>Email: {{ $donorInformation['email'] }}</p>
                    <p>Total Points: {{ $donorInformation['total_points'] }}</p>
                    <p>Tier: <span class="badge badge-primary">{{ $donorInformation['tier'] }}</span></p>
                    <!-- Progress bar displaying total points -->
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $donorInformation['total_points'] * 10 }}%;" aria-valuenow="{{ $donorInformation['total_points'] * 10 }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Donation History</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($donationHistory as $donation)
                            <li class="list-group-item">
                                <span class="badge badge-secondary">{{ $donation->created_at->format('F d, Y') }}</span> - {{ $donation->bloodBankEvent->name }} (Blood Type: {{ $donation->bloodBankEvent->blood_type }})
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-warning">
            <h3 class="card-title">Available Rewards</h3>
        </div>
        <div class="card-body">
            <ul>
                @if ($donorInformation['tier'] === 'Bronze')
                    <li>Earn points for each donation.</li>
                    <li>Free basic health checkup voucher after 2nd donation.</li>
                    <li>Recognition on the donor portal.</li>
                @elseif ($donorInformation['tier'] === 'Silver')
                    @include('partials.bronze_rewards')
                    <li>Increased points per donation.</li>
                    <li>$20 cash reward upon reaching 5th donation.</li>
                    <li>Featured as "Donor of the Week" on social media with a personalized message.</li>
                @elseif ($donorInformation['tier'] === 'Gold')
                    @include('partials.bronze_rewards')
                    @include('partials.silver_rewards')
                    <li>Highest points per donation.</li>
                    <li>$50 cash reward upon reaching 10th donation.</li>
                    <li>Featured as "Donor of the Month" on the website with a photo and story.</li>
                    <li>Discounted comprehensive health checkup voucher.</li>
                @endif
            </ul>
        </div>
    </div>
@stop
