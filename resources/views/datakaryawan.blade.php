{{-- panggil template dashboard --}}
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

                        @if (Session::has('pesan'))
                            <div class="alert alert-success m-2 p-2" role="alert">
                                {{ Session()->get('pesan') }}
                            </div>
                        @endif

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Data Perangkat</h3>
                    <div class="ml-auto mr-2">
                        <a href="formkaryawan" class="btn btn-primary">Tambah Perangkat</a>
                    </div>
                    <div>
                        <a href="generatepdf" class="btn btn-success">Generate PDF</a>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Perangkat</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Lampiran</th>
                                <th>Action</th> <!-- Add a new column for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_karyawan as $index => $karyawan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $karyawan->namaperangkat }}</td>
                                    <td>{{ $karyawan->keterangan }}</td>
                                    <td>{{ $karyawan->status }}</td>
                                    <td>{{ $karyawan->catatan }}</td>
                                    <td>
                                        @if ($karyawan->lampiran)
                                            <img src="{{ asset('storage/' . $karyawan->lampiran) }}" alt="Lampiran"
                                                style="max-width: 100px; max-height: 100px;">
                                        @else
                                            No Lampiran
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('deletekaryawan', $karyawan->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <a href="{{ route('editkaryawan', $karyawan->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
    </div>
    <!-- /.content-wrapper -->
@endsection
