@extends('dashboard')

@section('content')
    <div class="content-wrapper p-3">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row align-items-center mb-3">
                    <div class="col-sm-6">
                        <h2 class="m-0 font-weight-bold text-dark" style="letter-spacing: -0.5px;">Dashboard Monitoring Operasional</h2>
                        <p class="text-muted small mb-0">Pemantauan & Rekapitulasi Pemeliharaan Perangkat IT Bandara Soekarno-Hatta (CGK)</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="/form-laporan-monitoring" class="btn btn-primary px-3 shadow-sm">
                            <i class="fas fa-plus-circle mr-1"></i> Input Laporan Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="container-fluid">
                
                <!-- Stat Cards -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-white p-3 border shadow-sm" style="border-radius: 12px; border-left: 5px solid #0072BD !important;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-muted small text-uppercase font-weight-bold">Total Laporan</div>
                                    <h3 class="font-weight-bold text-dark mb-0 mt-1">{{ $totalReports ?? 4 }}</h3>
                                    <span class="text-success small font-weight-bold"><i class="fas fa-arrow-up mr-1"></i> Terverifikasi</span>
                                </div>
                                <div class="bg-light p-3 rounded-circle text-primary" style="font-size: 1.5rem;">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-white p-3 border shadow-sm" style="border-radius: 12px; border-left: 5px solid #10b981 !important;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-muted small text-uppercase font-weight-bold">Perangkat Master</div>
                                    <h3 class="font-weight-bold text-dark mb-0 mt-1">{{ $totalDevices ?? 12 }}</h3>
                                    <span class="text-muted small">3 Unit Kerja</span>
                                </div>
                                <div class="bg-light p-3 rounded-circle text-success" style="font-size: 1.5rem;">
                                    <i class="fas fa-network-wired"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-white p-3 border shadow-sm" style="border-radius: 12px; border-left: 5px solid #f59e0b !important;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-muted small text-uppercase font-weight-bold">Health Index</div>
                                    <h3 class="font-weight-bold text-dark mb-0 mt-1">99.4%</h3>
                                    <span class="text-success small font-weight-bold"><i class="fas fa-check-circle mr-1"></i> Operasional Prima</span>
                                </div>
                                <div class="bg-light p-3 rounded-circle text-warning" style="font-size: 1.5rem;">
                                    <i class="fas fa-heartbeat"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-white p-3 border shadow-sm" style="border-radius: 12px; border-left: 5px solid #8b5cf6 !important;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-muted small text-uppercase font-weight-bold">Divisi Aktif</div>
                                    <h3 class="font-weight-bold text-dark mb-0 mt-1">3 Unit</h3>
                                    <span class="text-muted small">Non Public, Network, AUCC</span>
                                </div>
                                <div class="bg-light p-3 rounded-circle text-purple" style="font-size: 1.5rem; color: #8b5cf6;">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="row mt-2">
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-dark">
                                    <i class="fas fa-chart-bar text-primary mr-2"></i>Frekuensi Monitoring per Divisi
                                </h6>
                                <span class="badge badge-light border text-muted">Periode Berjalan</span>
                            </div>
                            <div class="card-body p-4">
                                <canvas id="divisionChart" height="110"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                            <div class="card-header bg-white py-3 border-bottom">
                                <h6 class="m-0 font-weight-bold text-dark">
                                    <i class="fas fa-pie-chart text-success mr-2"></i>Status Kepatuhan Checklist
                                </h6>
                            </div>
                            <div class="card-body p-4 text-center">
                                <canvas id="complianceChart" height="230"></canvas>
                                <div class="mt-3 text-muted small">
                                    <span class="mr-3"><i class="fas fa-circle text-success mr-1"></i> OK (Normal)</span>
                                    <span><i class="fas fa-circle text-danger mr-1"></i> NOT OK (Tindak Lanjut)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm border-0" style="border-radius: 12px;">
                            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-dark">
                                    <i class="fas fa-history text-info mr-2"></i>Log Laporan Monitoring Terkini
                                </h6>
                                <a href="/laporanmonitoringdata" class="text-primary font-weight-bold small">Lihat Semua Data →</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal & Jam</th>
                                                <th>Shift</th>
                                                <th>Unit / Divisi</th>
                                                <th>Perangkat</th>
                                                <th>Lokasi Spesifik</th>
                                                <th>Petugas (User)</th>
                                                <th>Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($recentReports) && count($recentReports) > 0)
                                                @foreach($recentReports as $index => $rep)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>
                                                            <strong>{{ $rep->tanggal }}</strong><br>
                                                            <small class="text-muted">{{ $rep->jam }}</small>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-secondary px-2 py-1">{{ $rep->shift }}</span>
                                                        </td>
                                                        <td>
                                                            @if($rep->divisi == 'Data Network')
                                                                <span class="badge badge-primary px-2 py-1">{{ $rep->divisi }}</span>
                                                            @elseif($rep->divisi == 'IT Non Public')
                                                                <span class="badge badge-info px-2 py-1">{{ $rep->divisi }}</span>
                                                            @else
                                                                <span class="badge badge-warning px-2 py-1 text-dark">{{ $rep->divisi }}</span>
                                                            @endif
                                                        </td>
                                                        <td><strong>{{ $rep->perangkat }}</strong></td>
                                                        <td><small><i class="fas fa-map-marker-alt text-danger mr-1"></i>{{ $rep->area }}</small></td>
                                                        <td>{{ $rep->user }}</td>
                                                        <td><span class="badge badge-success px-2 py-1"><i class="fas fa-check mr-1"></i> Lengkap</span></td>
                                                        <td class="text-center">
                                                            <a href="/laporanmonitoring-show/{{ $rep->id }}" class="btn btn-sm btn-outline-primary mr-1" title="Detail">
                                                                <i class="fas fa-eye"></i> Detail
                                                            </a>
                                                            <a href="/laporanmonitoring-createpdf/{{ $rep->id }}" class="btn btn-sm btn-outline-success" title="PDF">
                                                                <i class="fas fa-file-pdf"></i> PDF
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>1</td>
                                                    <td><strong>2024-10-25</strong><br><small class="text-muted">08:00 - 09:30</small></td>
                                                    <td><span class="badge badge-secondary px-2 py-1">Pagi</span></td>
                                                    <td><span class="badge badge-primary px-2 py-1">Data Network</span></td>
                                                    <td><strong>Core Switch Cisco Catalyst 9500</strong></td>
                                                    <td><small><i class="fas fa-map-marker-alt text-danger mr-1"></i>Server Room Lt. 2 T3</small></td>
                                                    <td>Bryan Bonifasius</td>
                                                    <td><span class="badge badge-success px-2 py-1"><i class="fas fa-check mr-1"></i> Lengkap</span></td>
                                                    <td class="text-center">
                                                        <a href="/laporanmonitoring-show/1" class="btn btn-sm btn-outline-primary mr-1"><i class="fas fa-eye"></i> Detail</a>
                                                        <a href="/laporanmonitoring-createpdf/1" class="btn btn-sm btn-outline-success"><i class="fas fa-file-pdf"></i> PDF</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><strong>2024-10-25</strong><br><small class="text-muted">13:00 - 14:15</small></td>
                                                    <td><span class="badge badge-secondary px-2 py-1">Siang</span></td>
                                                    <td><span class="badge badge-warning px-2 py-1 text-dark">IT AUCC/TOC</span></td>
                                                    <td><strong>CCTV PTZ Apron Hikvision DS-2DF8425</strong></td>
                                                    <td><small><i class="fas fa-map-marker-alt text-danger mr-1"></i>Pole P-12 Apron T3</small></td>
                                                    <td>Nathan</td>
                                                    <td><span class="badge badge-success px-2 py-1"><i class="fas fa-check mr-1"></i> Lengkap</span></td>
                                                    <td class="text-center">
                                                        <a href="/laporanmonitoring-show/2" class="btn btn-sm btn-outline-primary mr-1"><i class="fas fa-eye"></i> Detail</a>
                                                        <a href="/laporanmonitoring-createpdf/2" class="btn btn-sm btn-outline-success"><i class="fas fa-file-pdf"></i> PDF</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Division Bar Chart
        const ctxDivision = document.getElementById('divisionChart').getContext('2d');
        new Chart(ctxDivision, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels ?? ['IT Non Public', 'Data Network', 'IT AUCC/TOC']) !!},
                datasets: [{
                    label: 'Jumlah Monitoring Terverifikasi',
                    data: {!! json_encode($divisionCounts ?? [12, 18, 15]) !!},
                    backgroundColor: [
                        'rgba(0, 114, 189, 0.8)',
                        'rgba(14, 165, 233, 0.8)',
                        'rgba(245, 158, 11, 0.8)'
                    ],
                    borderColor: [
                        '#0072BD',
                        '#0EA5E9',
                        '#F59E0B'
                    ],
                    borderWidth: 2,
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 2 }
                    }
                }
            }
        });

        // Compliance Donut Chart
        const ctxComp = document.getElementById('complianceChart').getContext('2d');
        new Chart(ctxComp, {
            type: 'doughnut',
            data: {
                labels: ['OK (Normal)', 'NOT OK (Tindak Lanjut)'],
                datasets: [{
                    data: [98.6, 1.4],
                    backgroundColor: ['#10b981', '#ef4444'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
@endsection
