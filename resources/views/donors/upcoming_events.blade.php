@extends('layouts.adminlte')

@section('title', 'List of Upcoming Events')

@section('content_header')
    <h1 class="text-center my-4">List of Upcoming Events</h1>
@stop

@section('content')
    <div class="container">
        <div id="calendar"></div> <!-- Calendar container -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                @if($upcomingEvents->count() > 0)
                    <div class="row">
                        @foreach($upcomingEvents as $event)
                            <div class="col-md-6">
                                <div class="card mb-4 event-card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $event->name }}</h5>
                                        <p class="card-text"><span class="event-label">Date:</span> {{ $event->date }}</p>
                                        <p class="card-text"><span class="event-label">Time:</span> {{ $event->event_time }}</p>
                                        <p class="card-text"><span class="event-label">Location:</span> {{ $event->location }}</p>
                                        <p class="card-text">{{ $event->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center">No upcoming events</p>
                @endif
            </div>
        </div>
    </div>
@stop

@section('styles')
    @parent
    <!-- Additional styles specific to the calendar -->
    <style>
        /* Typography and Layout */
        body {
            font-family: 'Roboto', sans-serif;
        }
        
        h1 {
            font-size: 2.5rem;
            color: #4a4a4a;
        }

        .card {
            border-radius: 10px;
            border: none;
        }

        .event-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background-color: #fff;
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12), 0 6px 6px rgba(0, 0, 0, 0.19);
        }

        .card-title {
            color: #333;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card-text {
            color: #666;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .event-label {
            font-weight: bold;
            color: #007bff;
        }

        .card-body {
            padding: 1.5rem;
            background-color: #f9f9f9;
        }

        .text-center {
            text-align: center;
        }

        .shadow-sm {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .my-4 {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Additional styles specific to the calendar */
        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
    
    <!-- FullCalendar CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.css" rel='stylesheet' />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.css" rel='stylesheet' />
@stop

@section('scripts')
    @parent
    
    <!-- FullCalendar JavaScript via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'interaction'], 
                initialView: 'dayGridMonth', 
                events: [
                    @foreach($upcomingEvents as $event)
                    {
                        title: '{{ $event->name }}',
                        start: '{{ $event->date }}', 
                        description: '{{ $event->description }}',
                        location: '{{ $event->location }}',
                    },
                    @endforeach
                ],
                eventClick: function(info) {
                    var event = info.event;
                    var eventDetails = `
                        <h5>${event.title}</h5>
                        <p><strong>Date:</strong> ${event.start.toLocaleDateString()}</p>
                        <p><strong>Description:</strong> ${event.extendedProps.description}</p>
                        <p><strong>Location:</strong> ${event.extendedProps.location}</p>
                    `;
                    $('#eventModal .modal-body').html(eventDetails);
                    $('#eventModal').modal('show');
                }
            });

            calendar.render();
        });
    </script>
@stop

<!-- Example modal to show event details -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Event details will be dynamically inserted here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
