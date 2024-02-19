{{-- panggil template dashbaard --}}
@extends('dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Form Master Perangkat</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Master Perangkat</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if (Session::has('pesanperangkat'))
                                <div class="alert alert-success m-2 p-2" role="alert">
                                    {{ Session()->get('pesanperangkat') }}
                                </div>
                            @endif
                            <form action="/addMasterperangkat" method="post">
                                {{ csrf_field() }}

                                <div class="card-body">

                                    <input type="text" name="role" class="form-control"
                                        value="{{ Auth::user()->role }}" readonly>

                                    <div class="form-group">
                                        <label for="namaperangkat">Nama Perangkat</label>
                                        <input type="text" name="namaperangkat" class="form-control" id="namaperangkat"
                                            placeholder="Masukkan Nama Perangkat">
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($masterperangkat as $index => $perangkat)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>
                                                                {{ $perangkat->namaperangkat }}
                                                            </td>
                                                            <td>
                                                                <a href="/hapusperangkat/{{ $perangkat->id }}"
                                                                    class="btn btn-danger">Hapus</a>
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
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Master Checklist</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if (Session::has('pesanchecklist'))
                                <div class="alert alert-success m-2 p-2" role="alert">
                                    {{ Session()->get('pesanchecklist') }}
                                </div>
                            @endif
                            <form action="/addMasterchecklist" method="post">
                                {{ csrf_field() }}

                                <div class="card-body">

                                    <input type="text" name="role" class="form-control"
                                        value="{{ Auth::user()->role }}" readonly>

                                    <div class="form-group">
                                        <label for="idperangkat">Nama Perangkat</label>
                                        <select name="idperangkat" class="form-control" id="idperangkat">
                                            <option value="" disabled selected>Pilih Nama Perangkat</option>
                                            @foreach ($namaperangkats as $namaperangkat)
                                                <option value="{{ $namaperangkat->namaperangkat }}">
                                                    {{ $namaperangkat->namaperangkat }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <div id="keteranganContainer">
                                            <!-- Existing input for Keterangan -->
                                            <input type="text" name="keterangan" class="form-control" id="keterangan"
                                                placeholder="Masukkan Keterangan">
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Master Data Checklist</h3>
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
                                                    @foreach ($checklists as $index => $checklist)
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>
                                                            {{ optional($checklist->masterperangkat)->namaperangkat }}
                                                        </td>
                                                        <td>{{ $checklist->keterangan }}</td>
                                                        <td>
                                                            <a href="/hapuschecklist/{{ $checklist->id }}"
                                                                class="btn btn-danger">Hapus</a>
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
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
        <!-- Tabel Master Data Checklist -->

    </div>
    <!-- /.content-wrapper -->
@endsection
