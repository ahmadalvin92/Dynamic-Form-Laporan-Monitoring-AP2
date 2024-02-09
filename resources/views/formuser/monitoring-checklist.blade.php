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

                                    @foreach ($checklists as $checklist)
                                        {{ $checklist->keterangan }}<br>
                                    @endforeach


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
