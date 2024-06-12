@extends('layouts.adminltee')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Filter Donors</h1>

    <!-- Filter options -->
    <form action="{{ route('filter_donors') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="donation_status">Donation Status:</label>
                <select name="donation_status" id="donation_status" class="form-control">
                    <option value="">-- Select Status --</option>
                    <option value="donated">Donated</option>
                    <option value="not_donated">Not Donated</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="blood_type">Blood Type:</label>
                <select name="blood_type" id="blood_type" class="form-control">
                    <option value="">-- Select Blood Type --</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="donation_count">Donation Count:</label>
                <input type="number" name="donation_count" id="donation_count" class="form-control" min="0">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Filter</button>
    </form>

    <!-- Display filtered donors -->
    <h2>Filtered Donors</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Blood Type</th>
                    <th>Total Donations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filteredDonors as $donor)
                <tr>
                    <td>{{ $donor->full_name }}</td>
                    <td>{{ $donor->email }}</td>
                    <td>{{ $donor->phone }}</td>
                    <td>{{ $donor->blood_type }}</td>
                    <td>{{ $donor->donation_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
