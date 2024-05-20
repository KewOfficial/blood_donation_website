@extends('layouts.adminltee')

@section('title', 'Search Donors')

@section('content_header')
    <h1>Search Donors</h1>
@stop

@section('content')
    <form action="{{ route('blood.bank.search.donors') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="query" class="form-control" placeholder="Search by name, email, or blood type">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </div>
    </form>
    <h2>Search Results</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Blood Type</th>
                <!-- Add other columns here -->
            </tr>
        </thead>
        <tbody>
            @foreach($donors as $donor)
                <tr>
                    <td>{{ $donor->name }}</td>
                    <td>{{ $donor->email }}</td>
                    <td>{{ $donor->phone }}</td>
                    <td>{{ $donor->blood_type }}</td>
                    <!-- Add other columns here -->
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
