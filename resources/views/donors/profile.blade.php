@extends('layouts.adminlte')

@section('title', 'Donor Profile')

@section('content_header')
    <h1>{{ $donor->full_name }}'s Profile</h1>
@stop

@section('content')
<style>
    .profile-picture {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
</style>

<div class="row">
    <!-- Profile Picture Section -->
    <div class="col-md-12 mb-4">
        <div class="card rounded">
            <div class="card-header bg-info text-white">
                <img src="{{ $donor->profile_picture ? Storage::url($donor->profile_picture) : asset('dist/img/avatar2.png') }}" alt="Profile Picture" class="img-thumbnail rounded-circle profile-picture">
            </div>
            <div class="card-body">
                <div class="mt-4">
                    <p><strong>Name:</strong> {{ $donor->full_name }}</p>
                    <p><strong>Email:</strong> {{ $donor->email }}</p>
                    <p><strong>Phone:</strong> {{ $donor->phone }}</p>
                    <p><strong>Blood Type:</strong> {{ $donor->blood_type }}</p>
                    <p><strong>Tier:</strong> {{ $donorInformation['tier'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
