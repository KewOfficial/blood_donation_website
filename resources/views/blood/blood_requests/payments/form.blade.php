@extends('layouts.adminltee')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Payment Details</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('payments.process') }}">
                            @csrf

                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input id="amount" type="text" class="form-control" name="amount" value="{{ $invoice->amount }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="stripeToken">Card Details</label>
                                <input id="stripeToken" type="text" class="form-control" name="stripeToken" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Process Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
