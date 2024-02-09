{{-- resources/views/edit.blade.php --}}
@extends('dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Karyawan</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Karyawan</h3>
                            </div>
                            <form action="{{ route('updatekaryawan', $karyawan->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Input tersembunyi untuk menyimpan ID karyawan -->
                                <input type="hidden" name="id" value="{{ $karyawan->id }}">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="namaperangkat">Nama Perangkat</label>
                                        <input type="text" name="namaperangkat" class="form-control"
                                            value="{{ $karyawan->namaperangkat }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" required>{{ $karyawan->keterangan }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="ok" {{ $karyawan->status == 'ok' ? 'selected' : '' }}>Ok
                                            </option>
                                            <option value="not ok" {{ $karyawan->status == 'not ok' ? 'selected' : '' }}>Not
                                                Ok</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <textarea name="catatan" class="form-control">{{ $karyawan->catatan }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="lampiran">Lampiran</label>
                                        <input type="file" name="lampiran" class="form-control">
                                        @if ($karyawan->lampiran)
                                            <img src="{{ asset('storage/' . $karyawan->lampiran) }}" alt="Lampiran"
                                                style="max-width: 100px; max-height: 100px;">
                                        @endif
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
