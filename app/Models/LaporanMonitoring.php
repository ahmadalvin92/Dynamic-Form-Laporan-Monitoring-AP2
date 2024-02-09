<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMonitoring extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "laporan_monitoring";
    protected $fillable = [
        'tanggal',
        'shift',
        'divisi',
        'perangkat',
        'area',
        'jam',
        'user',
        'ttd1',
        'ttd2',
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    static function addlaporanmonitoring($tanggal, $shift, $divisi, $perangkat, $area, $user, $jam, $ttd1, $ttd2)
    {
        $field = [
            "tanggal" => $tanggal,
            "shift" => $shift,
            "divisi" => $divisi,
            "perangkat" => $perangkat,
            "area" => $area,
            "jam" => $jam,
            "user" => $user,
            "ttd1" => $ttd1,
            "ttd2" => $ttd2,
        ];
        $laporan = LaporanMonitoring::create($field);

        return $laporan->id;

    }

}

