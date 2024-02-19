<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterchecklist extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "masterchecklists";
    protected $fillable = ['idperangkat', 'keterangan', 'role'];

    static function addmasterchecklist($idperangkat, $keterangan, $role)
    {
        $field = [
            "idperangkat" => $idperangkat,
            "keterangan" => $keterangan,
            "role" => $role,
        ];
        Masterchecklist::create($field);
    }

    static function checklistperangkat($perangkat, $role)
    {
        $checklist = Masterchecklist::where('idperangkat', $perangkat)->where('role', $role)->get();
        return $checklist;
    }

    static function datachecklist()
    {
        $data = Masterchecklist::orderBy('id', 'DESC')->get();
        return $data;
    }

    static function hapuschecklist($id)
    {
        $hapuschecklist = Masterchecklist::where('id', $id)->first();
        $hapuschecklist->delete();
    }
    // Masterchecklist.php

    public function masterperangkat()
    {
        return $this->belongsTo(Masterperangkat::class, 'idperangkat', 'id');
    }


}

