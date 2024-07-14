@extends('layouts.adminltee')

@section('title', 'Blood Bank Management')

@section('content_header')
    <div class="jumbotron jumbotron-fluid bg-primary text-white">
        <div class="container">
            <h1 class="display-4">Blood Bank Management</h1>
            <p class="lead">Efficiently manage all blood-related activities here.</p>
        </div>
    </div>
@stop

@section('content')
    <div class="row">

        <!-- Blood Requests -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Manage Blood Requests</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Hospital Name</th>
                                    <th scope="col">Blood Type</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Urgency</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bloodRequests as $bloodRequest)
                                    <tr>
                                        <td>{{ $bloodRequest->hospital->name }}</td>
                                        <td>{{ $bloodRequest->blood_type }}</td>
                                        <td>{{ $bloodRequest->quantity }}</td>
                                        <td>{{ $bloodRequest->urgency }}</td>
                                        <td>{{ $bloodRequest->status }}</td>
                                        <td>
                                            <form action="{{ route('blood.bank.requests.update-status', $bloodRequest->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="pending" {{ $bloodRequest->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="fulfilled" {{ $bloodRequest->status == 'fulfilled' ? 'selected' : '' }}>Fulfilled</option>
                                                    <option value="cancelled" {{ $bloodRequest->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="col-lg-4">
            <div class="row">
                <!-- Upcoming Events -->
                <div class="col-lg-12 mb-4">
                    <div class="card bg-info text-white">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Upcoming Events</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Events</span>
                                    <span class="info-box-number">{{ $bloodBankEvents->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Units -->
                <div class="col-lg-12 mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Total Units</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="info-box-icon"><i class="fas fa-tint"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Units</span>
                                    <span class="info-box-number">{{ $totalUnits }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Donors -->
                <div class="col-lg-12">
                    <div class="card bg-primary text-white">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Top Donors</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm">
                                <tbody>
                                    @foreach($topDonors as $donor)
                                        <tr>
                                            <td>{{ $donor->full_name }}</td>
                                            <td><span class="badge badge-pill badge-light">{{ $donor->donations_count }} Donations</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scheduled Appointments and Calendar -->
    <div class="row mt-4">
        <!-- Scheduled Appointments -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Scheduled Appointments</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Donor Name</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->donor->full_name }}</td>
                                    <td>{{ $appointment->appointment_date }}</td>
                                    <td>{{ $appointment->appointment_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Calendar -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Calendar</h5>
                </div>
                <div class="card-body p-2">
                    <div id="calendar" class="text-center">
                        <h5 id="current-date" class="text-primary"></h5>
                        <div class="calendar-container">
                            <div class="calendar-header mb-2">
                                <button id="prev-month" class="btn btn-sm btn-outline-primary">&lt;</button>
                                <span id="month-year"></span>
                                <button id="next-month" class="btn btn-sm btn-outline-primary">&gt;</button>
                            </div>
                            <table class="calendar-table table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Sun</th>
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Wed</th>
                                        <th>Thu</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                    </tr>
                                </thead>
                                <tbody id="calendar-body">
                                    <!-- Calendar dates will be inserted here dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/custom.css">
    <style>
        .calendar-container {
            width: 100%;
        }
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }
        .calendar-header button {
            background: none;
            border: none;
            font-size: 1em;
            cursor: pointer;
        }
        .calendar-table {
            width: 100%;
            border-collapse: collapse;
        }
        .calendar-table th, .calendar-table td {
            width: 14.285%;
            text-align: center;
            padding: 5px;
            font-size: 0.8em;
        }
        .calendar-table td {
            cursor: pointer;
        }
        .calendar-table td.highlight {
            background-color: #007bff;
            color: white;
            border-radius: 50%;
        }
    </style>
@stop

@section('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS for charts or additional functionality -->
    <script src="/js/dashboard-charts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentDate = new Date();
            const calendar = document.getElementById('calendar-body');
            const monthYearDisplay = document.getElementById('month-year');
            const prevMonthBtn = document.getElementById('prev-month');
            const nextMonthBtn = document.getElementById('next-month');

            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();

            function renderCalendar(month, year) {
                calendar.innerHTML = '';
                const firstDay = new Date(year, month).getDay();
                const daysInMonth = 32 - new Date(year, month, 32).getDate();
                const monthYear = new Date(year, month).toLocaleString('default', { month: 'long', year: 'numeric' });

                monthYearDisplay.innerText = monthYear;

                let date = 1;
                for (let i = 0; i < 6; i++) {
                    const row = document.createElement('tr');

                    for (let j = 0; j < 7; j++) {
                        const cell = document.createElement('td');
                        if (i === 0 && j < firstDay) {
                            cell.classList.add('text-muted');
                        } else if (date > daysInMonth) {
                            break;
                        } else {
                            cell.innerText = date;
                            if (date === currentDate.getDate() && year === currentDate.getFullYear() && month === currentDate.getMonth()) {
                                cell.classList.add('highlight');
                            }
                            date++;
                        }
                        row.appendChild(cell);
                    }
                    calendar.appendChild(row);
                }
            }

            renderCalendar(currentMonth, currentYear);

            prevMonthBtn.addEventListener('click', function() {
                if (currentMonth === 0) {
                    currentMonth = 11;
                    currentYear--;
                } else {
                    currentMonth--;
                }
                renderCalendar(currentMonth, currentYear);
            });

            nextMonthBtn.addEventListener('click', function() {
                if (currentMonth === 11) {
                    currentMonth = 0;
                    currentYear++;
                } else {
                    currentMonth++;
                }
                renderCalendar(currentMonth, currentYear);
            });
        });
    </script>
@stop
