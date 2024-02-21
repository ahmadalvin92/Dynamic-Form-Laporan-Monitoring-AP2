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
        $id_monitoring_perangkat = Monitoringperangkat::latest('id')->first()->id;
        $role = Auth::user()->role;

        $roleperangkat = "";
        if ($role == 1 || $role == 3 || $role == 2) {
            $roleperangkat = 2;
        } else if ($role == 1 || $role == 5 || $role == 4) {
            $roleperangkat = 4;
        } else if ($role == 1 || $role == 7 || $role == 6) {
            $roleperangkat = 6;
        }


        $checklists = Masterchecklist::checklistperangkat($perangkat, $roleperangkat);

        return view('formuser/monitoring-checklist')->with('checklists', $checklists)
            ->with('idlaporanmonitoring', $idlaporanmonitoring)->with('id_monitoring_perangkat', $id_monitoring_perangkat);
        // return view('formuser/monitoring-checklist');
    }


    public function addMonitoringChecklist(Request $request)
    {
        // Validate the incoming request data if needed
        $request->validate([
            // Define your validation rules here
        ]);

        // Process the request data and add the monitoring checklists
        foreach ($request->input('status') as $checklistId => $status) {
            $monitoringChecklist = new MonitoringChecklist();
            $monitoringChecklist->idmonitoring = $request->input('idlaporanmonitoring');
            $monitoringChecklist->idmonitoringperangkat = $request->input('idmonitoringperangkat');
            $monitoringChecklist->checklist = $checklistId; // Assuming checklist_id is the foreign key to the Masterchecklist table
            $monitoringChecklist->status = $status;
            $monitoringChecklist->save();
        }

        $role = Auth::user()->role;
        if ($role == 3 || $role == 2) {
            return redirect('/laporanmonitoring/itnonpublic');

        } else if ($role == 5 || $role == 4) {
            return redirect('/laporanmonitoring/datanetwork');

        } else if ($role == 7 || $role == 6) {
            return redirect('/laporanmonitoring/itaucc');
        } else {
            return redirect('/laporanmonitoringdata');
        }

    }

}