@extends('layouts.adminlte')

@section('title', 'Lifeline Points')

@section('content_header')
    <h1>Lifeline Points</h1>
@stop

@section('content')
    <div class="row">
        <!-- Donor Information Card -->
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="card lifeline-card shadow-sm">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Donor Information</h3>
                </div>
                <div class="card-body">
                    <p class="lead">Name: <strong>{{ $donorInformation['name'] }}</strong></p>
                    <p>Email: {{ $donorInformation['email'] }}</p>
                    <p>Total Points: {{ $donorInformation['total_points'] }}</p>
                    <p>Tier: <span class="badge badge-primary">{{ $donorInformation['tier'] }}</span></p>
                    <!-- Progress bar displaying total points -->
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $donorInformation['total_points'] * 10 }}%;" aria-valuenow="{{ $donorInformation['total_points'] * 10 }}" aria-valuemin="0" aria-valuemax="100">{{ $donorInformation['total_points'] }}/10</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Available Rewards Card -->
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="card lifeline-card shadow-sm">
                <div class="card-header bg-secondary">
                    <h3 class="card-title">Available Rewards</h3>
                </div>
                <div class="card-body">
                    <ul>
                        @php
                            $bronzeRewards = [
                                'Earn points for each donation.',
                                'Free basic health checkup voucher after 2nd donation.',
                                'Recognition on the donor portal.'
                            ];
                            
                            $silverRewards = [
                                'Increased points per donation.',
                                '$20 cash reward upon reaching 5th donation.',
                                'Featured as "Donor of the Week" on social media with a personalized message.'
                            ];
                            
                            $goldRewards = [
                                'Highest points per donation.',
                                '$50 cash reward upon reaching 10th donation.',
                                'Featured as "Donor of the Month" on the website with a photo and story.',
                                'Discounted comprehensive health checkup voucher.'
                            ];
                        @endphp
                        
                        @foreach ($bronzeRewards as $reward)
                            <li><i class="fas fa-check"></i> {{ $reward }}</li>
                        @endforeach
                        
                        @if ($donorInformation['tier'] === 'Silver' || $donorInformation['tier'] === 'Gold')
                            @foreach ($silverRewards as $reward)
                                <li><i class="fas fa-check"></i> {{ $reward }}</li>
                            @endforeach
                        @endif
                        
                        @if ($donorInformation['tier'] === 'Gold')
                            @foreach ($goldRewards as $reward)
                                <li><i class="fas fa-check"></i> {{ $reward }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
