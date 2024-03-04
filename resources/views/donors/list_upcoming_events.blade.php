@extends('layouts.adminlte')

@section('title', 'List of Upcoming Events')

@section('content_header')
    <h1>List of Upcoming Events</h1>
@stop

@section('content')
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
                    <form action="{{ route('donors.event_details', ['id' => $event->id]) }}" method="get">
                        <button type="submit" class="btn btn-info">Event Details</button>
                    </form>
                    <form action="{{ route('donors.registration_participation') }}" method="get">
                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                    <form action="{{ route('donors.countdown_timer', ['id' => $event->id]) }}" method="get">
                        <button type="submit" class="btn btn-warning">Countdown Timer</button>
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
@stop
