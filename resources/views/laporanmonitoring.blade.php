@extends('dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Perangkat</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <div class="float-right">
                            <a href="/form-laporan-monitoring" class="btn btn-primary" >Tambah
                                Perangkat</a>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tanggal</th>
                                    <th>Shift</th>
                                    <th>Divisi</th>
                                    <th>Perangkat</th>
                                    <th>Area</th>
                                    <th>Jam</th>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ $i = 0 }}
                                @foreach ($datalaporanmonitoring as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->shift }}</td>
                                        <td>{{ $data->divisi }}</td>
                                        <td>{{ $data->perangkat }}</td>
                                        <td>{{ $data->area }}</td>
                                        <td>{{ $data->jam }}</td>
                                        <td>{{ $data->user }}</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this data?')) { document.getElementById('delete-form-{{$data->id}}').submit(); }">Delete</a>
                                            <form id="delete-form-{{$data->id}}" action="/delete-laporanmonitoring/{{$data->id}}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="/laporanmonitoring-show/{{$data->id}}" class="btn btn-primary btn-sm">Show</button></a>
                                            <a href="/laporanmonitoring-createpdf/{{$data->id}}" class="btn btn-success btn-sm">Generate
                                                pdf</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
