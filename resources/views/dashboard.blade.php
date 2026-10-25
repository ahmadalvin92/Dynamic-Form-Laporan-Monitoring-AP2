<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Monitoring Perangkat - PT Angkasa Pura II</title>

    <!-- Google Font: Plus Jakarta Sans & Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">

    <style>
        :root {
            --ap2-blue: #0A3A82;
            --ap2-light-blue: #0072BD;
            --ap2-sky: #0284C7;
            --ap2-dark: #0f172a;
            --ap2-sidebar: #0B192C;
            --ap2-accent: #1E3E62;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Source Sans Pro', sans-serif !important;
            background-color: #f1f5f9;
            color: #1e293b;
        }

        .main-header.navbar {
            background: linear-gradient(90deg, #0A3A82 0%, #0072BD 100%) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 4px 12px rgba(10, 58, 130, 0.15);
        }

        .main-header .nav-link, 
        .main-header .navbar-brand {
            color: #ffffff !important;
            font-weight: 600;
        }

        .main-sidebar {
            background-color: var(--ap2-sidebar) !important;
            box-shadow: 2px 0 16px rgba(0, 0, 0, 0.12) !important;
        }

        .brand-link {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
            padding: 1rem 1rem !important;
            background: rgba(0, 0, 0, 0.15);
        }

        .user-panel {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
            padding: 0.85rem 0.5rem;
        }

        .user-panel .info a {
            font-weight: 600;
            color: #f8fafc !important;
            font-size: 0.95rem;
        }

        .nav-sidebar .nav-link {
            border-radius: 8px;
            margin-bottom: 4px;
            font-size: 0.9rem;
            font-weight: 500;
            color: #94a3b8 !important;
            transition: all 0.2s ease-in-out;
        }

        .nav-sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.08) !important;
            color: #ffffff !important;
            transform: translateX(3px);
        }

        .nav-sidebar .nav-link.active {
            background: linear-gradient(135deg, #0284c7 0%, #0072bd 100%) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 12px rgba(0, 114, 189, 0.35);
        }

        .content-wrapper {
            background-color: #f8fafc !important;
        }

        .card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            background-color: #ffffff;
        }

        .card-primary:not(.card-outline) > .card-header {
            background: linear-gradient(90deg, #0A3A82 0%, #0072BD 100%) !important;
            border-bottom: none;
            padding: 0.85rem 1.25rem;
        }

        .card-header .card-title {
            font-weight: 700;
            font-size: 1.05rem;
            color: #ffffff;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0072BD 0%, #0A3A82 100%) !important;
            border: none !important;
            border-radius: 8px;
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(0, 114, 189, 0.3);
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(0, 114, 189, 0.4);
        }

        .table thead th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-top: none;
            border-bottom: 2px solid #cbd5e1;
        }

        .badge-ap2 {
            background: #e0f2fe;
            color: #0369a1;
            font-weight: 600;
            padding: 0.35em 0.65em;
            border-radius: 6px;
        }

        .main-footer {
            border-top: 1px solid #e2e8f0;
            background: #ffffff;
            color: #64748b;
            font-size: 0.88rem;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block ml-2">
                    <span class="badge badge-light px-2 py-1 text-primary font-weight-bold">
                        <i class="fas fa-plane-departure mr-1"></i> Bandara Soekarno-Hatta (CGK)
                    </span>
                </li>
            </ul>

            <!-- Navbar Title (Centered) -->
            <a href="#" class="navbar-brand mx-auto font-weight-bold d-none d-md-block" style="font-size: 1.1rem; letter-spacing: 0.3px;">
                <i class="fas fa-shield-alt mr-2 text-warning"></i> SISTEM MONITORING & CHECKLIST PERANGKAT IT
            </a>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <span class="text-white-50 small mr-3 d-none d-lg-inline">
                        <i class="far fa-clock mr-1"></i> {{ date('d M Y') }}
                    </span>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="btn btn-sm btn-outline-light px-3 font-weight-bold" style="border-radius: 20px;">
                        <i class="fas fa-sign-out-alt mr-1"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/home" class="brand-link text-center d-flex flex-column align-items-center justify-content-center py-3">
                <img src="/dist/img/Angkasa_Pura_II_logo_2014.svg.png" alt="Angkasa Pura II"
                    class="brand-image img-fluid" style="max-height: 48px; margin: 0 auto; filter: brightness(1.2);">
                <div class="small font-weight-bold text-white-50 mt-2" style="letter-spacing: 1px;">
                    PT ANGKASA PURA II
                </div>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        <img src="{{ url('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-white font-weight-bold mb-0">
                            {{ Auth::user()->name ?? Auth::user()->username }}
                        </a>
                        <small class="badge badge-info" style="font-size: 0.7rem;">
                            {{ Auth::user()->unit ?? 'Staff IT AP2' }}
                        </small>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        
                        <li class="nav-item">
                            <a href="/home" class="nav-link {{ request()->is('home') || request()->is('/') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>Dashboard & Analitik</p>
                            </a>
                        </li>

                        @auth
                            @if (Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
                                <li class="nav-item has-treeview {{ request()->is('*itnonpublic*') ? 'menu-open' : '' }}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-server"></i>
                                        <p>
                                            IT Non Public
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/laporanmonitoring/itnonpublic" class="nav-link">
                                                <i class="far fa-circle nav-icon text-info"></i>
                                                <p>Data Monitoring</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/form-laporan-monitoring" class="nav-link">
                                                <i class="far fa-circle nav-icon text-primary"></i>
                                                <p>Form Monitoring</p>
                                            </a>
                                        </li>
                                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                            <li class="nav-item">
                                                <a href="/masterperangkat" class="nav-link">
                                                    <i class="far fa-circle nav-icon text-warning"></i>
                                                    <p>Master Perangkat</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endauth

                        @auth
                            @if (Auth::user()->role == 1 || Auth::user()->role == 4 || Auth::user()->role == 5)
                                <li class="nav-item has-treeview {{ request()->is('*datanetwork*') ? 'menu-open' : '' }}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-network-wired"></i>
                                        <p>
                                            Data Network
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/laporanmonitoring/datanetwork" class="nav-link">
                                                <i class="far fa-circle nav-icon text-info"></i>
                                                <p>Data Monitoring</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/form-laporan-monitoring" class="nav-link">
                                                <i class="far fa-circle nav-icon text-primary"></i>
                                                <p>Form Monitoring</p>
                                            </a>
                                        </li>
                                        @if (Auth::user()->role == 1 || Auth::user()->role == 4)
                                            <li class="nav-item">
                                                <a href="/masterperangkat" class="nav-link">
                                                    <i class="far fa-circle nav-icon text-warning"></i>
                                                    <p>Master Perangkat</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endauth

                        @auth
                            @if (Auth::user()->role == 1 || Auth::user()->role == 6 || Auth::user()->role == 7)
                                <li class="nav-item has-treeview {{ request()->is('*itaucc*') ? 'menu-open' : '' }}">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-video"></i>
                                        <p>
                                            IT AUCC / TOC
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="/laporanmonitoring/itaucc" class="nav-link">
                                                <i class="far fa-circle nav-icon text-info"></i>
                                                <p>Data Monitoring</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/form-laporan-monitoring" class="nav-link">
                                                <i class="far fa-circle nav-icon text-primary"></i>
                                                <p>Form Monitoring</p>
                                            </a>
                                        </li>
                                        @if (Auth::user()->role == 1 || Auth::user()->role == 6)
                                            <li class="nav-item">
                                                <a href="/masterperangkat" class="nav-link">
                                                    <i class="far fa-circle nav-icon text-warning"></i>
                                                    <p>Master Perangkat</p>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        @endauth

                        @auth
                            @if (Auth::user()->role == 1)
                                <li class="nav-header text-uppercase text-white-50 font-weight-bold mt-2" style="font-size: 0.75rem;">Administrasi Sistem</li>
                                <li class="nav-item">
                                    <a href="/usermanagement" class="nav-link {{ request()->is('usermanagement') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-users-cog"></i>
                                        <p>User Management</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/masterperangkat" class="nav-link {{ request()->is('masterperangkat') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-cogs"></i>
                                        <p>Konfigurasi Master Data</p>
                                    </a>
                                </li>
                            @endif
                        @endauth

                        <li class="nav-item mt-3">
                            <a href="/logout" class="nav-link text-danger">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Keluar Sistem</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('content')

        <!-- Main Footer -->
        <footer class="main-footer d-flex justify-content-between align-items-center">
            <div>
                <strong>Copyright © 2024 <a href="https://angkasapura2.co.id" class="text-primary font-weight-bold">PT Angkasa Pura II</a>.</strong> Seluruh hak cipta dilindungi.
            </div>
            <div class="d-none d-sm-inline text-muted small">
                Divisi Information & Communication Technology (ICT) Bandara Internasional Soekarno-Hatta
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
