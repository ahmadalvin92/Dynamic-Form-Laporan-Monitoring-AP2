<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonitoringPerangkat extends Model
{
    protected $table = 'monitoring_perangkat';

    protected $fillable = [
        'idperangkat',
        'idlaporanmonitoring',
        'lokasi',
        'catatan',
        'foto',
    ];

    static function addmonitoringperangkat($idperangkat, $idlaporanmonitoring, $lokasi, $catatan, $fotoname)
    {
        $field = [
            "idperangkat" => $idperangkat,
            "idlaporanmonitoring" => $idlaporanmonitoring,
            "lokasi" => $lokasi,
            "catatan" => $catatan,
            "foto" => $fotoname,
        ];
        MonitoringPerangkat::create($field);
    }

    public function masterperangkat()
    {
        return $this->belongsTo(Masterperangkat::class, 'idperangkat', 'id');
    }
    public function laporanMonitoring()
    {
        return $this->belongsTo(LaporanMonitoring::class, 'idlaporanmonitoring');
    }

    public function perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'idperangkat');
    }
}
