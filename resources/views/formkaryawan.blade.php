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
                            <form action="/addkaryawan" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="namaperangkat">Nama Perangkat</label>
                                        <select name="namaperangkat" class="form-control" id="namaperangkat">
                                            <option value="" disabled selected>Pilih Nama Perangkat</option>
                                            @foreach ($master_data_perangkat as $perangkat)
                                                <option value="{{ $perangkat->namaperangkat }}">
                                                    {{ $perangkat->namaperangkat }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <div id="keteranganOptions"></div> <!-- Container for radio buttons -->
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="status" value="ok"
                                                id="statusOk">
                                            <label class="form-check-label" for="statusOk">OK</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="status" value="not ok"
                                                id="statusNotOk">
                                            <label class="form-check-label" for="statusNotOk">Not OK</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <input type="text" name="catatan" class="form-control" id="catatan"
                                            placeholder="Catatan">
                                    </div>

                                    <div class="form-group">
                                        <label for="lampiran">Lampiran (Gambar)</label>
                                        <input type="file" name="lampiran" class="form-control-file" id="lampiran">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        // JavaScript to dynamically update checkboxes based on selected 'namaperangkat'
        document.getElementById('namaperangkat').addEventListener('change', function() {
            var selectedPerangkat = this.value;
            var keteranganOptionsContainer = document.getElementById('keteranganOptions');
            keteranganOptionsContainer.innerHTML = ''; // Clear previous options

            @foreach ($master_data_perangkat as $perangkat)
                if ('{{ $perangkat->namaperangkat }}' === selectedPerangkat) {
                    var keteranganArray = @json($perangkat->keterangan);

                    keteranganArray.forEach(function(keteranganItem) {
                        var checkboxLabel = document.createElement('label');
                        checkboxLabel.innerHTML =
                            '<input type="checkbox" name="selected_keterangan[]" value="' + keteranganItem +
                            '"> ' + keteranganItem;

                        // Mengatur gaya CSS untuk membuat input dan label menjadi kolom
                        checkboxLabel.style.display = 'block';

                        keteranganOptionsContainer.appendChild(checkboxLabel);
                    });
                }
            @endforeach
        });
    </script>
@endsection
