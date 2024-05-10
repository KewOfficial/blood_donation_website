@extends('layouts.adminltee')

@section('title', 'Edit Event')

@section('content')
<div class="container">
    <h1>Edit Event</h1>
    <form action="{{ route('bloodbank.events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date }}">
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="time" class="form-control" id="time" name="time" value="{{ $event->event_time }}">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ $event->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@stop
