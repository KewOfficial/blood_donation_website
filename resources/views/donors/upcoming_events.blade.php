@extends('layouts.adminlte')

@section('title', 'List of Upcoming Events')

@section('content_header')
    <h1 class="text-center my-4">List of Upcoming Events</h1>
@stop

@section('content')
    <div class="container">
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

        /* Colors and Animations */
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
    </style>
@stop
