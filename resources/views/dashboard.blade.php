<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informarmasi Perangkat</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-black navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Navbar Title (Centered) -->
            <a href="#" class="navbar-brand mx-auto">
                Sistem Monitoring Perangkat
            </a>
        </nav>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link d-flex align-items-center">
                <img src="/dist/img/Angkasa_Pura_II_logo_2014.svg.png" alt="Angkasa Pura II"
                    class="brand-image img-fluid elevation-3" style="opacity: .8; max-height: 30px; margin: 0 auto;">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> Welcome, {{ Auth::user()->username }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/home" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        @auth
                            @if (Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-desktop"></i>
                                        <p>
                                            IT Non Public Service
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/laporanmonitoring/itnonpublic" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Data Perangkat</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/form-laporan-monitoring" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Form Perangkat</p>
                                            </a>
                                        </li>
                                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                            <li class="nav-item">
                                                <a href="/masterperangkat" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Master Data Perangkat</p>
                                                </a>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endauth
                        @auth
                            @if (Auth::user()->role == 1 || Auth::user()->role == 4 || Auth::user()->role == 5)
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-desktop"></i>
                                        <p>
                                            Data Network
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/laporanmonitoring/datanetwork" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Data Perangkat</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/form-laporan-monitoring" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Form Perangkat</p>
                                            </a>
                                        </li>
                                        @if (Auth::user()->role == 1 || Auth::user()->role == 4)
                                            <li class="nav-item">
                                                <a href="/masterperangkat" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Master Data Perangkat</p>
                                                </a>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endauth
                        @auth
                            @if (Auth::user()->role == 1 || Auth::user()->role == 6 || Auth::user()->role == 7)
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-desktop"></i>
                                        <p>
                                            IT AUCC/TOC
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/laporanmonitoring/itaucc" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Data Perangkat</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/form-laporan-monitoring" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Form Perangkat</p>
                                            </a>
                                        </li>
                                        @if (Auth::user()->role == 1 || Auth::user()->role == 6)
                                            <li class="nav-item">
                                                <a href="/masterperangkat" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Master Data Perangkat</p>
                                                </a>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endauth
                        @auth
                            @if (Auth::user()->role == 1)
                                <li class="nav-item">
                                    <a href="/usermanagement" class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            User
                                        </p>
                                    </a>
                                </li>
                            @endif
                        @endauth


                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Created By Vinsky,Delker,and Baswara
            </div>
            <!-- Default to the left -->
            <strong>Copyright © 2024 <a href="https://angkasapura2.co.id/id">Angkasa Pura
                    II CGK</a>.</strong> Seluruh hak cipta dilindungi.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
