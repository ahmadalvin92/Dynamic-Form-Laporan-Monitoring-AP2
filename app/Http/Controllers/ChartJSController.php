<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\MonitoringPerangkat;
use DB;

class ChartJSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return View
     */
    public function index(): View
    {
        $devices = DB::table('monitoring_perangkat')
            ->select('idlaporanmonitoring', DB::raw('COUNT(*) as count'))
            ->groupBy('idlaporanmonitoring')
            ->get();

        // Mengelompokkan berdasarkan idlaporanmonitoring
        $groupedDevices = $devices->groupBy('idlaporanmonitoring')->map(function ($group) {
            return $group->sum('count');
        });

        $labels = $groupedDevices->keys(); // Ambil idlaporanmonitoring sebagai label

        return view('home', compact('labels', 'groupedDevices'));
    }



}
