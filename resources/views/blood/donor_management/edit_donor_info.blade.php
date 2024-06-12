@extends('layouts.adminltee')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Donor Information</h1>

    <!-- Form for editing donor information -->
    <form action="{{ route('update_donor_info', $donor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $donor->full_name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $donor->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $donor->phone }}" required>
        </div>
        <div class="form-group">
            <label for="blood_type">Blood Type:</label>
            <select name="blood_type" id="blood_type" class="form-control" required>
                <option value="">-- Select Blood Type --</option>
                <option value="A+" {{ $donor->blood_type === 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ $donor->blood_type === 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ $donor->blood_type === 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ $donor->blood_type === 'B-' ? 'selected' : '' }}>B-</option>
                <option value="AB+" {{ $donor->blood_type === 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ $donor->blood_type === 'AB-' ? 'selected' : '' }}>AB-</option>
                <option value="O+" {{ $donor->blood_type === 'O+' ? 'selected' : '' }}>O+</option>
                <option value="O-" {{ $donor->blood_type === 'O-' ? 'selected' : '' }}>O-</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Information</button>
    </form>
</div>
@endsection
