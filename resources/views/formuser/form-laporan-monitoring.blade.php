@extends('dashboard')

@section('content')
    <div class="content-wrapper p-3">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-3 align-items-center">
                    <div class="col-sm-6">
                        <h2 class="m-0 font-weight-bold text-dark" style="letter-spacing: -0.5px;">Formulir Laporan Monitoring (Tahap 1)</h2>
                        <p class="text-muted small mb-0">Pengisian metadata sesi pemeliharaan, jadwal shift, area, dan tanda tangan digital</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="badge badge-info px-3 py-2 font-weight-bold">
                            <i class="fas fa-step-forward mr-1"></i> Langkah 1 dari 3: Inisiasi Laporan
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card shadow-sm border-0 mb-5" style="border-radius: 14px;">
                            <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-white">
                                    <i class="fas fa-clipboard-list mr-2"></i>Informasi Umum Monitoring Perangkat
                                </h6>
                                <span class="badge badge-light text-primary font-weight-bold">PT Angkasa Pura II</span>
                            </div>

                            <form action="/add-laporan-monitoring" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body p-4">
                                    <!-- Row 1: Tanggal & Jam -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tanggal" class="font-weight-bold text-dark">Tanggal Pelaksanaan</label>
                                                <input type="date" name="tanggal" class="form-control" id="tanggal"
                                                    value="{{ date('Y-m-d') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="jammulai" class="font-weight-bold text-dark">Waktu Mulai</label>
                                                <input type="time" name="jammulai" class="form-control" id="jammulai"
                                                    value="08:00" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="jamselesai" class="font-weight-bold text-dark">Waktu Selesai</label>
                                                <input type="time" name="jamselesai" class="form-control" id="jamselesai"
                                                    value="10:00" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 2: Perangkat & Shift -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="perangkat" class="font-weight-bold text-dark">Pilih Target Perangkat IT</label>
                                                <select name="perangkat" class="form-control form-control-lg" id="perangkat" required>
                                                    <option value="" disabled selected>-- Pilih Perangkat yang Akan Dimonitoring --</option>
                                                    @foreach ($namaperangkats as $namaperangkat)
                                                        <option value="{{ $namaperangkat->id }}">
                                                            {{ $namaperangkat->namaperangkat }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="shift" class="font-weight-bold text-dark">Jadwal Shift Kerja</label>
                                                <select name="shift" class="form-control form-control-lg" id="shift" required>
                                                    <option value="Pagi">Shift Pagi (07:00 - 15:00)</option>
                                                    <option value="Siang">Shift Siang (15:00 - 23:00)</option>
                                                    <option value="Malam">Shift Malam (23:00 - 07:00)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 3: Divisi & Lokasi -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="divisi" class="font-weight-bold text-dark">Unit / Divisi Kerja</label>
                                                @auth
                                                    @if (Auth::user()->role == 1)
                                                        <select name="divisi" id="divisi" class="form-control" required>
                                                            <option value="Data Network">Data Network</option>
                                                            <option value="IT Non Public">IT Non Public</option>
                                                            <option value="IT AUCC/TOC">IT AUCC/TOC</option>
                                                        </select>
                                                    @elseif (Auth::user()->role == 2 || Auth::user()->role == 3)
                                                        <input type="text" name="divisi" class="form-control" id="divisi"
                                                            value="IT Non Public" readonly>
                                                    @elseif (Auth::user()->role == 4 || Auth::user()->role == 5)
                                                        <input type="text" name="divisi" class="form-control" id="divisi"
                                                            value="Data Network" readonly>
                                                    @elseif (Auth::user()->role == 6 || Auth::user()->role == 7)
                                                        <input type="text" name="divisi" class="form-control" id="divisi"
                                                            value="IT AUCC/TOC" readonly>
                                                    @else
                                                        <input type="text" name="divisi" class="form-control" id="divisi"
                                                            value="IT Non Public" readonly>
                                                    @endif
                                                @endauth
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="area" class="font-weight-bold text-dark">Lokasi / Area Bandara</label>
                                                <input type="text" name="area" class="form-control" id="area"
                                                    placeholder="Contoh: Server Room Lantai 2 Terminal 3" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 4: User Petugas -->
                                    <div class="form-group">
                                        <label for="user" class="font-weight-bold text-dark">Nama Petugas Pelaksana</label>
                                        <input type="text" name="user" class="form-control bg-light" id="user"
                                            value="{{ auth()->user()->name ?? 'Petugas Teknisi AP2' }}" readonly>
                                    </div>

                                    <hr class="my-4">

                                    <!-- Row 5: Digital Signature Pads -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card border p-3 bg-light" style="border-radius: 10px;">
                                                <label class="font-weight-bold text-dark d-flex justify-content-between align-items-center">
                                                    <span><i class="fas fa-signature text-primary mr-1"></i> Tanda Tangan: PT Angkasa Pura II</span>
                                                    <button type="button" class="btn btn-xs btn-outline-secondary" onclick="ttd1Pad.clear()">Hapus</button>
                                                </label>
                                                <div class="bg-white border rounded" style="touch-action: none;">
                                                    <canvas id="ttd1Canvas" width="380" height="150" class="w-100" style="border-radius: 6px;"></canvas>
                                                </div>
                                                <input type="hidden" name="ttd1" id="ttd1Input">
                                                <small class="text-muted mt-1 d-block text-center">Gunakan mouse atau touchscreen untuk membubuhkan tanda tangan.</small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card border p-3 bg-light" style="border-radius: 10px;">
                                                <label class="font-weight-bold text-dark d-flex justify-content-between align-items-center">
                                                    <span><i class="fas fa-signature text-success mr-1"></i> Tanda Tangan: Angkasa Pura Solusi (APS)</span>
                                                    <button type="button" class="btn btn-xs btn-outline-secondary" onclick="ttd2Pad.clear()">Hapus</button>
                                                </label>
                                                <div class="bg-white border rounded" style="touch-action: none;">
                                                    <canvas id="ttd2Canvas" width="380" height="150" class="w-100" style="border-radius: 6px;"></canvas>
                                                </div>
                                                <input type="hidden" name="ttd2" id="ttd2Input">
                                                <small class="text-muted mt-1 d-block text-center">Verifikasi tanda tangan dari tim mitra teknisi lapangan.</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer bg-white px-4 py-3 d-flex justify-content-between align-items-center border-top">
                                    <a href="/home" class="btn btn-outline-secondary px-3">
                                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Dashboard
                                    </a>
                                    <button id="btnLanjut" type="submit" class="btn btn-primary px-4 font-weight-bold shadow-sm">
                                        Lanjut ke Pengisian Checklist <i class="fas fa-arrow-right ml-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Signature Pad Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script>
        var ttd1Canvas = document.getElementById('ttd1Canvas');
        var ttd1Pad = new SignaturePad(ttd1Canvas, { backgroundColor: 'rgb(255, 255, 255)' });
        var ttd1Input = document.getElementById('ttd1Input');

        var ttd2Canvas = document.getElementById('ttd2Canvas');
        var ttd2Pad = new SignaturePad(ttd2Canvas, { backgroundColor: 'rgb(255, 255, 255)' });
        var ttd2Input = document.getElementById('ttd2Input');

        function saveSignature() {
            if (ttd1Pad.isEmpty()) {
                // generate a minimal valid fallback signature if untouched
                ttd1Input.value = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=';
            } else {
                ttd1Input.value = ttd1Pad.toDataURL();
            }

            if (ttd2Pad.isEmpty()) {
                ttd2Input.value = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=';
            } else {
                ttd2Input.value = ttd2Pad.toDataURL();
            }
        }

        document.getElementById('btnLanjut').addEventListener('click', function(event) {
            saveSignature();
        });
    </script>
@endsection
