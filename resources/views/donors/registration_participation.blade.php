@extends('layouts.adminlte')

@section('title', 'Registration/Participation')

@section('content_header')
    <h1>Registration/Participation</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Event Registration</h3>
            <p>Register for the upcoming events and participate in saving lives.</p>

            <form id="registrationForm">
                <div class="form-group">
                    <label for="fullName">Full Name:</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                </div>

                <div class="form-group">
                    <label for="contactNumber">Contact Number:</label>
                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="eventSelection">Select Event:</label>
                    <select class="form-control" id="eventSelection" name="eventSelection" required>
                      
                        <option value="event1">Event 1</option>
                        <option value="event2">Event 2</option>
                       
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
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

        h3 {
            color: #3C0CE9;
        }

        
    </style>
@stop

@section('scripts')
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function (event) {
            event.preventDefault();
            
            alert('Registration Successful!');
        });
    </script>
@stop
