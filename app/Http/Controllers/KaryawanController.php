<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    //
    // public function index()
    // {
    //     return view('home');
    // }

    public function generatepdf()
    {
        return view('generatepdf');
    }

    public function datakaryawan()
    {
        $data_karyawan = Karyawan::all();
        return view('datakaryawan', ['data_karyawan' => $data_karyawan]);
    }

    public function formkaryawan()
    {
        return view('formkaryawan');
    }

    public function addkaryawan(Request $request)
    {
        $request->validate([
            'namaperangkat' => 'required|string',
            'selected_keterangan' => 'required|array', // Updated to use selected_keterangan
            'selected_keterangan.*' => 'string', // Validate each item in the array
            'status' => 'required|in:ok,not ok',
            'catatan' => 'nullable|string',
            'lampiran' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $namaperangkat = $request->namaperangkat;
        $keterangan = implode(', ', $request->input('selected_keterangan'));
        $status = $request->status;
        $catatan = $request->catatan;

        // Menghandle file lampiran jika ada
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $lampiranPath = $lampiran->store('lampiran', 'public');
        }

        Karyawan::create([
            'namaperangkat' => $namaperangkat,
            'keterangan' => $keterangan,
            'status' => $status,
            'catatan' => $catatan,
            'lampiran' => $lampiranPath,
        ]);

        $pesan = "Data telah ditambahkan!";
        return redirect('/datakaryawan')->with("pesan", $pesan);
    }
    public function deletekaryawan($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            abort(404, 'Data not found');
        }

        // Hapus lampiran jika ada
        if ($karyawan->lampiran) {
            Storage::disk('public')->delete($karyawan->lampiran);
        }

        // Hapus data dari database
        $karyawan->delete();

        $pesan = "Data berhasil dihapus!";
        return redirect('/datakaryawan')->with("pesan", $pesan);
    }
    public function editkaryawan($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            abort(404, 'Data not found');
        }

        return view('editkaryawan', ['karyawan' => $karyawan]);
    }
    public function updatekaryawan(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            abort(404, 'Data not found');
        }

        // Validasi input jika diperlukan
        $request->validate([
            'namaperangkat' => 'required|string',
            'keterangan' => 'required|string',
            'status' => 'required|in:ok,not ok',
            'catatan' => 'nullable|string',
            'lampiran' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan
        ]);

        // Update data
        $karyawan->update([
            'namaperangkat' => $request->input('namaperangkat'),
            'keterangan' => $request->input('keterangan'),
            'status' => $request->input('status'),
            'catatan' => $request->input('catatan'),
        ]);

        // Proses penyimpanan file lampiran
        if ($request->hasFile('lampiran')) {
            $lampiranPath = $request->file('lampiran')->store('lampiran', 'public');
            $karyawan->lampiran = $lampiranPath;
            $karyawan->save();
        }

        // Beri pesan sukses atau redirect ke halaman lain jika diperlukan
        $pesan = "Data berhasil diupdate!";
        return redirect('/datakaryawan')->with("pesan", $pesan);
    }


    public function starter()
    {
        return view('starter');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
