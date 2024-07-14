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
                                    <option value="{{ $donor->id }}"
                                            data-name="{{ $donor->full_name }}"
                                            data-blood-type="{{ $donor->blood_type }}"
                                            data-phone="{{ $donor->phone }}">{{ $donor->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- End Donor Selection -->

                        <div class="form-group">
                            <label for="blood_type">Blood Type</label>
                            <select name="blood_type" id="blood_type" class="form-control" required>
                                <option value="">Select blood type</option>
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
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="donation_date">Donation Date</label>
                            <input type="date" name="donation_date" id="donation_date" class="form-control" required>
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
        document.addEventListener('DOMContentLoaded', function() {
            var donorSelect = document.getElementById('donor_id');
            donorSelect.addEventListener('change', function() {
                var selectedOption = donorSelect.options[donorSelect.selectedIndex];
                var name = selectedOption.getAttribute('data-name');
                var bloodType = selectedOption.getAttribute('data-blood-type');
                var phone = selectedOption.getAttribute('data-phone');

                document.getElementById('full_name').value = name ? name : '';
                document.getElementById('blood_type').value = bloodType ? bloodType : '';
                document.getElementById('phone').value = phone ? phone : '';
            });
        });
    </script>
@stop
