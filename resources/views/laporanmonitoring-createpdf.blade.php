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
                                <th>KEGIATAN PREVENTIVE MAINTENANCE<br>(Nama Perangkat sesuai data master)</th>
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
                                <td>...</td>
                            </tr>
                            <tr>
                                <td class="deskripsi">Team/Regu</td>
                                <td>: {{ $datadetail->divisi }}</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td class="deskripsi">Perangkat</td>
                                <td>: {{ $datadetail->perangkat }}</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td class="deskripsi">Lokasi</td>
                                <td>: {{ $datadetail->area }}</td>
                                <td>...</td>
                            </tr>
                            <tr style="border-bottom: 1px solid black; border-collapse: collapse;">
                                <td class="deskripsi">Jam Mulai</td>
                                <td>: {{ $datadetail->jam }}</td>
                                <td>...</td>
                            </tr>
                            <!-- Data Tabel -->
                            <tr>
                                <td rowspan="8", class="tindakan">Perangkat Tindakan</td>
                                <td>1. Nama Perangkat</td>
                            </tr>
                            <tr>
                                <td>a. (Keterangan sesuai master data)</td>

                                <td>Ok/Not OK</td>
                            </tr>
                            <tr>
                                <td>b. (Keterangan sesuai master data)</td>
                                <td>Ok/Not OK</td>
                            </tr>
                            <tr>
                                <td>c. (Keterangan sesuai master data)</td>
                                <td>Ok/Not OK</td>
                            </tr>
                            <tr>
                                <td>d. (Keterangan sesuai master data)</td>
                                <td>Ok/Not OK</td>
                            </tr>
                            <tr>
                                <td>e. (Keterangan sesuai master data)</td>
                                <td>Ok/Not OK</td>
                            </tr>

                            <tr>
                                <td>
                                    <hr>catatan:
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <hr> lampiran
                                </td>
                            </tr>

                            <td></td>
                            <td>
                                <hr>
                            </td>

                            <tr>
                                <td rowspan="8", class="tindakan">Perangkat Tindakan</td>
                                <td>2. Nama Perangkat</td>
                            </tr>
                            <tr>
                                <td>a. (Keterangan sesuai master data)</td>

                                <td>Ok/Not OK</td>
                            </tr>
                            <tr>
                                <td>b. (Keterangan sesuai master data)</td>
                                <td>Ok/Not OK</td>
                            </tr>
                            <tr>
                                <td>c. (Keterangan sesuai master data)</td>
                                <td>Ok/Not OK</td>
                            </tr>
                            <tr>
                                <td>d. (Keterangan sesuai master data)</td>
                                <td>Ok/Not OK</td>
                            </tr>
                            <tr>
                                <td>e. (Keterangan sesuai master data)</td>
                                <td>Ok/Not OK</td>
                            </tr>

                            <tr>
                                <td>
                                    <hr>catatan:
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <hr> lampiran
                                </td>
                            </tr>

                            <td></td>
                            <td>
                                <hr>

                                <tr>
                                    <td colspan="3" class="bottom-boxes">
                                        <div class="box1">ANGKASA PURA II</div>
                                        <div class="box2">ANGKASA PURA SOLUSI</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3" class="bottom-boxes">
                                        <div class="box3"></div>
                                        <div class="box4"></div>
                                    </td>
                                </tr>
                            </td>


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
        //window.addEventListener("load", window.print());
    </script>
</body>

</html>
