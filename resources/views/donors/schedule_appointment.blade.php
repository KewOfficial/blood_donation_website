@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width: 100%; margin: auto; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="card-header" style="background: linear-gradient(to right, #4e54c8, #8f94fb); color: #fff; border-top-left-radius: 10px; border-top-right-radius: 10px; padding: 15px;">{{ __('Schedule Appointment') }}</div>

                <div class="card-body" style="padding: 20px;">
                    <form method="POST" action="{{ route('submit_appointment') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="appointment_date" class="col-md-4 col-form-label text-md-right" style="font-size: 16px;">{{ __('Appointment Date') }}</label>

                            <div class="col-md-6">
                                <input id="appointment_date" type="date" class="form-control @error('appointment_date') is-invalid @enderror" name="appointment_date" value="{{ old('appointment_date') }}" required autocomplete="appointment_date" style="border-radius: 5px;">

                                @error('appointment_date')
                                    <span class="invalid-feedback" role="alert" style="font-size: 14px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="appointment_time" class="col-md-4 col-form-label text-md-right" style="font-size: 16px;">{{ __('Appointment Time') }}</label>

                            <div class="col-md-6">
                                <input id="appointment_time" type="time" class="form-control @error('appointment_time') is-invalid @enderror" name="appointment_time" value="{{ old('appointment_time') }}" required autocomplete="appointment_time" style="border-radius: 5px;">

                                @error('appointment_time')
                                    <span class="invalid-feedback" role="alert" style="font-size: 14px;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="font-size: 18px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    {{ __('Schedule Appointment') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
