
@extends('layouts.adminlte')

@section('title', 'View Activities')

@section('content_header')
    <h1 class="mb-3">View Activities</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title text-white">Your Activities</h3>
        </div>
        <div class="card-body">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Blood Donation Event</h5>
                        <small>2 days ago</small>
                    </div>
                    <p class="mb-1">Participated in the blood donation event at Mwanga Plaza.</p>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Referral Bonus</h5>
                        <small>1 week ago</small>
                    </div>
                    <p class="mb-1">Earned bonus points for referring a friend to donate blood.</p>
                </a>
              
            </div>
        </div>
    </div>
@stop

@section('sidebar')
    
@stop

@section('scripts')
   
@stop
