<?php

namespace App\Http\Controllers\Teknisi_provisioning;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;

class ProvisioningKegiatanController extends Controller
{
    public function tambahkegiatan(Request $request)
    {
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
