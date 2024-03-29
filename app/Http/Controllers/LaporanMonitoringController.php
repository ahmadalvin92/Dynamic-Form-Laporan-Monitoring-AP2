<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanMonitoring;
use App\Models\Masterperangkat;
use App\Models\Monitoringperangkat;
use App\Models\MonitoringChecklist;
use Illuminate\Support\Facades\Auth;

class LaporanMonitoringController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == 3 || $role == 2) {
            $roleperangkat = 2;
        } else if ($role == 5 || $role == 4) {
            $roleperangkat = 4;
        } else if ($role == 7 || $role == 6) {
            $roleperangkat = 6;
        } else {
            $roleperangkat = "";
        }


        $namaperangkats = Masterperangkat::dataperangkat($roleperangkat);

        return view('formuser/form-laporan-monitoring')->with('namaperangkats', $namaperangkats);
    }

    public function addLaporanMonitoring(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'shift' => 'required',
            'divisi' => 'required',
            'perangkat' => 'required',
            'area' => 'required',
            'user' => 'required',
            //'jam' => 'required',
            'ttd1' => 'required',
            'ttd2' => 'required',
        ]);

        // Simpan data laporan monitoring baru ke dalam database
        $tanggal = $request->tanggal;
        $shift = $request->shift;
        $divisi = $request->divisi;
        $perangkat = $request->perangkat;
        $area = $request->area;
        $user = $request->user;
        $jam = $request->jammulai . ' - ' . $request->jamselesai;
        $ttd1 = $request->ttd1;
        $ttd2 = $request->ttd2;

        LaporanMonitoring::addlaporanmonitoring($tanggal, $shift, $divisi, $perangkat, $area, $user, $jam, $ttd1, $ttd2);

        $pesanlaporanmonitoring = "Data telah ditambahkan !";
        return redirect('/form-monitoring-perangkat/' . $perangkat)->with("pesanlaporanmonitoring", $pesanlaporanmonitoring);
        // Redirect ke halaman tertentu jika diperlukan
    }
    public function laporanmonitoringdata()
    {
        $datalaporanmonitoring = LaporanMonitoring::all();

        return view('laporanmonitoring')->with('datalaporanmonitoring', $datalaporanmonitoring);
    }


    public function laporanmonitoring_show($id)
    {
        $datadetail = LaporanMonitoring::detaillaporanmonitoring($id);
        $datalaporanmonitoring = LaporanMonitoring::datalaporanmonitoring();
        //$dataperangkat = Monitoringperangkat::detailperangkatmonitoring($id);
        $dataperangkat = MonitoringPerangkat::with('masterperangkat')->where('idlaporanmonitoring', $id)->first();
        $datafotoIds = MonitoringPerangkat::where('idlaporanmonitoring', $id)->pluck('id');
        $datafoto = MonitoringPerangkat::whereIn('id', $datafotoIds)->get();
        $datachecklist = MonitoringChecklist::with('masterchecklist')->where('idmonitoring', $id)->get();
        return view('/laporanmonitoring-show')->with('datadetail', $datadetail)
            ->with('dataperangkat', $dataperangkat)->with('datafoto', $datafoto)->with('datachecklist', $datachecklist)->with('datalaporanmonitoring', $datalaporanmonitoring);
        ;
    }

    public function laporanmonitoring_createpdf($id)
    {
        $datadetail = LaporanMonitoring::detaillaporanmonitoring($id);
        $datalaporanmonitoring = LaporanMonitoring::datalaporanmonitoring();
        //$dataperangkat = Monitoringperangkat::detailperangkatmonitoring($id);
        $dataperangkat = MonitoringPerangkat::with('masterperangkat')->where('idlaporanmonitoring', $id)->first();
        $datafotoIds = MonitoringPerangkat::where('idlaporanmonitoring', $id)->pluck('id');
        $datafoto = MonitoringPerangkat::whereIn('id', $datafotoIds)->get();
        $datachecklist = MonitoringChecklist::with('masterchecklist')->where('idmonitoring', $id)->get();
        return view('/laporanmonitoring-createpdf')->with('datadetail', $datadetail)
            ->with('dataperangkat', $dataperangkat)->with('datafoto', $datafoto)->with('datachecklist', $datachecklist)->with('datalaporanmonitoring', $datalaporanmonitoring);
        ;
    }

    public function delete($id)
    {
        $data = LaporanMonitoring::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function laporanmonitoring($divisi)
    {
        if ($divisi == 'itnonpublic') {
            $datalaporanmonitoring = LaporanMonitoring::where('divisi', 'IT Non Public')->get();
        } else if ($divisi == 'datanetwork') {
            $datalaporanmonitoring = LaporanMonitoring::where('divisi', 'Data Network')->get();
        } else {
            $datalaporanmonitoring = LaporanMonitoring::where('divisi', 'IT AUCC/TOC')->get();
        }
        

        return view('/laporanmonitoring2')->with('datalaporanmonitoring', $datalaporanmonitoring);

    }

    public function homeData()
    {
        $datalaporanmonitoringnonpublik = LaporanMonitoring::where('divisi', 'IT Non Public')->get();
        $datalaporanmonitoringdatanetwork = LaporanMonitoring::where('divisi', 'Data Network')->get();
        $datalaporanmonitoringaucc = LaporanMonitoring::where('divisi', 'IT AUCC/TOC')->get();

        $homeData = [
            'datalaporanmonitoringnonpublik' => $datalaporanmonitoringnonpublik,
            'datalaporanmonitoringdatanetwork' => $datalaporanmonitoringdatanetwork,
            'datalaporanmonitoringaucc' => $datalaporanmonitoringaucc,
        ];

        return $homeData;
    }

    public function home()
    {
        $homeData = $this->homeData();

        return view('home', $homeData);
    }



}
