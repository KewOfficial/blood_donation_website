@extends('layouts.adminltee')

@section('title', 'Manage Donors')

@section('content_header')
    <h1>Manage Donors</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Donors</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Blood Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donors as $donor)
                        <tr>
                            <td>{{ $donor->name }}</td>
                            <td>{{ $donor->email }}</td>
                            <td>{{ $donor->phone }}</td>
                            <td>{{ $donor->blood_type }}</td>
                            <td>
                                <a href="{{ route('donors.edit', $donor->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('donors.delete', $donor->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
