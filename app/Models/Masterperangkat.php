<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterperangkat extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "masterperangkat";
    protected $fillable = ['namaperangkat', 'role'];

    static function addmasterperangkat($namaperangkat, $role)
    {
        $field = [
            "namaperangkat" => $namaperangkat,
            "role" => $role,
        ];
        Masterperangkat::create($field);
    }

    static function dataperangkat($roleperangkat = "")
    {
        if ($roleperangkat !== "") {
            $data = Masterperangkat::where('role', $roleperangkat)->orderBy('id', 'DESC')->get();
        }
        else {
            $data = Masterperangkat::orderBy('id', 'DESC')->get();
        }
        

        return $data;
    }

    static function hapusperangkat($id)
    {
        $hapusperangkat = Masterperangkat::where('id', $id)->first();
        $hapusperangkat->delete();
    }


}
