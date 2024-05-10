@extends('layouts.adminlte')

@section('title', 'Edit Appointment')

@section('content_header')
    <h1>Edit Appointment</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('blood.appointments.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Add form fields for editing appointment details -->
                <button type="submit" class="btn btn-primary">Update Appointment</button>
            </form>
        </div>
    </div>
@stop
