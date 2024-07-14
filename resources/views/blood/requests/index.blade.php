@extends('layouts.adminltee')

@section('title', 'Blood Requests')

@section('content_header')
    <h1>Blood Requests</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Blood Requests</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hospital</th>
                        <th>Blood Type</th>
                        <th>Rh Factor</th>
                        <th>Units Required</th>
                        <th>Urgency</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bloodRequests as $request)
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->hospital->name }}</td>
                            <td>{{ $request->blood_type }}</td>
                            <td>{{ $request->rh_factor }}</td>
                            <td>{{ $request->units }}</td>
                            <td>{{ $request->urgency }}</td>
                            <td>{{ $request->status }}</td>
                            <td>
                                @if ($request->status == 'pending')
                                    <form action="{{ route('blood.requests.update', $request->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to mark this request as fulfilled?')">Mark as Fulfilled</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#cancelRequestModal{{ $request->id }}">Cancel</button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="cancelRequestModal{{ $request->id }}" tabindex="-1" aria-labelledby="cancelRequestModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="cancelRequestModalLabel">Cancel Blood Request</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to cancel this blood request?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Confirm Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
