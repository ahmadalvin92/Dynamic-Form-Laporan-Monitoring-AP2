<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masterperangkat;
use App\Models\Masterchecklist;

class MasterperangkatController extends Controller
{
    public function index()
    {
        $namaperangkats = Masterperangkat::all();
        $masterperangkat = Masterperangkat::dataperangkat();
        $checklists = Masterchecklist::datachecklist();
        return view('masterperangkat/masterperangkat', compact('namaperangkats', 'checklists', 'masterperangkat'));
    }

    public function generatepdf()
    {
        return view('generatepdf');
    }


    public function addMasterperangkat(Request $request)
    {
        $namaperangkat = $request->namaperangkat;

        Masterperangkat::addmasterperangkat($namaperangkat);
        $pesanperangkat = "Data telah ditambahkan !";
        return redirect('/masterperangkat')->with("pesanperangkat", $pesanperangkat);
    }

    public function addMasterchecklist(Request $request)
    {
        $namaperangkat = $request->idperangkat;
        $keterangan = $request->keterangan;

        // Retrieve the idperangkat based on the selected name
        $idperangkat = Masterperangkat::where('namaperangkat', $namaperangkat)->value('id');

        Masterchecklist::addMasterchecklist($idperangkat, $keterangan);

        $pesanchecklist = "Data telah ditambahkan !";
        return redirect('/masterperangkat')->with("pesanchecklist", $pesanchecklist);
    }

    public function hapusperangkat($id)
    {
        Masterperangkat::hapusperangkat($id);

        $pesanperangkat = "Perangkat telah dihapus !";
        return redirect('/masterperangkat')->with("pesanperangkat", $pesanperangkat);
    }

    public function hapuschecklist($id)
    {
        Masterchecklist::hapuschecklist($id);

        $pesanperangkat = "Perangkat telah dihapus !";
        return redirect('/masterperangkat')->with("pesanperangkat", $pesanperangkat);
    }

}
