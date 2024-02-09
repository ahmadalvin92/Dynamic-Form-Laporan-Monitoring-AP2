@extends('dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Master Data Perangkat</h1>
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
                            <form action="/addperangkat" method="post">
                                {{ csrf_field() }}

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="namaperangkat">Nama Perangkat</label>
                                        <input type="text" name="namaperangkat" class="form-control" id="namaperangkat"
                                            placeholder="Nama Perangkat">
                                    </div>

                                    <div class="form-group" id="keteranganContainer">
                                        <label for="keterangan">Keterangan</label>

                                        <!-- Initial pair of checkbox and text input -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" aria-label="Checkbox for following text input"
                                                        name="keteranganCheckbox[]">
                                                </div>
                                            </div>
                                            <input type="hidden" name="keteranganHidden[]" value="0">
                                            <input type="text" class="form-control" name="keteranganText[]"
                                                placeholder="Silahkan Klik Tombol Tambah Jika Ingin Menambahkan Keterangan"
                                                disabled>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-danger"
                                                    onclick="hapusInput(this)">Hapus</button>
                                            </div>
                                        </div>

                                        <!-- Tambah button -->
                                        <button type="button" class="btn btn-primary"
                                            onclick="tambahInput()">Tambah</button>
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

                <!-- Tabel Master Data -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Master Data Perangkat</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Perangkat</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($master_data_perangkat as $index => $perangkat)
                                            <tr id="perangkat-{{ $perangkat->id }}">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $perangkat->namaperangkat }}</td>
                                                <td>{{ $perangkat->keterangan }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="hapusBaris({{ $perangkat->id }})">Hapus</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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
        var inputCount = 1;

        function tambahInput() {
            inputCount++;
            var container = document.getElementById('keteranganContainer');
            var newInput = document.createElement('div');
            newInput.classList.add('input-group', 'mb-3');
            newInput.innerHTML = `
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="checkbox" aria-label="Checkbox for following text input" name="keteranganCheckbox[]">
            </div>
        </div>
        <input type="text" class="form-control" name="keterangan[]" id="keterangan-${inputCount}" placeholder="Silahkan Isi Keterangan (example = Bersihkan Rak Switch)">
        <div class="input-group-append">
            <button type="button" class="btn btn-danger" onclick="hapusInput(this)">Hapus</button>
        </div>
    `;
            container.insertBefore(newInput, container.lastElementChild);
        }



        function hapusInput(element) {
            var container = document.getElementById('keteranganContainer');
            container.removeChild(element.parentElement.parentElement);
        }

        function hapusBaris(perangkatId) {
            fetch(`/hapusperangkat/${perangkatId}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`perangkat-${perangkatId}`).remove();
                    } else {
                        alert('Gagal menghapus perangkat');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                });
        }
    </script>
@endsection
