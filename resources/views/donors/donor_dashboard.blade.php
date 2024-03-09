@extends('layouts.adminlte')

@section('title', 'Donor Dashboard')

@section('content_header')
    <h1>Donor Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">

                <div class="card-header">
                    <h3 class="card-title">Schedule Appointments</h3>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
                <div class="card-header">
                    <h3 class="card-title">Upcoming Events</h3>
                </div>
                <div class="card-body">
                    @if($upcomingEvents->count() > 0)
                        <ul>
                            @foreach($upcomingEvents as $event)
                                <li>
                                    <strong>{{ $event->name }}</strong><br>
                                    Date: {{ $event->date }}<br>
                                    Time: {{ $event->time }}<br>
                                    Location: {{ $event->location }}<br>
                                    <span id="countdown-{{ $event->id }}"></span><br>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventDetailsModal{{ $event->id }}">
                                        View Details
                                    </button>
                                    <form action="{{ route('event.register', ['id' => $event->id]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Register</button>
                                    </form>
                                </li>
                                </div>
                            @endforeach
                        </ul>
                    @else
                        <p>No upcoming events</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('sidebar')
    @parent
    <!-- Sidebar Menu -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Blood Donation</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- /.Main Sidebar Container -->
@stop

@section('scripts')
  
@stop
