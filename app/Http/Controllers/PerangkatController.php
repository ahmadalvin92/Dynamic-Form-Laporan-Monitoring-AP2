<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perangkat;

class PerangkatController extends Controller
{
    public function index()
    {
        $master_data_perangkat = Perangkat::all();
        return view('masterperangkat', ['master_data_perangkat' => $master_data_perangkat]);
    }
    public function formkaryawan()
    {
        $master_data_perangkat = Perangkat::all();

        // Iterate through each Perangkat and split the keterangan into an array
        $master_data_perangkat->each(function ($perangkat) {
            // Remove brackets and split the string by commas
            $keteranganArray = explode(',', trim($perangkat->keterangan, '[]'));

            // Trim each element to remove extra whitespaces
            $keteranganArray = array_map('trim', $keteranganArray);

            // Update the Perangkat model with the new array
            $perangkat->keterangan = $keteranganArray;
        });

        return view('formkaryawan', ['master_data_perangkat' => $master_data_perangkat]);
    }


    public function addPerangkat(Request $request)
    {
        // Validasi input jika diperlukan
        // Validasi input jika diperlukan
        $request->validate([
            'namaperangkat' => 'required|string',
            'keterangan' => 'array',
            'keterangan.*' => 'string',
        ]);

        // Simpan data perangkat ke database
        $perangkat = Perangkat::create([
            'namaperangkat' => $request->input('namaperangkat'),
            'keterangan' => implode(', ', $request->input('keterangan', [])),
        ]);

        // Simpan data keterangan ke database
        $keteranganCheckbox = $request->input('keteranganCheckbox', []);
        $keteranganText = $request->input('keteranganText', []);

        foreach ($keteranganCheckbox as $index => $checkbox) {
            $keterangan = $keteranganText[$index] ?? '';
            // Simpan data keterangan ke database terkait perangkat
            $perangkat->keterangans()->create([
                'keterangan' => $keterangan,
                'status' => $checkbox ? 'ok' : 'not ok',
            ]);
        }

        // Redirect kembali ke halaman master perangkat dengan pesan sukses
        $pesan = "Data perangkat berhasil ditambahkan!";
        return redirect('/masterperangkat')->with('pesan', $pesan);
    }

    // PerangkatController.php
    public function hapusPerangkat($id)
    {
        try {
            $perangkat = Perangkat::findOrFail($id);
            $perangkat->delete();

            return response()->json(['success' => true, 'message' => 'Perangkat berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus perangkat']);
        }
    }

}
