@extends('dashboard')

@section('content')
    <div class="content-wrapper p-3">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-3 align-items-center">
                    <div class="col-sm-6">
                        <h2 class="m-0 font-weight-bold text-dark" style="letter-spacing: -0.5px;">Formulir Checklist Perangkat (Tahap 3)</h2>
                        <p class="text-muted small mb-0">Verifikasi kondisi operasional setiap item parameter checklist (OK / NOT OK)</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="badge badge-success px-3 py-2 font-weight-bold">
                            <i class="fas fa-check-double mr-1"></i> Langkah Terakhir: Verifikasi Checklist
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        @if (Session::has('pesanmonitoringperangkat'))
                            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                                <i class="fas fa-check-circle mr-2"></i> {{ Session::get('pesanmonitoringperangkat') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card shadow-sm border-0 mb-5" style="border-radius: 14px;">
                            <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-white">
                                    <i class="fas fa-tasks mr-2"></i>Daftar Parameter Checklist Perangkat
                                </h6>
                                <span class="badge badge-light text-primary font-weight-bold">
                                    Total: {{ count($checklists) }} Parameter
                                </span>
                            </div>

                            <form action="/add-monitoring-checklist" method="post">
                                @csrf
                                <input type="hidden" name="idlaporanmonitoring" value="{{ $idlaporanmonitoring }}">
                                <input type="hidden" name="idmonitoringperangkat" value="{{ $id_monitoring_perangkat }}">

                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50px;">#</th>
                                                    <th>Parameter Item Checklist</th>
                                                    <th class="text-center" style="width: 250px;">Status Kondisi Fisik / Sistem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($checklists as $key => $checklist)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>
                                                            <div class="font-weight-bold text-dark">{{ $checklist->keterangan }}</div>
                                                            <small class="text-muted">Perangkat ID: {{ $checklist->idperangkat }} | Ref Checklist #{{ $checklist->id }}</small>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                                <label class="btn btn-outline-success btn-sm active px-3 font-weight-bold">
                                                                    <input type="radio" name="status[{{ $checklist->id }}]" value="OK" checked>
                                                                    <i class="fas fa-check mr-1"></i> OK (Normal)
                                                                </label>
                                                                <label class="btn btn-outline-danger btn-sm px-3 font-weight-bold">
                                                                    <input type="radio" name="status[{{ $checklist->id }}]" value="NOT OK">
                                                                    <i class="fas fa-times mr-1"></i> NOT OK
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center py-4 text-muted">
                                                            <i class="fas fa-info-circle mr-1"></i> Belum ada master checklist yang dikonfigurasi untuk perangkat ini.
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-footer bg-white px-4 py-3 d-flex justify-content-between align-items-center border-top">
                                    <a href="/home" class="btn btn-outline-secondary px-3">
                                        <i class="fas fa-times mr-1"></i> Batalkan
                                    </a>
                                    <button type="submit" class="btn btn-success px-4 font-weight-bold shadow-sm">
                                        <i class="fas fa-check-circle mr-1"></i> Selesaikan & Simpan Laporan Monitoring
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
