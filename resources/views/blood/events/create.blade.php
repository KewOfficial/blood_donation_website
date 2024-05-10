@extends('layouts.adminltee')

@section('title', 'Create Blood Bank Event')

@section('content_header')
    <h1>Create Blood Bank Event</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Fill in the details</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('bloodbank.events.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Event Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Date and Time</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="date" name="date" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="time" class="form-control" id="time" name="time" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" required>
                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Create Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
