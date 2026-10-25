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
        // Ambil ID laporan monitoring terbaru dari database secara aman
        $latest = LaporanMonitoring::latest('id')->first();
        $id_laporan_monitoring = $latest ? $latest->id : 1;

        return view('formuser/monitoring-perangkat')->with([
            'perangkat' => $perangkat,
            'id_laporan_monitoring' => $id_laporan_monitoring,
        ]);
    }


    public function addMonitoringPerangkat(Request $request)
    {
        // Validasi input
        $request->validate([
            'idperangkat' => 'required',
            'idlaporanmonitoring' => 'required',
            'lokasi' => 'required',
            'catatan' => 'nullable',
            'foto.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $idperangkat = $request->idperangkat;
        $idlaporanmonitoring = $request->idlaporanmonitoring;
        $lokasi = $request->lokasi;
        $catatan = $request->catatan ?? '-';

        if ($request->hasFile('foto')) {
            $fotos = $request->file('foto');
            foreach ($fotos as $foto) {
                $fotoname = str_replace(' ', '', time() . "_" . $foto->getClientOriginalName());
                $foto->move("file/", $fotoname);
                MonitoringPerangkat::addmonitoringperangkat($idperangkat, $idlaporanmonitoring, $lokasi, $catatan, $fotoname);
            }
        } else {
            MonitoringPerangkat::addmonitoringperangkat($idperangkat, $idlaporanmonitoring, $lokasi, $catatan, null);
        }

        $pesanmonitoringperangkat = "Data perangkat dan dokumentasi berhasil disimpan!";
        return redirect('/form-monitoring-checklist/' . $idperangkat . '/' . $idlaporanmonitoring)->with("pesanmonitoringperangkat", $pesanmonitoringperangkat);
    }

}
