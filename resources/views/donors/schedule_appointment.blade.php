@extends('layouts.adminlte')

@section('title', 'Schedule Appointments')

@section('content_header')
    <h1>Schedule Appointments</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form id="appointmentForm">
                <div class="form-group">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="contact" class="form-label">Contact Information:</label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                </div>

                <div class="form-group">
                    <label for="appointmentDate" class="form-label">Preferred Date:</label>
                    <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" required>
                </div>

                <div class="form-group">
                    <label for="appointmentTime" class="form-label">Preferred Time:</label>
                    <input type="time" class="form-control" id="appointmentTime" name="appointmentTime" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit Appointment</button>
            </form>
        </div>
    </div>
@stop

@section('styles')
    <style>
       
        .card {
            margin: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #230CF3; 
        }

       
    </style>
@stop

@section('scripts')
    <script>
        document.getElementById('appointmentForm').addEventListener('submit', function (event) {
            event.preventDefault();
            
            alert('Appointment Submitted!');
        });
    </script>
@stop
