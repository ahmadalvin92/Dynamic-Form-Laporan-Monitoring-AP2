<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MonitoringChecklist;
use App\Models\Masterchecklist;
use App\Models\MonitoringPerangkat;
use Illuminate\Support\Facades\Auth;

class MonitoringChecklistController extends Controller
{
    public function index($perangkat, $idlaporanmonitoring)
    {
        $latest = MonitoringPerangkat::latest('id')->first();
        $id_monitoring_perangkat = $latest ? $latest->id : 1;
        $role = Auth::user()->role ?? 1;

        $roleperangkat = "";
        if ($role == 2 || $role == 3) {
            $roleperangkat = 2;
        } else if ($role == 4 || $role == 5) {
            $roleperangkat = 4;
        } else if ($role == 6 || $role == 7) {
            $roleperangkat = 6;
        } else {
            // Role 1 (Super Admin) - match by perangkat's own role
            $p = Masterperangkat::find($perangkat);
            $roleperangkat = $p ? $p->role : "";
        }

        $checklists = Masterchecklist::checklistperangkat($perangkat, $roleperangkat);

        return view('formuser/monitoring-checklist')->with('checklists', $checklists)
            ->with('idlaporanmonitoring', $idlaporanmonitoring)->with('id_monitoring_perangkat', $id_monitoring_perangkat);
    }


    public function addMonitoringChecklist(Request $request)
    {
        $statuses = $request->input('status');
        if (is_array($statuses)) {
            foreach ($statuses as $checklistId => $status) {
                $monitoringChecklist = new MonitoringChecklist();
                $monitoringChecklist->idmonitoring = $request->input('idlaporanmonitoring');
                $monitoringChecklist->idmonitoringperangkat = $request->input('idmonitoringperangkat');
                $monitoringChecklist->checklist = $checklistId;
                // Standardize to ENUM values: OK or NOT OK
                $monitoringChecklist->status = (strtoupper(str_replace(' ', '', $status)) === 'NOTOK') ? 'NOT OK' : 'OK';
                $monitoringChecklist->save();
            }
        }

        $role = Auth::user()->role ?? 1;
        if ($role == 3 || $role == 2) {
            return redirect('/laporanmonitoring/itnonpublic')->with('success', 'Laporan monitoring berhasil disimpan!');
        } else if ($role == 4 || $role == 5) {
            return redirect('/laporanmonitoring/datanetwork')->with('success', 'Laporan monitoring berhasil disimpan!');
        } else if ($role == 7 || $role == 6) {
            return redirect('/laporanmonitoring/itaucc')->with('success', 'Laporan monitoring berhasil disimpan!');
        } else {
            return redirect('/laporanmonitoringdata')->with('success', 'Laporan monitoring berhasil disimpan!');
        }
    }

}