<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="{{ asset('pdf/app.css') }}">
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="">
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table>
                        <thead>
                            <!-- Header Tabel -->
                            <tr>
                                <th><img src="{{ asset('logo/logo.svg') }}" alt="Example Image"></th>
                                <th>KEGIATAN PREVENTIVE MAINTENANCE<br>NAMA PERANGKAT</th>
                                <th><img src="{{ asset('logo/logo.svg') }}" alt="Example Image"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Keterangan Tabel -->
                            <tr>
                                <td>Hari / Tanggal</td>
                                <td>Data Hari</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>Shift Kereja</td>
                                <td>Data Shift</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>Team Regu</td>
                                <td>Data Team</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>Perangkat</td>
                                <td>Data Perangkat</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <td>Lokasi</td>
                                <td>Data Lokasi</td>
                                <td>...</td>
                            </tr>
                            <tr style="border-bottom: 1px solid black; border-collapse: collapse;">
                                <td>Jam Mulai</td>
                                <td>Data Waktu</td>
                                <td>...</td>
                            </tr>
                            <!-- Data Tabel -->
                            <tr>
                                <td rowspan="8", class="tindakan">Perangkat Tindakan</td>
                                <td>1. Nama Perangkat</td>
                            </tr>
                            <tr>
                                <td>a. Bersihkan rak perangkat</td>
                                <td>Ok/Not OK</td>
                            </tr>
                            <tr>
                                <td>b. Bersihkan rak perangkat</td>
                                <td>Ok/Not OK</td>
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
