@extends('layouts.adminltee')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Blood Request</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('blood-requests.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="hospital_id">Hospital ID</label>
                                <input id="hospital_id" type="text" class="form-control" name="hospital_id" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="blood_type">Blood Type</label>
                                <input id="blood_type" type="text" class="form-control" name="blood_type" required>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" type="number" class="form-control" name="quantity" required>
                            </div>

                            <div class="form-group">
                                <label for="urgency">Urgency</label>
                                <select id="urgency" class="form-control" name="urgency" required>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
