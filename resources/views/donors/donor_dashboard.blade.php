@extends('layouts.adminlte')

@section('title', 'Donor Dashboard')

@section('content_header')
    <h1>Donor Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Schedule Appointments -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Schedule Appointments</h3>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- View Upcoming Events -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Upcoming Events</h3>
                </div>
                <div class="card-body">
                    @if($upcomingEvents->count() > 0)
                        <ul>
                            @foreach($upcomingEvents as $event)
                                <li>
                                    <strong>{{ $event->name }}</strong><br>
                                    Date: {{ $event->date }}<br>
                                    Time: {{ $event->time }}<br>
                                    Location: {{ $event->location }}<br>
                                    <span id="countdown-{{ $event->id }}"></span><br>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventDetailsModal{{ $event->id }}">
                                        View Details
                                    </button>
                                    <form action="{{ route('event.register', ['id' => $event->id]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Register</button>
                                    </form>
                                </li>

                                <!-- Event Details Modal -->
                                <div class="modal fade" id="eventDetailsModal{{ $event->id }}" tabindex="-1" role="dialog" aria-labelledby="eventDetailsModalLabel{{ $event->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="eventDetailsModalLabel{{ $event->id }}">Event Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Purpose: {{ $event->purpose }}</p>
                                                <p>Agenda: {{ $event->agenda }}</p>
                                                <p>Special Guests: {{ $event->special_guests }}</p>
                                               
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    @else
                        <p>No upcoming events</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('sidebar')
    @parent
    <!-- Sidebar Menu -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Blood Donation</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Schedule Appointments Menu Item -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>Schedule Appointments</p>
                        </a>
                    </li>

                    <!-- View Upcoming Events Menu Item -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>View Upcoming Events</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- /.Main Sidebar Container -->
@stop

@section('scripts')
    <script>
        // Countdown Timer Logic
        @foreach($upcomingEvents as $event)
            var countdownDate{{ $event->id }} = new Date("{{ $event->date }} {{ $event->time }}").getTime();
            
            var x{{ $event->id }} = setInterval(function() {
                var now = new Date().getTime();
                var distance = countdownDate{{ $event->id }} - now;
                
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                document.getElementById("countdown-{{ $event->id }}").innerHTML = "Time Remaining: " + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
                
                if (distance < 0) {
                    clearInterval(x{{ $event->id }});
                    document.getElementById("countdown-{{ $event->id }}").innerHTML = "Event Expired";
                }
            }, 1000);
        @endforeach
    </script>
@stop
