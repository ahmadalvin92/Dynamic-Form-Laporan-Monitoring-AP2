@extends('dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Monitoring Checklist</h1>
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
                                <h3 class="card-title">Form Monitoring Checklist</h3>
                            </div>

                            @if (Session::has('pesanmonitoringperangkat'))
                                <div class="alert alert-success m-2 p-2" role="alert">
                                    {{ Session()->get('pesanmonitoringperangkat') }}
                                </div>
                            @endif

                            <form action="/add-monitoring-checklist" method="post">
                                {{ csrf_field() }}

                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Checklist</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($checklists as $key => $checklist)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $checklist->keterangan }}</td>
                                                    <td>
                                                        <input type="hidden" name="idlaporanmonitoring"
                                                            value="{{ $idlaporanmonitoring }}">
                                                        <input type="hidden" name="idmonitoringperangkat"
                                                            value="{{ $id_monitoring_perangkat }}">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="status[{{ $checklist->id }}]"
                                                                id="status{{ $checklist->id }}Ok" value="Ok">
                                                            <label class="form-check-label"
                                                                for="status{{ $checklist->id }}Ok">
                                                                Ok
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="status[{{ $checklist->id }}]"
                                                                id="status{{ $checklist->id }}NotOk" value="Not Ok">
                                                            <label class="form-check-label"
                                                                for="status{{ $checklist->id }}NotOk">
                                                                Not Ok
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
