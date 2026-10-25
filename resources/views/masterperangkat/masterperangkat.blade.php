@extends('dashboard')

@section('content')
    <div class="content-wrapper p-3">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-3 align-items-center">
                    <div class="col-sm-6">
                        <h2 class="m-0 font-weight-bold text-dark" style="letter-spacing: -0.5px;">Master Data & Checklist Perangkat</h2>
                        <p class="text-muted small mb-0">Konfigurasi dinamis katalog perangkat keras dan parameter inspeksi checklist</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="badge badge-primary px-3 py-2 font-weight-bold" style="font-size: 0.85rem;">
                            <i class="fas fa-layer-group mr-1"></i> Mode Konfigurasi Master
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                @if (Session::has('pesanperangkat'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fas fa-check-circle mr-2"></i> {{ Session::get('pesanperangkat') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (Session::has('pesanchecklist'))
                    <div class="alert alert-info alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fas fa-info-circle mr-2"></i> {{ Session::get('pesanchecklist') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <!-- Column 1: Master Perangkat -->
                    <div class="col-lg-5">
                        <!-- Card Form Tambah Perangkat -->
                        <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                            <div class="card-header bg-primary text-white py-3 d-flex align-items-center">
                                <i class="fas fa-plus-circle mr-2"></i>
                                <h6 class="m-0 font-weight-bold text-white">Tambah Perangkat Baru</h6>
                            </div>
                            <form action="/addMasterperangkat" method="post">
                                @csrf
                                <input type="hidden" name="role" value="{{ Auth::user()->role ?? 2 }}">
                                
                                <div class="card-body p-4">
                                    <div class="form-group mb-0">
                                        <label for="namaperangkat" class="font-weight-bold text-dark">Nama / Model Perangkat</label>
                                        <input type="text" name="namaperangkat" class="form-control form-control-lg" id="namaperangkat"
                                            placeholder="Contoh: Core Switch Cisco Catalyst 9500" required>
                                        <small class="text-muted">Masukkan nama lengkap merek, tipe, atau kode aset perangkat.</small>
                                    </div>
                                </div>
                                <div class="card-footer bg-light px-4 py-3 text-right">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save mr-1"></i> Simpan Perangkat
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Card Tabel Daftar Perangkat -->
                        <div class="card shadow-sm border-0" style="border-radius: 12px;">
                            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-dark">
                                    <i class="fas fa-list text-primary mr-2"></i>Daftar Master Perangkat
                                </h6>
                                <span class="badge badge-light border">{{ count($masterperangkat) }} Terdaftar</span>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 50px;">#</th>
                                                <th>Nama Perangkat</th>
                                                <th class="text-center" style="width: 80px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($masterperangkat as $index => $perangkat)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <strong class="text-dark">{{ $perangkat->namaperangkat }}</strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="/hapusperangkat/{{ $perangkat->id }}"
                                                            class="btn btn-outline-danger btn-sm"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus perangkat ini?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center text-muted py-4">Belum ada perangkat terdaftar.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2: Master Checklist -->
                    <div class="col-lg-7">
                        <!-- Card Form Tambah Checklist -->
                        <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                            <div class="card-header bg-info text-white py-3 d-flex align-items-center">
                                <i class="fas fa-tasks mr-2"></i>
                                <h6 class="m-0 font-weight-bold text-white">Tambah Parameter Checklist Baru</h6>
                            </div>
                            <form action="/addMasterchecklist" method="post">
                                @csrf
                                <input type="hidden" name="role" value="{{ Auth::user()->role ?? 2 }}">

                                <div class="card-body p-4">
                                    <div class="form-group mb-3">
                                        <label for="idperangkat" class="font-weight-bold text-dark">Pilih Target Perangkat</label>
                                        <select name="idperangkat" class="form-control form-control-lg" id="idperangkat" required>
                                            <option value="" disabled selected>-- Pilih Perangkat yang Akan Dikonfigurasi --</option>
                                            @foreach ($namaperangkats as $namaperangkat)
                                                <option value="{{ $namaperangkat->namaperangkat }}">
                                                    {{ $namaperangkat->namaperangkat }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-0">
                                        <label for="keterangan" class="font-weight-bold text-dark">Item / Parameter Checklist</label>
                                        <input type="text" name="keterangan" class="form-control form-control-lg" id="keterangan"
                                            placeholder="Contoh: Pemeriksaan Redundancy Dual Power Supply & Fan" required>
                                        <small class="text-muted">Parameter checklist yang wajib diverifikasi kondisi OK / NOT OK oleh teknisi.</small>
                                    </div>
                                </div>
                                <div class="card-footer bg-light px-4 py-3 text-right">
                                    <button type="submit" class="btn btn-info px-4 font-weight-bold text-white">
                                        <i class="fas fa-plus mr-1"></i> Tambah Item Checklist
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Card Tabel Daftar Checklist -->
                        <div class="card shadow-sm border-0" style="border-radius: 12px;">
                            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-dark">
                                    <i class="fas fa-clipboard-list text-info mr-2"></i>Daftar Master Checklist Aktif
                                </h6>
                                <span class="badge badge-light border">{{ count($checklists) }} Parameter</span>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped align-middle mb-0">
                                        <thead>
                                            <tr>
                                                <th style="width: 50px;">#</th>
                                                <th>Perangkat Terkait</th>
                                                <th>Parameter Pemeriksaan (Checklist)</th>
                                                <th class="text-center" style="width: 80px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($checklists as $index => $checklist)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <span class="badge badge-primary px-2 py-1 font-weight-bold">
                                                            {{ optional($checklist->masterperangkat)->namaperangkat ?? 'Perangkat' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="text-dark font-weight-bold">{{ $checklist->keterangan }}</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="/hapuschecklist/{{ $checklist->id }}"
                                                            class="btn btn-outline-danger btn-sm"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus checklist ini?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted py-4">Belum ada item checklist terdaftar.</td>
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
        </div>
    </div>
@endsection
