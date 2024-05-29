<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <!-- Google Font: Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- Custom CSS -->
    @yield('css')
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .main-header .nav-link img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }
        .brand-link .brand-text {
            font-weight: 300;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #007bff;
            color: white;
        }
        .content-header h1 {
            font-weight: 500;
        }
        .nav-sidebar .nav-link p {
            font-weight: 400;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Notifications</span>
                    <!-- Notifications content goes here -->
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img src="user_profile.jpg" alt="Profile" class="img-circle elevation-2">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Profile</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a>
                    <a href="#" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Blood Bank</span>
        </a>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('blood.bank.dashboard') }}" class="nav-link{{ Request::is('blood-bank-dashboard') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blood.bank.upcoming.events') }}" class="nav-link{{ Request::is('blood-bank/upcoming-events') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>View Upcoming Events</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bloodbank.events.create') }}" class="nav-link{{ Request::is('bloodbank/events/create') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-calendar-plus"></i>
                        <p>Create Event</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Manage Donors <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- View Donors List -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>View Donors List</p>
                            </a>
                        </li>
                        <!-- Search Donors -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p>Search Donors</p>
                            </a>
                        </li>
                        <!-- Filter Donors -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-filter"></i>
                                <p>Filter Donors</p>
                            </a>
                        </li>
                        <!-- View Donor Details -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>View Donor Details</p>
                            </a>
                        </li>
                         <!-- Reward Management -->
                <li class="nav-item">
                    <a href="{{ route('reward_management.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-gift"></i>
                        <p>Reward Management</p>
                    </a>
                </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blood.manage_inventory') }}" class="nav-link{{ Request::is('blood/manage-inventory') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Manage Inventory</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Analytics and Reporting</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Alerts and Notifications</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Campaign Management</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </aside>
    <!-- /.sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content_header')
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
            Blood Bank Management System
        </div>
        <strong>&copy; 2024 <a href="{{ route('blood.bank.dashboard') }}">Blood Bank</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>
@yield('js')
</body>
</html>
