@extends('layouts.adminltee')

@section('title', 'Manage Inventory')

@section('content_header')
    <h1>Manage Inventory</h1>
@stop

@section('content')
    <ul class="nav nav-tabs" id="inventoryTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="bloodStock-tab" data-toggle="tab" href="#bloodStock" role="tab" aria-controls="bloodStock" aria-selected="true">Blood Stock Management</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="inventoryHistory-tab" data-toggle="tab" href="#inventoryHistory" role="tab" aria-controls="inventoryHistory" aria-selected="false">Inventory History</a>
        </li>
    </ul>
    <div class="tab-content" id="inventoryTabsContent">
        <!-- Blood Stock Management Section -->
        <div class="tab-pane fade show active" id="bloodStock" role="tabpanel" aria-labelledby="bloodStock-tab">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Blood Stock Management</h3>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addBloodUnitModal">Add Blood Unit</button>
                </div>
                <div class="card-body">
                    <!-- Search Bar -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="searchBlood" placeholder="Search by Blood Type, Rh Factor, or Expiry Date">
                    </div>
                    <!-- Blood Stock Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Blood Type</th>
                                    <th>Rh Factor</th>
                                    <th>Units</th>
                                    <th>Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Blood stock data will be dynamically populated here -->
                                <!-- Example: -->
                                <tr>
                                    <td><span class="blood-type A-positive">A+</span></td>
                                    <td>Positive</td>
                                    <td>10</td>
                                    <td>2024-05-20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inventory History Section -->
        <div class="tab-pane fade" id="inventoryHistory" role="tabpanel" aria-labelledby="inventoryHistory-tab">
            <!-- Inventory History Content -->
            <p>Inventory history content goes here...</p>
        </div>
    </div>

    <!-- Add Blood Unit Modal -->
    <div class="modal fade" id="addBloodUnitModal" tabindex="-1" role="dialog" aria-labelledby="addBloodUnitModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBloodUnitModalLabel">Add Blood Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add Blood Unit Form -->
                <form id="addBloodUnitForm">
                    <div class="form-group">
                        <label for="bloodType">Blood Type</label>
                        <select class="form-control" id="bloodType" name="bloodType">
                            <option value="" disabled selected>Select Blood Type</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rhFactor">Rh Factor</label>
                        <select class="form-control" id="rhFactor" name="rhFactor">
                            <option value="" disabled selected>Select Rh Factor</option>
                            <option value="Positive">Positive (+)</option>
                            <option value="Negative">Negative (-)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="units">Units</label>
                        <input type="number" class="form-control" id="units" name="units" placeholder="Enter number of units">
                    </div>
                    <div class="form-group">
                        <label for="expiryDate">Expiry Date</label>
                        <input type="date" class="form-control" id="expiryDate" name="expiryDate">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveBloodUnit">Add</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5bRB6e0yvA5g2Oa7HfTQD1hJ2Xto1tx/3E=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        // Save Blood Unit
        $('#saveBloodUnit').on('click', function() {
            var bloodType = $('#bloodType').val();
            var rhFactor = $('#rhFactor').val();
            var units = $('#units').val();
            var expiryDate = $('#expiryDate').val();

            // Perform AJAX request to save data to the database
$.ajax({
    url: '/save-blood-unit',
    method: 'POST',
    data: {
        bloodType: bloodType,
        rhFactor: rhFactor,
        units: units,
        expiryDate: expiryDate
    },
    success: function(response) {
        // Reload table data or append new row to the table
        // Example: 
        var newRow = '<tr>' +
            '<td>' + bloodType + '</td>' +
            '<td>' + rhFactor + '</td>' +
            '<td>' + units + '</td>' +
            '<td>' + expiryDate + '</td>' +
            '</tr>';
        $('table tbody').append(newRow);

        // Close modal
        $('#addBloodUnitModal').modal('hide');
    },
    error: function(xhr, status, error) {
        console.error(xhr.responseText);
    }
});

        });
    });
</script>
@stop
