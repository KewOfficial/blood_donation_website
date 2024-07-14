@extends('layouts.hospital')

@section('title', 'Hospital Dashboard')

@section('styles')
    <style>
      
        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f0f0f0;
            border-bottom: 1px solid #ddd;
            padding: 10px 15px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-body {
            padding: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #66afe9;
            outline: 0;
            box-shadow: 0 0 10px rgba(102, 175, 233, 0.6);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .disabled-input {
            background-color: #e9ecef;
            cursor: not-allowed;
        }

        /* Color coding for expiry date */
        .expiry-date-red {
            background-color: #ffcccc;
        }
        .expiry-date-yellow {
            background-color: #fff3cd;
        }
        .expiry-date-green {
            background-color: #d4edda;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 10px;
            }
        }
    </style>
@endsection

@section('content_header')
    <h1>Hospital Dashboard</h1>
@stop

@section('content')
    <p>Welcome to Dashboard, {{ auth()->guard('hospital')->user()->name }}!</p>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Initiate Blood Request</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('hospital.blood.request') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="blood_group">Blood Group</label>
                    <select class="form-control" id="blood_group" name="blood_type" required>
                        <option value="">Select blood group</option>
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
                    <label for="units_required">Units Required</label>
                    <input type="number" class="form-control" id="units_required" name="quantity" placeholder="Enter number of units required" required>
                </div>
                <div class="form-group">
                    <label for="urgency">Urgency</label>
                    <select class="form-control" id="urgency" name="urgency" required>
                        <option value="">Select urgency</option>
                        <option value="Urgent">Urgent</option>
                        <option value="Routine">Routine</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hospital_name">Hospital Name</label>
                    <input type="text" class="form-control disabled-input" id="hospital_name" name="hospital_name" value="{{ auth()->guard('hospital')->user()->name }}" readonly>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit Request</button>
            </div>
        </form>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Available Blood Units</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Blood Type</th>
                        <th>Rhesus Factor</th>
                        <th>Units</th>
                        <th>Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bloodUnits as $unit)
                        @php
                            $expiryClass = '';
                            $daysToExpiry = \Carbon\Carbon::parse($unit->expiry_date)->diffInDays(now());
                            if ($daysToExpiry <= 7) {
                                $expiryClass = 'expiry-date-red';
                            } elseif ($daysToExpiry <= 30) {
                                $expiryClass = 'expiry-date-yellow';
                            } else {
                                $expiryClass = 'expiry-date-green';
                            }
                        @endphp
                        <tr class="{{ $expiryClass }}">
                            <td>{{ $unit->blood_type }}</td>
                            <td>{{ $unit->rh_factor }}</td>
                            <td>{{ $unit->units }}</td>
                            <td>{{ $unit->expiry_date->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
    
@endsection
