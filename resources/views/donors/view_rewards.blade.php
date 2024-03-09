
@extends('layouts.adminlte')

@section('title', 'View Rewards')

@section('content_header')
    <h1 class="mb-3">View Rewards</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-info">
            <h3 class="card-title text-white">Available Rewards</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/blood.webp') }}" class="card-img-top" alt="Reward Image">
                        <div class="card-body">
                            <h5 class="card-title">Exclusive T-Shirt</h5>
                            <p class="card-text">Redeem your points for this exclusive donor T-shirt.</p>
                            <a href="#" class="btn btn-primary">Redeem Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/card.png') }}" class="card-img-top" alt="Reward Image">
                        <div class="card-body">
                            <h5 class="card-title">Gift Card</h5>
                            <p class="card-text">Get a gift card of your choice with your earned points.</p>
                            <a href="#" class="btn btn-primary">Redeem Now</a>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
@stop

@section('sidebar')
   
@stop

@section('scripts')
   
@stop
