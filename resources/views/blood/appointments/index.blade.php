@extends('layouts.adminlte')

@section('title', 'Manage Appointments')

@section('content_header')
    <h1>Manage Appointments</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Donor Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->donor->full_name }}</td>
                            <td>{{ $appointment->appointment_datetime->format('Y-m-d') }}</td>
                            <td>{{ $appointment->appointment_datetime->format('H:i A') }}</td>
                            <td>
                                <a href="{{ route('blood.appointments.show', $appointment->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('blood.appointments.edit', $appointment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('blood.appointments.destroy', $appointment->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
