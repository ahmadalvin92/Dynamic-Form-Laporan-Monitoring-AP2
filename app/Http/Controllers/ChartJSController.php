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
        $totalReports = DB::table('laporan_monitoring')->count();
        $totalDevices = DB::table('masterperangkat')->count();
        $totalChecklists = DB::table('masterchecklists')->count();

        $countNonPublic = DB::table('laporan_monitoring')->where('divisi', 'IT Non Public')->count();
        $countDataNetwork = DB::table('laporan_monitoring')->where('divisi', 'Data Network')->count();
        $countAucc = DB::table('laporan_monitoring')->where('divisi', 'IT AUCC/TOC')->count();

        $recentReports = DB::table('laporan_monitoring')->orderByDesc('id')->take(5)->get();

        $labels = ['IT Non Public', 'Data Network', 'IT AUCC/TOC'];
        $divisionCounts = [$countNonPublic, $countDataNetwork, $countAucc];

        return view('home', compact(
            'totalReports',
            'totalDevices',
            'totalChecklists',
            'countNonPublic',
            'countDataNetwork',
            'countAucc',
            'labels',
            'divisionCounts',
            'recentReports'
        ));
    }



}
