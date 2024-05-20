
@extends('layouts.adminltee')

@section('content')
<div class="container">
    <h1>Search Donors</h1>
    <form action="{{ route('blood.bank.search.donors') }}" method="GET">
        <div class="form-group">
            <label for="query">Search</label>
            <input type="text" name="query" id="query" class="form-control" value="{{ request('query') }}">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <hr>
    <h2>Results</h2>
    @if($donors->isEmpty())
        <p>No donors found.</p>
    @else
        <ul class="list-group">
            @foreach($donors as $donor)
                <li class="list-group-item">
                    <strong>{{ $donor->full_name }}</strong> ({{ $donor->blood_type }})
                    <br>Email: {{ $donor->email }}
                    <br>Phone: {{ $donor->phone }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
