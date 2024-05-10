@extends('layouts.adminltee')

@section('title', 'Upcoming Events')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-4">Upcoming Events</h2>
        </div>
    </div>

    <div class="row">
        @foreach($bloodBankEvents as $event)
            <div class="col-md-6 mb-4">
                <div class="card event-card shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text"><i class="fas fa-calendar-alt"></i> {{ $event->date }}</p>
                        <p class="card-text"><i class="fas fa-clock"></i> {{ $event->event_time }}</p> <!-- Add event time -->
                        <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $event->location }}</p>
                        <p class="card-text">{{ $event->description }}</p>
                        <!-- Edit/Delete Events Buttons -->
                        <div class="text-center mt-3">
                            <a href="{{ route('bloodbank.events.edit', $event->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                            <form action="{{ route('bloodbank.events.destroy', $event->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@stop

@section('css')
<!-- Custom CSS -->
<style>
    .event-card {
        transition: transform 0.3s ease-in-out;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        background-color: #fff;
    }

    .event-card:hover {
        transform: scale(1.05);
    }

    .card-title {
        color: #333;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .card-text {
        color: #666;
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #bd2130;
        border-color: #bd2130;
    }
</style>
@stop
