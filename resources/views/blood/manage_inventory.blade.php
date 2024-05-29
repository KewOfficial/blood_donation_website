@extends('layouts.adminltee')

@section('title', 'Manage Inventory')

@section('content_header')
    <h1 style="font-family: 'Roboto', sans-serif;">Manage Inventory</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Form section within a card -->
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <h2 style="font-family: 'Roboto', sans-serif; font-size: 1.2rem;">Add Blood Unit</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('save-blood-unit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="bloodType" style="font-family: 'Roboto', sans-serif;">Blood Type</label>
                            <select class="form-control" id="bloodType" name="bloodType" required>
                                <option value="" disabled selected>Select Blood Type</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rhFactor" style="font-family: 'Roboto', sans-serif;">Rh Factor</label>
                            <select class="form-control" id="rhFactor" name="rhFactor" required>
                                <option value="" disabled selected>Select Rh Factor</option>
                                <option value="Positive">Positive (+)</option>
                                <option value="Negative">Negative (-)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="units" style="font-family: 'Roboto', sans-serif;">Units</label>
                            <input type="number" class="form-control" id="units" name="units" placeholder="Enter number of units" required>
                        </div>
                        <div class="form-group">
                            <label for="expiryDate" style="font-family: 'Roboto', sans-serif;">Expiry Date</label>
                            <input type="date" class="form-control" id="expiryDate" name="expiryDate" required>
                        </div>
                        <button type="submit" class="btn btn-primary" style="font-family: 'Roboto', sans-serif;">Save Unit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Inventory Overview section within a card -->
            <div class="card shadow">
                <div class="card-header bg-secondary">
                    <h2 style="font-family: 'Roboto', sans-serif; font-size: 1.2rem;">Inventory Overview</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="font-family: 'Roboto', sans-serif; font-weight: bold;">Blood Type</th>
                                <th style="font-family: 'Roboto', sans-serif; font-weight: bold;">Rh Factor</th>
                                <th style="font-family: 'Roboto', sans-serif; font-weight: bold;">Total Units</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bloodInventory as $bloodType => $rhFactorData)
                                @foreach ($rhFactorData as $rhFactor => $totalUnits)
                                    <tr>
                                        <td>{{ $bloodType }}</td>
                                        <td>{{ $rhFactor }}</td>
                                        <td>{{ $totalUnits }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Total Blood Units card -->
            <div class="card shadow mt-4">
                <div class="card-header bg-primary">
                    <h2 style="font-family: 'Roboto', sans-serif; font-size: 1.2rem;">Total Blood Units</h2>
                </div>
                <div class="card-body">
                    <p><strong>Total Units:</strong> {{ $totalUnitsAll }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
