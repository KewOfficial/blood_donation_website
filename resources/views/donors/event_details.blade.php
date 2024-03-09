@extends('layouts.adminlte')

@section('title', 'Event Details')

@section('content_header')
    <h1>Event Details</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($event)
                <!-- Event Details Content -->
                <h3>{{ $event->name }}</h3>
                <p><strong>Date:</strong> {{ $event->date }}</p>
                <p><strong>Time:</strong> {{ $event->time }}</p>
                <p><strong>Location:</strong> {{ $event->location }}</p>

                <!-- Purpose, Agenda, Special Guests -->
                <div class="event-details">
                    <h4>Details:</h4>
                    <p><strong>Purpose:</strong> {{ $event->purpose }}</p>
                    <p><strong>Agenda:</strong> {{ $event->agenda }}</p>
                    <p><strong>Special Guests:</strong> {{ $event->special_guests }}</p>
                </div>
            @else
                <p>Event not found.</p>
            @endif
        </div>
    </div>
@stop

@section('styles')
    <style>
       
        .card {
            margin-top: 20px;
        }

        .event-details {
            margin-top: 20px;
        }

        .event-details h4 {
            color: #4508EE; 
        }
    </style>
@stop
