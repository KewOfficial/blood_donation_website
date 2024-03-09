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
             
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Blood Donation</span>
            </a>
            
        <!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Schedule Appointments Menu Item -->
<li class="nav-item">
    <a href="{{ route('donors.schedule_appointment') }}" class="nav-link">
        <i class="nav-icon fas fa-calendar-plus"></i>
        <p>Schedule Appointments</p>
    </a>
</li>


        <!-- View Upcoming Events Menu Item -->
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>View Upcoming Events<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('donors.list_upcoming') }}" class="nav-link">
                        <i class="far fa-list-alt nav-icon"></i>
                        <p>List of Upcoming Events</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('donors.event_details', ['id' => 1]) }}" class="nav-link">
                        <i class="far fa-file-alt nav-icon"></i>
                        <p>Event Details</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('donors.registration_participation') }}" class="nav-link">
                        <i class="fas fa-user-plus nav-icon"></i>
                        <p>Registration/Participation</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('donors.countdown_timer', ['id' => 1]) }}" class="nav-link">
                        <i class="far fa-clock nav-icon"></i>
                        <p>Countdown Timer</p>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Donor Loyalty Program Menu Item -->
        <li class="nav-item">
            <a href="{{ route('donors.loyalty_program') }}" class="nav-link">
                <i class="fas fa-medal nav-icon"></i>
                <p>Donor Loyalty Program</p>
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
    

    @yield('scripts')
</body>
</html>
