@extends('dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Form Monitoring</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Perangkat</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="/add-laporan-monitoring" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="card-body">
                                    <!-- Kolom tanggal diisi secara otomatis -->


                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" id="tanggal"
                                            placeholder="Tanggal">
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="jammulai">Jam Mulai</label>
                                                <input type="time" name="jammulai" class="form-control" id="jammulai"
                                                    placeholder="Jam">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="jamselesai">Jam Selesai</label>
                                                <input type="time" name="jamselesai" class="form-control" id="jamselesai"
                                                    placeholder="Jam">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="perangkat">Nama Perangkat</label>
                                        <select name="perangkat" class="form-control" id="perangkat">
                                            <option value="" disabled selected>Pilih Nama Perangkat</option>
                                            @foreach ($namaperangkats as $namaperangkat)
                                                <option value="{{ $namaperangkat->id }}">
                                                    {{ $namaperangkat->namaperangkat }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    {{-- <div class="form-group">
                                                <label for="perangkat">Perangkat</label>
                                                <input type="text" name="perangkat" class="form-control" id="perangkat"
                                                    placeholder="Perangkat">
                                            </div> --}}

                                    <div class="form-group">
                                        <label for="shift">Shift</label>
                                        <select name="shift" class="form-control" id="shift">
                                            <option value="Pagi">Pagi</option>
                                            <option value="Siang">Siang</option>
                                            <option value="Sore">Sore</option>
                                            <option value="Malam">Malam</option>
                                        </select>
                                    </div>

                                    @auth
                                        @if (Auth::user()->role == 1)
                                            <div class="form-group">
                                                <label for="divisi">Unit</label>
                                                <input type="text" name="divisi" class="form-control" id="divisi" placeholder="Divisi">
                                            </div>
                                        @elseif (Auth::user()->role == 2 || Auth::user()->role == 3)
                                            <div class="form-group">
                                                <label for="divisi">Unit</label>
                                                <input type="text" name="divisi" class="form-control" id="divisi" placeholder="Divisi" value="IT Non Public" readonly>
                                            </div>
                                        @elseif (Auth::user()->role == 4 || Auth::user()->role == 5)
                                            <div class="form-group">
                                                <label for="divisi">Unit</label>
                                                <input type="text" name="divisi" class="form-control" id="divisi" placeholder="Divisi" value="Data Network" readonly>
                                            </div>
                                        @elseif (Auth::user()->role == 6 || Auth::user()->role == 7)
                                            <div class="form-group">
                                                <label for="divisi">Unit</label>
                                                <input type="text" name="divisi" class="form-control" id="divisi" placeholder="Divisi" value="IT AUCC/TOC" readonly>
                                            </div>
                                        @endif
                                    @endauth

                                    <div class="form-group">
                                        <label for="area">Lokasi</label>
                                        <input type="text" name="area" class="form-control" id="area"
                                            placeholder="Area">
                                    </div>

                                    <div class="form-group">
                                        <label for="user">User</label>
                                        <input type="text" name="user" class="form-control" id="user" placeholder="User"
                                            value="{{ auth()->user()->name }}" readonly>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ttd1">Angkasa Pura II</label>
                                                <div>
                                                    <!-- Signature Pad for TTD1 -->
                                                    <canvas id="ttd1Canvas" style="border: 1px solid #000;"></canvas>
                                                    <input type="hidden" name="ttd1" id="ttd1Input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ttd2">Angkasa Pura Solusi</label>
                                                <div>
                                                    <!-- Signature Pad for TTD2 -->
                                                    <canvas id="ttd2Canvas" style="border: 1px solid #000;"></canvas>
                                                    <input type="hidden" name="ttd2" id="ttd2Input">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button id="btnLanjut" type="submit" class="btn btn-primary">Lanjut</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Include Signature Pad Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

    <script>
        // Initialize Signature Pads
        var ttd1Canvas = document.getElementById('ttd1Canvas');
        var ttd1Pad = new SignaturePad(ttd1Canvas);
        var ttd1Input = document.getElementById('ttd1Input');

        var ttd2Canvas = document.getElementById('ttd2Canvas');
        var ttd2Pad = new SignaturePad(ttd2Canvas);
        var ttd2Input = document.getElementById('ttd2Input');

        // Save Signature as Base64 image
        function saveSignature() {
            ttd1Input.value = ttd1Pad.toDataURL();
            ttd2Input.value = ttd2Pad.toDataURL();
        }

        // Submit Form with Signatures
        document.getElementById('btnLanjut').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission
            saveSignature(); // Save signatures before form submission
            document.querySelector('form').submit(); // Submit the form
        });
    </script>
@endsection
