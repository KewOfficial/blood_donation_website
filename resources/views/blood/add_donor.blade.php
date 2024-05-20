@extends('layouts.adminltee')

@section('title', 'Add Donor')

@section('content_header')
    <h1>Add Donor</h1>
@stop

@section('content')
    <form action="{{ route('blood.bank.add.donor') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" id="full_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="blood_type">Blood Type</label>
            <input type="text" name="blood_type" id="blood_type" class="form-control" required>
        </div>
        <!-- Add fields for other donor information here -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
