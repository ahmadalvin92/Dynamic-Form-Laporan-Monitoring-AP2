@extends('dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Monitoring Perangkat</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Monitoring Perangkat</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if (Session::has('pesanlaporanmonitoring'))
                                <div class="alert alert-success m-2 p-2" role="alert">
                                    {{ Session()->get('pesanlaporanmonitoring') }}
                                </div>
                            @endif
                            <form action="/add-monitoring-perangkat" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="idperangkat">ID Perangkat</label>
                                        <input type="text" name="idperangkat" class="form-control" id="idperangkat"
                                            placeholder="ID Perangkat" value={{ $perangkat }} readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="idlaporanmonitoring">ID Laporan Monitoring</label>
                                        <input type="text" name="idlaporanmonitoring" class="form-control"
                                            id="idlaporanmonitoring" placeholder="ID Laporan Monitoring"
                                            value="{{ $id_laporan_monitoring }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" id="lokasi"
                                            placeholder="Lokasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <textarea name="catatan" class="form-control" id="catatan" placeholder="Catatan"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" name="foto[]" class="form-control" id="foto" multiple>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type ="submit" id="btnLanjut" class="btn btn-primary">Lanjut</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
