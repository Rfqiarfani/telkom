<?php

namespace App\Http\Controllers\Teknisi_provisioning;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;

class ProvisioningKegiatanController extends Controller
{
    public function tambahkegiatan(Request $request)
    {
        // Validasi input sebelum menyimpan ke database
        $request->validate([
            'tanggal' => 'required|date',
            'no_order' => 'required|string|max:50|unique:kegiatan,no_order',
            'jenis_wo' => 'required|string',
            'status' => 'required|string',
        ], [
            'tanggal.required' => 'Tanggal harus diisi.',
            'tanggal.date' => 'Format tanggal tidak valid.',
            'no_order.required' => 'Nomor order harus diisi.',
            'no_order.unique' => 'Nomor order sudah digunakan.',
            'jenis_wo.required' => 'Jenis WO harus diisi.',
            'status.required' => 'Status harus diisi.',
        ]);

        // Jika validasi berhasil, simpan data ke database
        KegiatanModel::create([
            'tanggal' => $request->tanggal,
            'no_order' => $request->no_order,
            'jenis_wo' => $request->jenis_wo,
            'status' => $request->status,
            'status_approve' => "Menunggu",
            'id_user' => session("id_user"),
            'point' => "0",
            'jenis' => "Provisioning",
        ]);

        return redirect()->route('teknisi_provisioning.kegiatan')
            ->with('message', 'Data Berhasil ditambahkan.');
    }


    public function editkegiatan(Request $request)
{
    $kegiatan = KegiatanModel::find($request->id_kegiatan);

    if ($kegiatan) {
        $kegiatan->update([
            'tanggal' => $request->tanggal,
            'no_order' => $request->no_order,
            'jenis_wo' => $request->jenis_wo,
            'status' => $request->status,
        ]);

        return redirect()->route('teknisi_provisioning.kegiatan')
                         ->with('message', 'Data Berhasil diperbarui.');
    }

    return redirect()->route('teknisi_provisioning.kegiatan')
                     ->with('error', 'Data tidak ditemukan.');
}


    public function hapuskegiatan(Request $request)
    {
        $kegiatan=KegiatanModel::find($request->id_kegiatan);
        $kegiatan->delete();

        return redirect()->route('teknisi_provisioning.kegiatan')
                 ->with('message', 'Data Berhasil dihapus.');
    }

    public function tampilkegiatan(Request $request)
    {
        $data=KegiatanModel::where("jenis","Provisioning")->where("status_approve","Menunggu")->get();
        return view('teknisi_provisioning.kegiatan',compact("data"));
    }
}
