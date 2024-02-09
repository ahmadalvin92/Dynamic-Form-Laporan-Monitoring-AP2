<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "karyawan";
    protected $fillable = ['namaperangkat', 'keterangan', 'status','catatan','lampiran'];

    static function addkaryawan($namaperangkat, $keterangan, $status,$catatan,$lampiran)
    {
        $field = [
            "namaperangkat" => $namaperangkat,
            "keterangan" => $keterangan,
            "status" => $status,
            "catatan" => $catatan,
            "lampiran" => $lampiran,
        ];
        Karyawan::create($field);
    }
}
