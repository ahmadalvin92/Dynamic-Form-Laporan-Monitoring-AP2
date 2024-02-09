<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MonitoringChecklist;
use App\Models\Masterchecklist;

class MonitoringChecklistController extends Controller
{
    public function index($perangkat)
    {
        $checklists = Masterchecklist::checklistperangkat($perangkat);
        return view('formuser/monitoring-checklist')->with('checklists', $checklists);
        // return view('formuser/monitoring-checklist');
    }

    public function addMonitoringChecklist(Request $request)
    {
        // Validate the incoming request data if needed
        $request->validate([
            // Define your validation rules here
        ]);

        // Process the request data and add the monitoring checklist
        // For demonstration purposes, let's assume we're creating a new monitoring checklist record
        $monitoringChecklist = new MonitoringChecklist();
        $monitoringChecklist->id = $request->input('id');
        $monitoringChecklist->idmonitoring = $request->input('idmonitoring');
        $monitoringChecklist->checklist = $request->input('checklist');
        $monitoringChecklist->status = $request->input('status');
        $monitoringChecklist->save();

        // Optionally, you can return a response or redirect the user to another page
        return redirect()->back()->with('success', 'Monitoring checklist added successfully.');
    }
}
