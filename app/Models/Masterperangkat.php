<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterperangkat extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "masterperangkat";
    protected $fillable = ['namaperangkat'];

    static function addmasterperangkat($namaperangkat)
    {
        $field = [
            "namaperangkat" => $namaperangkat,
        ];
        Masterperangkat::create($field);
    }

    static function dataperangkat()
    {
        $data = Masterperangkat::orderBy('id', 'DESC')->get();
        return $data;
    }

    static function hapusperangkat($id)
    {
        $hapusperangkat = Masterperangkat::where('id', $id)->first();
        $hapusperangkat->delete();
    }
}
