@extends('layouts.adminlte')

@section('title', 'List of Upcoming Events')

@section('content_header')
    <h1>List of Upcoming Events</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if($upcomingEvents->count() > 0)
                <ul class="list-group">
                    @foreach($upcomingEvents as $event)
                        <li class="list-group-item event-item">
                            <div class="event-details">
                                <strong>{{ $event->name }}</strong><br>
                                <div class="event-info">
                                    <span class="event-label">Date:</span> {{ $event->date }}<br>
                                    <span class="event-label">Time:</span> {{ $event->time }}<br>
                                    <span class="event-label">Location:</span> {{ $event->location }}<br>
                                </div>
                                <span id="countdown-{{ $event->id }}" class="countdown"></span>
                            </div>
                            <div class="event-actions">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventDetailsModal{{ $event->id }}">
                                    View Details
                                </button>
                                <form action="{{ route('donors.event_details', ['id' => $event->id]) }}" method="get">
                                    <button type="submit" class="btn btn-info">Event Details</button>
                                </form>
                                <form action="{{ route('donors.registration_participation') }}" method="get">
                                    <button type="submit" class="btn btn-success">Register</button>
                                </form>
                                <form action="{{ route('donors.countdown_timer', ['id' => $event->id]) }}" method="get">
                                    <button type="submit" class="btn btn-warning">Countdown Timer</button>
                                </form>
                            </div>

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
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No upcoming events</p>
            @endif
        </div>
    </div>
@stop

@section('styles')
    <style>
        .event-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .event-details {
            flex: 70%;
        }

        .event-actions {
            flex: 30%;
            display: flex;
            justify-content: space-between;
        }

        .event-info {
            margin-top: 10px;
        }

        .event-label {
            font-weight: bold;
        }

        .countdown {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
    </style>
@stop
