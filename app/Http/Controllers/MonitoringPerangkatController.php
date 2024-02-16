<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonitoringPerangkat;
use App\Models\LaporanMonitoring;
use App\Models\Masterperangkat;

class MonitoringPerangkatController extends Controller
{
    public function index($perangkat)
    {
        // Ambil ID laporan monitoring terbaru dari database
        $id_laporan_monitoring = LaporanMonitoring::latest('id')->first()->id;

        return view('formuser/monitoring-perangkat')->with([
            'perangkat' => $perangkat,
            'id_laporan_monitoring' => $id_laporan_monitoring,
        ]);
    }


    public function addMonitoringPerangkat(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'idperangkat' => 'required',
            'idlaporanmonitoring' => 'required',
            'lokasi' => 'required',
            'catatan' => 'required',
            'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk setiap file gambar
        ]);

        $idperangkat = $request->idperangkat;
        $idlaporanmonitoring = $request->idlaporanmonitoring;
        $lokasi = $request->lokasi;
        $catatan = $request->catatan;

        if ($request->hasFile('foto')) {
            $fotos = $request->file('foto');
            foreach ($fotos as $foto) {
                $fotoname = str_replace(' ', '', time() . "_" . $foto->getClientOriginalName());
                $foto->move("file/", $fotoname);
                MonitoringPerangkat::addmonitoringperangkat($idperangkat, $idlaporanmonitoring, $lokasi, $catatan, $fotoname);
            }
        }

        $pesanmonitoringperangkat = "Data telah ditambahkan !";
        return redirect('/form-monitoring-checklist/' . $idperangkat . '/' . $idlaporanmonitoring)->with("pesamonitoringperangkat", $pesanmonitoringperangkat);
    }

}
