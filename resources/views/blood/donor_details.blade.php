@extends('layouts.adminltee')

@section('title', 'Donor Details')

@section('content_header')
    <h1>Donor Details</h1>
@stop

@section('content')
    <p><strong>Name:</strong> {{ $donor->name }}</p>
    <p><strong>Email:</strong> {{ $donor->email }}</p>
    <p><strong>Phone:</strong> {{ $donor->phone }}</p>
    <p><strong>Blood Type:</strong> {{ $donor->blood_type }}</p>
    <p><strong>Total Donations:</strong> {{ $totalDonations }}</p>
    <p><strong>Estimated Tier:</strong> {{ $estimatedTier }}</p>
@stop
