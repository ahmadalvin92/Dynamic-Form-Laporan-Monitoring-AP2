<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MonitoringChecklist;
use App\Models\Masterchecklist;
use App\Models\MonitoringPerangkat;

class MonitoringChecklistController extends Controller
{
    public function index($perangkat, $idlaporanmonitoring)
    {
        $id_monitoring_perangkat = Monitoringperangkat::latest('id')->first()->id;
        $checklists = Masterchecklist::checklistperangkat($perangkat);
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

        // Optionally, you can return a response or redirect the user to another page
        // return redirect()->back()->with('success', 'Monitoring checklists added successfully.');
        return redirect('/laporanmonitoringdata');
    }

}
