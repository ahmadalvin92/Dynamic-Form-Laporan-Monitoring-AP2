<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
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
            ->select('idperangkat', DB::raw('COUNT(*) as count'))
            ->groupBy('idperangkat')
            ->get();

        $labels = $devices->pluck('idperangkat'); // misalnya, ambil idperangkat sebagai label

        return view('home', compact('labels', 'devices'));
    }


}
