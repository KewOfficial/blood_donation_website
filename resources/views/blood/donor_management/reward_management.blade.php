@extends('layouts.adminltee')

@section('title', 'Reward Management')

@section('content_header')
    <h1>Manage Reward Tiers</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Reward Tier Management -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage Reward Tiers</h3>
                </div>
                <div class="card-body">
                    <h4>Reward Tier Information</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tier</th>
                                    <th>Benefits</th>
                                    <th>Criteria</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rewardTiers as $tier)
                                <tr>
                                    <td>{{ $tier->name }}</td>
                                    <td>{!! nl2br(e($tier->benefits)) !!}</td>
                                    <td>{{ $tier->criteria }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editTierModal-{{ $tier->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('reward_tiers.destroy', $tier->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reward tier?')">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal for editing tier -->
                                <div class="modal fade" id="editTierModal-{{ $tier->id }}" tabindex="-1" role="dialog" aria-labelledby="editTierModalLabel-{{ $tier->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editTierModalLabel-{{ $tier->id }}">Edit Tier</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('reward_tiers.update', $tier->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="edit_name-{{ $tier->id }}">Tier Name</label>
                                                        <input type="text" name="name" id="edit_name-{{ $tier->id }}" class="form-control" value="{{ $tier->name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edit_benefits-{{ $tier->id }}">Benefits</label>
                                                        <textarea name="benefits" id="edit_benefits-{{ $tier->id }}" class="form-control" rows="4" required>{{ $tier->benefits }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edit_criteria-{{ $tier->id }}">Criteria</label>
                                                        <input type="text" name="criteria" id="edit_criteria-{{ $tier->id }}" class="form-control" value="{{ $tier->criteria }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Add Reward Tier -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Reward Tier</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('reward_tiers.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tier Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="benefits">Benefits</label>
                            <textarea name="benefits" id="benefits" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="criteria">Criteria</label>
                            <input type="text" name="criteria" id="criteria" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Add Tier</button>
                    </form>
                </div>
            </div>
            <!-- Points Calculation and Update -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Points Calculation and Update</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('points.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="donor_id">Donor ID</label>
                            <input type="text" name="donor_id" id="donor_id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="total_donations">Total Donations</label>
                            <input type="number" name="total_donations" id="total_donations" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Points</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
