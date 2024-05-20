@extends('layouts.adminltee')

@section('title', 'Edit Donor')

@section('content_header')
    <h1>Edit Donor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('donors.update', $donor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $donor->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $donor->email }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $donor->phone }}" required>
                </div>
                <div class="form-group">
                    <label for="blood_type">Blood Type</label>
                    <input type="text" class="form-control" id="blood_type" name="blood_type" value="{{ $donor->blood_type }}" required>
                </div>
                <!-- Add more fields as needed -->
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop
