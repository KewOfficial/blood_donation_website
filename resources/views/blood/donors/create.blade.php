@extends('layouts.adminltee')

@section('title', 'Add New Donor')

@section('content_header')
    <h1>Add New Donor</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('donors.add') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="blood_type">Blood Type</label>
                    <input type="text" class="form-control" id="blood_type" name="blood_type" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@stop
