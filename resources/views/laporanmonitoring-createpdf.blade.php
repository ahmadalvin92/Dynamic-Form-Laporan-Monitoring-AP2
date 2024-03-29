<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/pdf/app.css') }}">
</head>

<body>
    <div class="wrapper mx-auto">
        <!-- Main content -->
        <section class="">
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table>
                        <thead>
                            <!-- Header Tabel -->
                            <tr>
                                <th><img src="{{ url('/logo/Logo.svg') }}" alt="Example Image"></th>
                                <th>KEGIATAN PREVENTIVE
                                    MAINTENANCE<br>{{ $dataperangkat->masterperangkat->namaperangkat }}</th>
                                <th><img src="{{ url('/logo/Logo2.jpg') }}" alt="Example Image"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Keterangan Tabel -->
                            <tr>
                                <td class="deskripsi">Hari / Tanggal</td>
                                <td>: {{ $datadetail->tanggal }}</td>
                            </tr>
                            <tr>
                                <td class="deskripsi">Shift Kerja</td>
                                <td>: {{ $datadetail->shift }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="deskripsi">Team/Regu</td>
                                <td>: {{ $datadetail->divisi }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="deskripsi">Perangkat</td>
                                <td>: {{ $dataperangkat->masterperangkat->namaperangkat }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="deskripsi">Lokasi</td>
                                <td>: {{ $datadetail->area }}</td>
                                <td></td>
                            </tr>
                            <tr style="border-bottom: 1px solid black; border-collapse: collapse;">
                                <td class="deskripsi">Jam Mulai</td>
                                <td>: {{ $datadetail->jam }}</td>
                                <td></td>
                            </tr>
                            <!-- Data Tabel -->
                            <tr>
                                <td rowspan="10", class="tindakan">Perangkat Tindakan</td>
                                <td>Perangkat : {{ $dataperangkat->masterperangkat->namaperangkat }} - Lokasi :
                                    {{ $dataperangkat->lokasi }}</td>
                            </tr>
                            @foreach ($datachecklist as $data)
                                <tr>
                                    <td>{{ $data->masterchecklist->keterangan }}</td>
                                    <td>{{ $data->status }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td>
                                    <hr>Catatan : {{ $dataperangkat->catatan }}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    @if ($datafoto->count() > 0)
                                        Lampiran:
                                        <div style="display: flex; flex-wrap: wrap;">
                                            @foreach ($datafoto as $foto)
                                                <div style="margin-right: 10px;">
                                                    <img src="{{ url('file/' . $foto->foto) }}"
                                                        style="max-width: 100px; margin-bottom: 10px;">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </td>
                                <td></td>
                            </tr>




                            <tr>
                                <td colspan="" class="bottom-boxes">
                                    <div class="box1">ANGKASA PURA II</div>
                                    <div class="box2">ANGKASA PURA SOLUSI</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="" class="bottom-boxes">
                                    <div class="box1">
                                        <img src="{{ $datadetail->ttd1 }}" alt="Tanda Tangan 1"
                                            class="signature-image" />
                                    </div>
                                    <div class="box4">
                                        <img src="{{ $datadetail->ttd2 }}" alt="Tanda Tangan 2"
                                            class="signature-image" />
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
