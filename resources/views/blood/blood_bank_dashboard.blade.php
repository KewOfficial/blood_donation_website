@extends('layouts.adminltee')

@section('title', 'Blood Bank Management Dashboard')

@section('content_header')
    <div class="jumbotron jumbotron-fluid bg-primary text-white">
        <div class="container">
            <h1 class="display-4">Blood Bank Dashboard</h1>
            <p class="lead">Manage your blood bank efficiently with our comprehensive dashboard.</p>
        </div>
    </div>
@stop

@section('content')
    <!-- Dashboard Overview -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-4">
            <!-- Key Metrics and Alerts -->
            <div class="card bg-gradient-primary text-white mb-4">
                <div class="card-header">
                    <h3 class="card-title">Blood Bank Activity</h3>
                </div>
                <div class="card-body">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Upcoming Events</span>
                            <span class="info-box-number">{{ $bloodBankEvents->count() }}</span>
                        </div>
                    </div>
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-tint"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Blood Inventory</span>
                            <span class="info-box-number">450 units</span>
                        </div>
                    </div>
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="fas fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Recent Donor Activity</span>
                            <span class="info-box-number">20 donors</span>
                        </div>
                    </div>
                    <div class="card bg-gradient-danger mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Blood Shortage Alerts</h5>
                            <p class="card-text"><i class="fas fa-exclamation-triangle"></i> Type O Negative - Urgently needed!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Right Column -->
        <div class="col-lg-8">
            <!-- Search Bar -->
            <div class="d-flex justify-content-end mb-4">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <!-- Tabbed Sections -->
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="inventory-tab" data-toggle="tab" href="#inventory" role="tab" aria-controls="inventory" aria-selected="true">Blood Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="management-tab" data-toggle="tab" href="#management" role="tab" aria-controls="management" aria-selected="false">Manage Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="donor-tab" data-toggle="tab" href="#donor" role="tab" aria-controls="donor" aria-selected="false">Donor Management</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Blood Inventory -->
                <div class="tab-pane fade show active" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Blood Inventory Levels</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="bloodStockChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- Manage Inventory -->
                <div class="tab-pane fade" id="management" role="tabpanel" aria-labelledby="management-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage Inventory</h3>
                        </div>
                        <div class="card-body">
                            <!-- Inventory management form or table goes here -->
                        </div>
                    </div>
                </div>
                <!-- Donor Management -->
                <div class="tab-pane fade" id="donor" role="tabpanel" aria-labelledby="donor-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Donor Management</h3>
                        </div>
                        <div class="card-body">
                            <!-- Donor management table goes here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/dashboard-charts.js"></script>
@stop
