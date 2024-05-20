@extends('layouts.adminltee')

@section('title', 'All Donors')

@section('content_header')
    <h1>All Donors</h1>
@stop

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Blood Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donors as $donor)
                    <tr>
                        <td>{{ $donor->id }}</td>
                        <td>{{ $donor->full_name }}</td>
                        <td>{{ $donor->email }}</td>
                        <td>{{ $donor->phone }}</td>
                        <td>{{ $donor->blood_type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
