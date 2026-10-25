@extends('dashboard')

@section('content')
    <div class="content-wrapper p-3">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-3 align-items-center">
                    <div class="col-sm-6">
                        <h2 class="m-0 font-weight-bold text-dark" style="letter-spacing: -0.5px;">Data Rekapitulasi Monitoring Perangkat</h2>
                        <p class="text-muted small mb-0">Arsip riwayat checklist dan inspeksi berkala perangkat IT operasional bandara</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="/form-laporan-monitoring" class="btn btn-primary px-3 shadow-sm font-weight-bold">
                            <i class="fas fa-plus-circle mr-1"></i> Tambah Monitoring Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark">
                            <i class="fas fa-table text-primary mr-2"></i>Tabel Laporan Monitoring Divisi
                        </h6>
                        <span class="badge badge-light border">Total: {{ count($datalaporanmonitoring) }} Data</span>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>Tanggal & Jam</th>
                                        <th>Shift</th>
                                        <th>Unit / Divisi</th>
                                        <th>Perangkat IT</th>
                                        <th>Area Lokasi</th>
                                        <th>Petugas</th>
                                        <th class="text-center" style="width: 220px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datalaporanmonitoring as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <strong>{{ $data->tanggal }}</strong><br>
                                                <small class="text-muted"><i class="far fa-clock mr-1"></i>{{ $data->jam }}</small>
                                            </td>
                                            <td>
                                                <span class="badge badge-secondary px-2 py-1">{{ $data->shift }}</span>
                                            </td>
                                            <td>
                                                @if($data->divisi == 'Data Network')
                                                    <span class="badge badge-primary px-2 py-1">{{ $data->divisi }}</span>
                                                @elseif($data->divisi == 'IT Non Public')
                                                    <span class="badge badge-info px-2 py-1">{{ $data->divisi }}</span>
                                                @else
                                                    <span class="badge badge-warning px-2 py-1 text-dark">{{ $data->divisi }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <strong class="text-dark">{{ $data->perangkat }}</strong>
                                            </td>
                                            <td>
                                                <small><i class="fas fa-map-marker-alt text-danger mr-1"></i>{{ $data->area }}</small>
                                            </td>
                                            <td>
                                                <span class="text-dark font-weight-bold">{{ $data->user }}</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="/laporanmonitoring-show/{{ $data->id }}"
                                                        class="btn btn-outline-primary" title="Lihat Rincian">
                                                        <i class="fas fa-eye"></i> Detail
                                                    </a>
                                                    <a href="/laporanmonitoring-createpdf/{{ $data->id }}"
                                                        class="btn btn-outline-success" title="Cetak PDF">
                                                        <i class="fas fa-file-pdf"></i> PDF
                                                    </a>
                                                    <form id="delete-form-{{ $data->id }}"
                                                        action="/delete-laporanmonitoring/{{ $data->id }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data laporan ini?')" title="Hapus">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-4 text-muted">
                                                <i class="fas fa-inbox mr-1"></i> Belum ada data laporan monitoring pada divisi ini.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
