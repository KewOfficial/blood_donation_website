@extends('layouts.adminltee')

@section('title', 'Record Blood Donation')

@section('content_header')
    <div class="container-fluid">
        <h1 class="m-0 text-dark">Record Blood Donation</h1>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Donor Information</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('blood.donation.record') }}" method="POST">
                        @csrf
                        <!-- Donor Selection -->
                        <div class="form-group">
                            <label for="donor_id">Select Donor</label>
                            <select name="donor_id" id="donor_id" class="form-control" required>
                                <option value="">Select donor</option>
                                @foreach($donors as $donor)
                                    <option value="{{ $donor->id }}">{{ $donor->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- End Donor Selection -->
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter full name" required>
                        </div>
                        <div class="form-group">
                            <label for="blood_type">Blood Type</label>
                            <select name="blood_type" id="blood_type" class="form-control" required>
                                <option value="">Select blood type</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="donation_date">Donation Date</label>
                            <input type="date" name="donation_date" id="donation_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="number_of_donations">Number of Donations</label>
                            <input type="number" name="number_of_donations" id="number_of_donations" class="form-control" placeholder="Enter number of donations" required>
                        </div>
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Enter any additional notes"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Record Donation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#donor_id').select2();

            $('#donor_id').on('change', function() {
                var donorId = $(this).val();
                if (donorId) {
                    $.ajax({
                        url: '{{ route('donor.details') }}',
                        type: 'GET',
                        data: { id: donorId },
                        success: function(data) {
                            $('#full_name').val(data.full_name);
                            $('#blood_type').val(data.blood_type);
                            $('#phone').val(data.phone);
                        }
                    });
                }
            });
        });
    </script>
@stop
