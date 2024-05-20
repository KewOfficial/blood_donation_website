<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blood Donation Network')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- AdminLTE CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <ul class="navbar-nav ml-auto">
        <!-- Logout form/button -->
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="nav-link">Logout</button>
            </form>
        </li>
    </ul>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('donor.dashboard') }}" class="brand-link">
                <span class="brand-text font-weight-light">Blood Donation</span>
            </a>
            
        <!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
            <a href="{{ route('donor.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i> 
                <p>Donor Dashboard</p>
            </a>
        </li>
        <!-- Schedule Appointments Menu Item -->
<li class="nav-item">
<a href="{{ route('schedule_appointment') }}" class="nav-link">
    <i class="nav-icon fas fa-calendar-plus"></i>
    <p>Schedule Appointments</p>
</a>

</li>
        <!-- View Upcoming Events Menu Item -->
<li class="nav-item">
    <a href="{{ route('donors.list_upcoming') }}" class="nav-link">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>Upcoming Events</p>
    </a>
</li>
 <!-- Lifeline Points Menu Item -->
 <li class="nav-item">
    <a href="{{ route('lifeline_points') }}" class="nav-link">
        <i class="nav-icon fas fa-heartbeat"></i>
        <p>Lifeline Points</p>
    </a>
</li>
</ul>
</nav>
<!-- /.sidebar-menu -->

        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          
            <div class="content-header">
                <div class="container-fluid">
                    @yield('content_header')
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
           
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @yield('scripts')
</body>
</html>
