@extends('layouts.adminlte')

@section('title', 'Schedule Blood Donation')

@section('content_header')
    <h1>Schedule Blood Donation</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        <form id="appointmentForm" method="POST" action="{{ route('donors.schedule_appointment.submit') }}">
                @csrf <!-- CSRF Token -->

                <div class="form-group">
                    <label for="date" class="form-label">Select Your Donation Date:</label>
                    <input type="date" class="form-control" id="date" name="appointment_date" required>
                </div>

                <div class="form-group">
                    <label for="time" class="form-label">Select Your Donation Time:</label>
                    <select class="form-control" id="time" name="appointment_time" required>
                        <option value="">Select Time</option>
                    </select>
                </div>

                <button type="submit" id="scheduleButton" class="btn btn-primary" onclick="scheduleAppointment()">Schedule My Donation</button>
                <div id="formMessage" class="mt-3"></div> 
            </form>
        </div>
    </div>
@stop

@section('styles')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> <!-- Flatpickr CSS -->
    <style>
        .card {
            margin-top: 20px;
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
<!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#date', {
                dateFormat: 'Y-m-d',
                minDate: 'today'
            });

            // Form submission handling
            document.getElementById('appointmentForm').addEventListener('submit', function (event) {
                event.preventDefault();
                const form = this;
                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    displayMessage('success', 'Appointment Scheduled Successfully!');
                    form.reset(); 
                })
                .catch(error => {
                    console.error('Error:', error);
                    displayMessage('error', 'Error scheduling appointment. Please try again.');
                });
            });

            // Function to display success/error messages
            function displayMessage(type, message) {
                const formMessage = document.getElementById('formMessage');
                formMessage.innerHTML = `<div class="alert alert-${type}" role="alert">${message}</div>`;
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
    const timeSelect = document.getElementById('time');
    const startTime = 8;
    const endTime = 17; 

    for (let hour = startTime; hour < endTime; hour++) {
        const formattedHour = hour.toString().padStart(2, '0'); 
        const displayHour = hour > 12 ? hour - 12 : hour; 
        const meridiem = hour >= 12 ? 'PM' : 'AM'; 

        const option = document.createElement('option');
        option.value = formattedHour + ':00'; 
        option.textContent = displayHour + ':00 ' + meridiem; 

        timeSelect.appendChild(option); 
}
});
    </script>
@stop
