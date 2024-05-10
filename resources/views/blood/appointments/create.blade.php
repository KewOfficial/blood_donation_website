@extends('layouts.adminlte')

@section('title', 'Create Appointment')

@section('content_header')
    <h1>Create Appointment</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('blood.appointments.store') }}" method="POST">
                @csrf
                <!-- Add form fields for creating a new appointment -->
                <button type="submit" class="btn btn-primary">Create Appointment</button>
            </form>
        </div>
    </div>
@stop
