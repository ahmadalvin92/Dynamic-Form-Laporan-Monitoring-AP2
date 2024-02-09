<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterchecklist extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "masterchecklists";
    protected $fillable = ['idperangkat', 'keterangan'];

    static function addmasterchecklist($idperangkat, $keterangan)
    {
        $field = [
            "idperangkat" => $idperangkat,
            "keterangan" => $keterangan,
        ];
        Masterchecklist::create($field);
    }

    static function checklistperangkat($perangkat)
    {
        $checklist = Masterchecklist::where('idperangkat', $perangkat)->get();
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

